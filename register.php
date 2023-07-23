<?php 
// register.php

defined('MOODLE_INTERNAL') || die();

require_once('../../config.php');
require_once('register_form.php');

global $CFG, $DB;

$site = get_site();
$context = context_system::instance();

require_login();

$PAGE->set_url('/local/formPlugin/register.php');
$PAGE->set_context($context);
$PAGE->set_pagelayout('standard');
$PAGE->set_heading(format_string($site->fullname));

$form = new local_yourpluginname_register_form();

if ($data = $form->get_data()) {
    $username = $data->username;
    $firstname = $data->firstname;
    $lastname = $data->lastname;
    $country = $data->country;
    $mobile = $data->mobile;

    // Validate email address format.
    if (!is_valid_email($username)) {
        $form->elementError('username', 'invalidemail', '', $username);
        echo $OUTPUT->header();
        $form->display();
        echo $OUTPUT->footer();
        exit;
    }

    // Check if the email (username) is already registered.
    if ($DB->record_exists('user', array('username' => $username))) {
        $form->elementError('username', 'emailtaken', '', $username);
        echo $OUTPUT->header();
        $form->display();
        echo $OUTPUT->footer();
        exit;
    }

    // Generate a temporary password.
    $temp_password = generate_random_password();

    // Create the user account.
    $user = new stdClass();
    $user->username = $username;
    $user->password = hash_internal_user_password($temp_password);
    $user->firstname = $firstname;
    $user->lastname = $lastname;
    $user->country = $country;
    $user->mobile = $mobile;
    $user->email = $username;
    $user->confirmed = 0; // Set to 0 to send email verification.
    $user->timecreated = time();
    $user->timemodified = $user->timecreated;

    $user_id = $DB->insert_record('user', $user);

    if ($user_id) {
        // Send email verification with the temporary password.
        $subject = get_string('emailverification', 'formPlugin');
        $message = get_string('emailverificationmessage', 'formPlugin', array('temp_password' => $temp_password));
        $mail = get_mailer();
        $mail->send($username, $subject, $message);

        // Redirect to a page indicating successful registration.
        redirect(new moodle_url('/local/formPlugin/registration_successful.php'));
    } else {
        // An error occurred during user creation.
        print_error('registrationerror', 'formPlugin');
    }
} else {
    echo $OUTPUT->header();
    $form->display();
    echo $OUTPUT->footer();
}



?>
<?php 
// registration_successful.php

defined('MOODLE_INTERNAL') || die();

global $SITE;

$PAGE->set_url('/local/formPlugin/registration_successful.php');
$PAGE->set_pagelayout('standard');
$PAGE->set_heading(format_string($SITE->fullname));

echo $OUTPUT->header();
echo html_writer::tag('h2', get_string('emailverification', 'formPlugin'));
echo html_writer::tag('p', get_string('emailverificationmessage', 'formPlugin', array('temp_password' => '**********'))); // Mask the temporary password for security reasons.
echo $OUTPUT->footer();




?>
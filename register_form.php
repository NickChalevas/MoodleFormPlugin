<?php 
// register_form.php

defined('MOODLE_INTERNAL') || die();

require_once($CFG->libdir . '/formslib.php');

class formPlugin_register_form extends moodleform {
    public function definition() {
        $mform = $this->_form;

        $mform->addElement('text', 'username', get_string('email'), array('maxlength' => 100));
        $mform->setType('username', PARAM_EMAIL);
        $mform->addRule('username', get_string('required'), 'required', null, 'client');
        $mform->addRule('username', get_string('invalidemail', 'formPlugin'), 'email', null, 'client');
        $mform->addRule('username', get_string('maxlength', 'formPlugin', 100), 'maxlength', 100, 'client');
        $mform->addRule('username', get_string('maxlength', 'formPlugin', 100), 'maxlength', 100, 'server');
        
        $mform->addElement('text', 'firstname', get_string('firstname'), array('maxlength' => 100));
        $mform->setType('firstname', PARAM_TEXT);
        $mform->addRule('firstname', get_string('required'), 'required', null, 'client');
        $mform->addRule('firstname', get_string('maxlength', 'formPlugin', 100), 'maxlength', 100, 'client');
        $mform->addRule('firstname', get_string('maxlength', 'formPlugin', 100), 'maxlength', 100, 'server');
        
        $mform->addElement('text', 'lastname', get_string('lastname'), array('maxlength' => 100));
        $mform->setType('lastname', PARAM_TEXT);
        $mform->addRule('lastname', get_string('required'), 'required', null, 'client');
        $mform->addRule('lastname', get_string('maxlength', 'formPlugin', 100), 'maxlength', 100, 'client');
        $mform->addRule('lastname', get_string('maxlength', 'formPlugin', 100), 'maxlength', 100, 'server');
        
        $mform->addElement('text', 'country', get_string('country'), array('maxlength' => 100));
        $mform->setType('country', PARAM_TEXT);
        $mform->addRule('country', get_string('required'), 'required', null, 'client');
        $mform->addRule('country', get_string('maxlength', 'formPlugin', 100), 'maxlength', 100, 'client');
        $mform->addRule('country', get_string('maxlength', 'formPlugin', 100), 'maxlength', 100, 'server');
        
        $mform->addElement('text', 'mobile', get_string('mobile'), array('maxlength' => 20));
        $mform->setType('mobile', PARAM_TEXT);
        $mform->addRule('mobile', get_string('required'), 'required', null, 'client');
        $mform->addRule('mobile', get_string('maxlength', 'formPlugin', 20), 'maxlength', 20, 'client');
        $mform->addRule('mobile', get_string('maxlength', 'formPlugin', 20), 'maxlength', 20, 'server');

        $this->add_action_buttons(false, get_string('submit'));
    }
}



?>
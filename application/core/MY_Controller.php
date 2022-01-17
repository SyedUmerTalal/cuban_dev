<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MY_Controller	extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->settings = $this->global_model->records_single('settings');
    }
}

class Front_Controller extends MY_Controller {

	function __construct() {
        parent::__construct();
        $this->settings = $this->global_model->records_single('settings');
        $this->currency = "$";
    }
}
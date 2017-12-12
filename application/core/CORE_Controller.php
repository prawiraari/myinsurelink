<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CORE_Controller extends CI_Controller {

	public function __construct()
    {
        parent::__construct();

    	$dblog = $this->load->database('dblog', TRUE);
    	$array = array_map(function($value) {return $value['ip_address'];}, $dblog->query('SELECT * FROM whitelist')->result_array());

        if ($this->config->item('maintenence_mode')) {
        	echo $this->load->view('static/view_maintenence', '', TRUE);
        	die();
        }

    	if (! in_array($this->input->ip_address(), $array)) redirect('/');
    }
}
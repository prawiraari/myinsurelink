<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Policy extends CORE_Controller {

	public function __construct()
    {
        parent::__construct();
    }

    public function listing() {
        if ($this->session->userdata('admin_email') == "")
        {
            $this->load->view("admin/view_login");
            return;
        }

    	$this->load->model('model_policy');
    	$data["policy_list"] = $this->model_policy->listing();

    	$this->load->view('admin/view_header');
    	$this->load->view('admin/view_policy', $data);
    	$this->load->view('admin/view_footer');
    }

    public function details($InsuranceID) {
        if ($this->session->userdata('admin_email') == "")
        {
            $this->load->view("admin/view_login");
            return;
        }
        
    	$this->load->model('model_policy');
    	$data["policy"] = $this->model_policy->get($InsuranceID);

        $this->load->library('aws_sdk');
        $aws = new Aws_sdk();
        $aws_client = $aws->createS3();
        $cmd = $aws_client->getCommand('GetObject', [
            'Bucket' => $this->config->item('aws_bucket'),
            'Key' => "{$data["policy"]->InsuranceCode}.pdf"
        ]);
        $request = $aws_client->createPresignedRequest($cmd, '+'.$this->config->item('aws_url_timeout'));
        $data["policy_link"] = (string)$request->getUri();

    	$this->load->view('admin/view_header');
    	$this->load->view('admin/view_policy_details', $data);
    	$this->load->view('admin/view_footer');

    }

}
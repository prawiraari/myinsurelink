<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
    }

    public function index($pParam=null)
    {
        $this->load->view($this->config->item('lang_uri_abbr')[index_page()].'/view_header');
        $this->load->view($this->config->item('lang_uri_abbr')[index_page()].'/view_home');
        $this->load->view($this->config->item('lang_uri_abbr')[index_page()].'/view_footer');
    }

    public function iframe($pParam=null)
    {
        if($pParam == "faq")
        {
            $this->load->view($this->config->item('lang_uri_abbr')[index_page()].'/view_iframe_faq');
        }
        else if($pParam == "product")
        {
            $this->load->view($this->config->item('lang_uri_abbr')[index_page()].'/view_iframe_product');
        }
        else
        {
            show_404();
        }
    }

    public function get_document($param)
    {
        $hashids = new Hashids\Hashids('this is my salt');
        $numbers = $hashids->decode($param);

        $this->load->model('model_policy');
        $policy = $this->model_policy->get($numbers[0]);

        if($policy)
        {
            $this->load->library('aws_sdk');
            $aws = new Aws_sdk();
            $aws_client = $aws->createS3();
            $cmd = $aws_client->getCommand('GetObject', [
                'Bucket' => $this->config->item('aws_bucket'),
                'Key' => "{$policy->InsuranceCode}.pdf"
            ]);

            $request = $aws_client->createPresignedRequest($cmd, '+'.$this->config->item('aws_url_timeout'));
            $link = (string)$request->getUri();

            $imginfo = getimagesize($link);
            header("Content-type: {$imginfo['mime']}");
            readfile($link);
        }
        
    }
}
<?php defined('BASEPATH') OR exit('No direct script access allowed.');

use Aws\Sdk;
use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

class Aws_sdk extends Sdk
{
	function __construct()
	{
		$config = [
            'version' => 'latest',
            'region' => $this->config->item('aws_region'),
            'service' => '',
            'scheme' => 'http',
            'credentials' => [
                'key' =>  $this->config->item('aws_key'),
                'secret' => $this->config->item('aws_secret')
            ]
        ];
        parent::__construct($config);
	}

    public function __get($var)
    {
        return get_instance()->$var;
    }
}

?>
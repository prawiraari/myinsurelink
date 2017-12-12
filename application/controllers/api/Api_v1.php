<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';

class Api_v1 extends REST_Controller {

    /*protected $methods = [
        'insurance_certificate_post' => ['level' => 5]
    ];*/

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        // Check for maintenence mode
        if ($this->config->item('maintenence_mode')) {
            $this->response('The server is under maintenence.', REST_Controller::HTTP_SERVICE_UNAVAILABLE);
            die();
        }
    }

    public function create_policy_post()
    {
        $param['InsuranceCode'] = $this->post('reference_number') ? $this->post('reference_number') : '';
        $param['Name'] = strtoupper($this->post('name') ? $this->post('name') : '');
        $param['EmailAddress'] = $this->post('email') ? $this->post('email') : '';
        $param['PhoneCode'] = $this->post('phone_code') ? $this->post('phone_code') : '';
        $param['PhoneNumber'] = $this->post('phone_number') ? $this->post('phone_number') : '';
        $param['IDNumber'] = $this->post('id_no') ? $this->post('id_no') : '';
        $param['ExpiryDate'] = $this->post('passport_expiry_date') ? $this->post('passport_expiry_date') : '';
        /*$param['VisaNumber'] = $this->post('visa_no') ? $this->post('visa_no') : '';*/
        /*$param['VisaValidity'] = $this->post('visa_validity') ? $this->post('visa_validity') : '';
        $param['TravelDateFrom'] = $this->post('travelling_from') ? $this->post('travelling_from') : '';
        $param['TravelDateTo'] = $this->post('travelling_to') ? $this->post('travelling_to') : '';*/

        /*$param['TravelPurpose'] = $this->post('purpose_of_travelling') ? $this->post('purpose_of_travelling') : '';*/
        $param['Address1'] = $this->post('address_1') ? $this->post('address_1') : '';
        $param['Address2'] = $this->post('address_2') ? $this->post('address_2') : '';
        $param['PostalCode'] = $this->post('postal_code') ? $this->post('postal_code') : '';
        $param['City'] = $this->post('city') ? $this->post('city') : '';
        $param['StateProvince'] = $this->post('state') ? $this->post('state') : '';

        $param['NomineeName'] = $this->post('nominee_name') ? $this->post('nominee_name') : '';
        $param['NomineeAddress1'] = $this->post('nominee_address_1') ? $this->post('nominee_address_1') : '';
        $param['NomineeAddress2'] = $this->post('nominee_address_2') ? $this->post('nominee_address_2') : '';
        $param['NomineePostalCode'] = $this->post('nominee_postal_code') ? $this->post('nominee_postal_code') : '';
        $param['NomineeCity'] = $this->post('nominee_city') ? $this->post('nominee_city') : '';
        $param['NomineeStateProvince'] = $this->post('nominee_state') ? $this->post('nominee_state') : '';
        $param['NomineePhoneCode'] = $this->post('nominee_phone_code') ? $this->post('nominee_phone_code') : '';
        $param['NomineePhoneNumber'] = $this->post('nominee_phone_number') ? $this->post('nominee_phone_number') : '';
        $param['Relationship'] = $this->post('nominee_relationship') ? $this->post('nominee_relationship') : '';
        $param['SharePercentage'] = $this->post('share_percentage') ? $this->post('share_percentage') : '';
        $param['Amount'] = $this->post('amount') ? $this->post('amount') : '';
        $param['product_code'] = $this->post('product_code') ? $this->post('product_code') : '';

        $check_require = $this->requireValidation ( $param );

        $this->load->model('model_product');
        $row_product = $this->model_product->get_by_key(substr($param['product_code'], 0, 3));

        if($row_product)
        {
            $param['ProductID'] = $row_product->ProductID;
            $param['ApprovalDate'] = date('Y-m-d');
            $param['ValidPeriod'] = substr($param['product_code'], -2);

            $this->load->model('model_policy');

            if (! $this->model_policy->check_exist($param["InsuranceCode"])) {

                $InsuranceID = $this->model_policy->add($param);

                if ($InsuranceID) {
                    $policy = $this->model_policy->get($InsuranceID);
                    $this->load->model('model_product');
                    $data["product"] = $this->model_product->get_travel($policy->ProductID,$policy->ValidPeriod);
                    $data["goodsServiceTax"] = $data["product"]->Rate*(6/100);
                    $data["masterPolicyCode"] = $this->config->item('master_policy_code');
                    $data["accountCode"] = $this->config->item('account_code');
                    $data["policy"] = $policy;

                    $html = $this->load->view('pdf/pdf2', $data, true);

                    $options = new Dompdf\Options();

                    $options->set('isRemoteEnabled', true);
                    $options->set('isHtml5ParserEnabled', true);

                    $dompdf = new Dompdf\Dompdf($options);
             
                    $dompdf->loadHtml($html);
             
                    // (Optional) Setup the paper size and orientation
                    $dompdf->setPaper(array(0, 0, 745.28, 935.89));
             
                    // Render the HTML as PDF
                    $dompdf->render();
             
                    // Get the generated PDF file contents
                    $pdf = $dompdf->output();
                    
                    // Upload to AWS
                    $this->load->library('aws_sdk');
                    $aws = new Aws_sdk();
                    $aws_client = $aws->createS3();
                    
                    try {
                        $aws_client->putObject([
                            'Bucket' => $this->config->item('aws_bucket'),
                            'Key' => "{$policy->InsuranceCode}.pdf",
                            'Body' => $pdf,
                            'ACL' => 'private',
                        ]);

                        $hashids = new Hashids\Hashids('this is my salt');
                        $hashids_url = $hashids->encode($InsuranceID);

                        $actual_file_url = base_url('get_document/'.$hashids_url);

                        $this->response([
                            'status' => TRUE,
                            'referrence_code' => $param['InsuranceCode'],
                            'error_code' => "",
                            'error_message' => "",
                            'insurance_certificate' => $actual_file_url
                        ], REST_Controller::HTTP_CREATED);
                    } catch (S3Exception $e) {
                        $this->response([
                            'status' => FALSE,
                            'referrence_code' => "",
                            'error_code' => "3",
                            'error_message' => "Error while uploading to server.",
                            'insurance_certificate' => ""
                        ], REST_Controller::HTTP_BAD_REQUEST);
                    }
                } else {
                    $this->response([
                        'status' => FALSE,
                        'referrence_code' => "",
                        'error_code' => "2",
                        'error_message' => "Error while saving records.",
                        'insurance_certificate' => ""
                    ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                }
            } else {
                $this->response([
                    'status' => FALSE,
                    'referrence_code' => "",
                    'error_code' => "1",
                    'error_message' => "Duplicate record with same Insurance Code.",
                    'insurance_certificate' => ""
                ], REST_Controller::HTTP_CONFLICT);
            }
        }
        else
        {
            $this->response([
                    'status' => FALSE,
                    'referrence_code' => "",
                    'error_code' => "4",
                    'error_message' => "Invalid Product Code.",
                    'insurance_certificate' => ""
                ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    private function requireValidation($param) {
        $invalid = 0;
        $invalid_param = array ();
        foreach ( $param as $key => $value ) {
            if ($value == "" || ! ($key) || $value == " ") {
                $invalid ++;
                $invalid_param [] = $key;
            }
        }
        
        $hasil = array (
                'invalid' => $invalid,
                'invalid_index' => $invalid_param,
                'status' => ($invalid > 0) ? false : true 
        );
        if (! $hasil ['status']) {
            $this->response([
                'status' => FALSE,
                'error_message' => "Invalid paramaters.",
                'invalid_param' => $invalid_param
            ], REST_Controller::HTTP_FORBIDDEN);
        } else {
            return $hasil;
        }
    }
}

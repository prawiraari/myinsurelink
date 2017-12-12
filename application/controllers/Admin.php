<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CORE_Controller {

	public function __construct()
    {
        parent::__construct();
    }

    public function index($pParam=null)
    {
        if ($this->session->userdata('admin_email') == "") {
            $this->load->view("admin/view_login");
            return;
        }

        redirect("admin/home");
    }

    public function login($pParam=null)
    {
        $this->load->model("model_employee");
        $this->load->model("model_user");

        $param["EmailAddress"] = $this->input->post("email_address", TRUE);
        $param["Password"] = $this->input->post("password", TRUE);
        $param["IPAddress"] = $this->input->post("h_ip_address", TRUE);

        $return_sys_user = $this->model_employee->login($param);

        if ($return_sys_user) {
            $this->model_user->update_last_login_success($param["EmailAddress"]);
            
            $newdata = [
               'admin_user_id'  => $return_sys_user->UserID,
               'admin_email'     => $return_sys_user->EmailAddress,
               'admin_full_name' => $return_sys_user->Name
            ];

            $this->session->set_userdata($newdata);

            redirect("admin/home");
        } else {
            $this->model_user->update_last_login_failed($param["EmailAddress"]);

            $data["pMessage"] = "Email not exist, or invalid password";
            $this->load->view("admin/view_login", $data);
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        
        redirect('admin');
    }

    public function home($pParam=null)
    {
        if ($this->session->userdata('admin_email') == "") {
            $this->load->view("admin/view_login");
            return;
        }

        $this->load->view("admin/view_header");
        $this->load->view("admin/view_home");
        $this->load->view("admin/view_footer");
    }

    public function manage($pParam=null, $pParam2=null)
    {
        if ($this->session->userdata('admin_email') == "")
        {
            $this->load->view("admin/view_login");
            return;
        }

        switch ($pParam) {
            case "add":
            {
                $param["FirstName"] = $this->input->post('txt_first_name', TRUE);
                $param["LastName"] = $this->input->post('txt_last_name', TRUE);
                $param["EmailAddress"] = $this->input->post('txt_email', TRUE);
                $param["Password"] = $this->input->post('txt_password', TRUE);
                $param["Status"] = $this->input->post('rdb_status', TRUE);
                $param["CreatedBy"] = $this->session->userdata('admin_user_id');

                $this->db->trans_begin();

                $this->load->model('model_user');
                $user = $this->model_user->add($param);

                $param["UserID"] = $user["UserID"];

                $this->load->model('model_employee');
                $this->model_employee->add($param);

                $this->load->model('model_email');
                $this->model_email->add($param);

                if ($this->db->trans_status() === FALSE) {
                    $db_error = $this->db->error();
                    $this->db->trans_rollback();
                    $this->session->set_flashdata('pError', "An error has occurred, please try again later. (".$db_error["code"].")");
                } else {
                    $this->db->trans_commit();
                    $this->session->set_flashdata('pMessage', "The record has been updated successfully");
                }

                redirect("admin/manage/listing"); 
                break;
            }
            case "check":
            {
                $this->load->model('model_employee');
                $email = $this->input->post("txt_email", TRUE);
                $is_exist = $this->model_employee->check($email);
                
                echo json_encode($is_exist);
                break;
            }
            case "get":
            {
                $this->load->model('model_employee');
                $employee_id = $this->input->post("sys_user_id", TRUE);
                $row = $this->model_employee->get($employee_id);

                $data = array(
                    'email' => $row->EmailAddress,
                    'first_name' => $row->FirstName,
                    'last_name' => $row->LastName,
                    'status' => $row->Active
                );
                
                echo json_encode($data);
                break;
            }
            case "listing":
            {
                $this->load->model('model_employee');
                $param["Active"] = -1;
                $data["user_list"] = $this->model_employee->listing($param);

                $this->load->view('admin/view_header');
                $this->load->view('admin/view_admin', $data);
                $this->load->view('admin/view_footer');
                break;
            }
            case "update":
            {
                $this->db->trans_begin();

                $param["FirstName"] = $this->input->post('txt_first_name', TRUE);
                $param["LastName"] = $this->input->post('txt_last_name', TRUE);
                $param["Status"] = $this->input->post('rdb_status', TRUE);
                $param["EmployeeID"] = $this->input->post('h_sys_user_id', TRUE);

                $this->load->model('model_employee');
                $this->model_employee->update($param);

                if ($this->db->trans_status() === FALSE) {
                    $db_error = $this->db->error();
                    $this->db->trans_rollback();
                    $this->session->set_flashdata('pError', "An error has occurred, please try again later. (".$db_error["code"].")");
                } else {
                    $this->db->trans_commit();
                    $this->session->set_flashdata('pMessage', "The record has been updated successfully");
                }

                redirect("admin/manage/listing"); 
                break;
            }
            case "update_password":
            {
                $param["Password"] = $this->input->post('txt_password_change', TRUE);
                $param["EmployeeID"] = $this->input->post('h_sys_user_id', TRUE);

                $this->db->trans_begin();

                $this->load->model('model_employee');
                $employee = $this->model_employee->get($param["EmployeeID"]);

                $this->load->model('model_user');
                $param["UserID"] = $employee->UserID;
                $this->model_user->update_password($param);

                if ($this->db->trans_status() === FALSE) {
                    $db_error = $this->db->error();
                    $this->db->trans_rollback();
                    $this->session->set_flashdata('pError', "An error has occurred, please try again later. (".$db_error["code"].")");
                } else {
                    $this->db->trans_commit();
                    $this->session->set_flashdata('pMessage', "The record has been updated successfully");
                }

                redirect("admin/manage/listing"); 
                break;
            }
        }
    }
}
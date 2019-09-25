<?php
class Mycontroller extends CI_Controller {

    public function __construct() {

        parent::__construct();
        if($this->uri->segment(1) != "" && $this->uri->segment(2) != "lck" )
        {
            if(empty($this->session->userdata['sessiondata'])) {
                redirect(base_url());
            }
        }
        // $this->output->enable_profiler(TRUE);

    }

    public function index() {
        if (isset($this->session->userdata['sessiondata'])) {
            $this->lck();
            exit;
        } else {
            $this->login();
        }
    }

    public function login() {
        $this->Demo_Model->login();
        $this->output->delete_cache();
        $this->load->view('login');
    }
    public function lck() {
        if (isset($this->session->userdata['sessiondata'])) {
            redirect('Welcome');
        } else {
            $id = $this->input->post("uname");
            $pass = $this->input->post("upass");
            $verify = $this->Demo_Model->userchk($id, $pass);
            if ($verify == 1) {
                $result = $this->session->userdata['sessiondata'];

                redirect('Application_1');
            } else {
                $this->session->set_flashdata('usercheck', 'Invalid Username or Password');
                $this->load->view('login');
            }
        }
    }
  public function form1() {
       // $this->sess();
        $this->load->view('form1');
    }
    
     public function form2() {
        $result= $this->session->userdata['appdata'];
        $verify = $result['app1'];
        if($verify!=1)
        {
            redirect('Application_1');
        }
        $this->load->view('form2');
    }
     public function form3() {
        $result= $this->session->userdata['appdata'];
        $verify = $result['app2'];
        if($verify!=1)
        {
            redirect('Application_2');
        }
        $this->load->view('form3');
    }
    
    public function form1_submit()
    {
     $username = $this->input->post("username");
      $skills = $this->input->post("skills")
          $this->Demo_Model->form1_submit($username, $skills);
    }
     public function form2_submit()
    {
     $project_name = $this->input->post("project_name");
      $project_info = $this->input->post("project_info")
          $this->Demo_Model->form2_submit($project_name, $project_info);
    }
    
     public function lout() {

        if (isset($this->session->userdata['sessiondata'])) {
            $this->session->sess_destroy();
            redirect(base_url());

            exit;
        } else {
            $this->lck();
            exit;
        }
    }

}

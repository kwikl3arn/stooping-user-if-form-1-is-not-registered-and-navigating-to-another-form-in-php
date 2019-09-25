class Demo_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
        error_reporting(0);
    }
     //user login check
    public function userchk($id, $pass) {
        $this->db->select("*");
        $this->db->from("users");
        $this->db->where("user_id", $id);
        $this->db->where("user_password", $pass);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $session_data = $query->row_array();
            $this->session->set_userdata('sessiondata', $session_data);
            
            //based on this user will not navigate to another unless,he submit form1
            $session_data = array('app1' => 0,'app2' => 0);
            $this->session->set_userdata('appdata', $session_data);
                    
                    return 1;
        } else {
            return 0;
        }
    }
    public function form1_submit($username,$skills)
    {
    $data = array(
            'username' => $username,
            'skills' => $skills,
            );
             $this->db->insert('form1', $data);
    }
     $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            // Something went wrong.
            $this->db->trans_rollback();
          //  $this->session->set_flashdata('err', 'something went wrong');
            redirect('Application_1');
        } else {
        
            $result= $this->session->userdata['appdata'];
            $done=array('app1'=> 1);
            //updateing single array in the session
            $session_data = array_replace($result,$done);
            $this->session->set_userdata('appdata', $session_data);
            
            // Committing data to the database.
            $this->db->trans_commit();
           // $this->session->set_flashdata('save', 'submited successfully');
            redirect('Application_2');
        }
        
      public function form2_submit($project_name,$project_info)
    {
    $data = array(
            'project_name' => $project_name,
            'project_info' => $project_info,
            );
             $this->db->insert('form2', $data);
    }
     $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            // Something went wrong.
            $this->db->trans_rollback();
          //  $this->session->set_flashdata('err', 'something went wrong');
            redirect('Application_2');
        } else {
        
            $result= $this->session->userdata['appdata'];
            $done=array('app2'=> 1);
            //updateing single array in the session
            $session_data = array_replace($result,$done);
            $this->session->set_userdata('appdata', $session_data);
            
            // Committing data to the database.
            $this->db->trans_commit();
           // $this->session->set_flashdata('save', 'submited successfully');
            redirect('Application_3');
        }
    }

<?php if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

class Ajax extends CI_Controller {



  /**
   * Check client on input blur
   */
  public function check_client() {
    $title = $this->input->post('title');
    $this->load->model('admin_model');
    $check_title= $this->admin_model->verify_client($title);
    $result = array();
    if($title === $check_title[0]['title']){
      $result['result'] ='"'.$title.'"'. ' is already registered';
    }
    else {
      $result['result'] = null;
    }

    echo json_encode($result);

  }

    /**
     * Check login avatar
     */
    public function check_login_avatar() {
        $this->load->model('admin_model');
        $this->load->model('files_model');
        $email = $_POST['email'];
        $check_email= $this->admin_model->check_email($email);
        $getuser= $this->admin_model->get_user($email);
        $id =  $getuser[0]['id'];
        $avatar= $this->files_model->search_avatar($id);
        $result = array();
        if($email !== $check_email[0]['email']){
            $result['result'] = FALSE;
            $result['avatar'] = $avatar[0]['filename'];
        }
        else {
            $result['result'] =TRUE;
            $result['id'] = $id;
            $result['avatar'] = $avatar[0]['filename'];
        }

        echo json_encode($result);
    }


    /**
     * Check emails
     */
    public function check_emails() {
        $result['result'] = TRUE;
        $this->load->model('admin_model');
        $email = $_POST['email'];
        $query= $this->admin_model->emails_users($email);
        foreach($query as $v) {
            if($v['email'] == $email) {
             $result['result'] = 'This email already registered';
            }
        }
        $query= $this->admin_model->emails_client($email);
        foreach($query as $v) {
            if($v['email'] == $email) {
                $result['result'] = 'This email already registered';
            }
        }
        $query= $this->admin_model->emails_new($email);
        foreach($query as $v) {
            if($v['email'] == $email) {
                $result['result'] = 'This email already registered';
            }
        }

        $query= $this->admin_model->emails_added($email);
        foreach($query as $v) {
            if($v['email'] == $email) {
                $result['result'] = 'This email already registered';
            }
        }
        echo json_encode($result);
    }


    /**
   * Success modal
   */

  public function success() {
    $result =  $_POST['result'];
    $url = base_url();
    $status = array("URL"=>$url, "RESULT"=>$result);
    echo json_encode ($status) ;
  }

  /**
   * Check online status
   */

  public function check_online() {

    $query = $this->db->get('users');
   $result= $query->result_array();

    if($result){
      $status=array();
      foreach($result as $ok=>$ov) {
        array_push($status, $ov);
      }
      $status['status'] =$status;
    }else{
      $status['result'] = FALSE;
    }
    echo json_encode ($status);
  }

    /**
     * Add client
     */

    public function addclient() {
    $result = array();
    $this->load->library('form_validation');
    $this->form_validation->set_rules('title', 'Company title', 'trim|required|min_length[3]');
    $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');
    $this->form_validation->set_rules('phone', 'Phone number', 'trim|required|min_length[3]');
    $this->form_validation->set_rules('address', 'Address', 'trim|required|min_length[3]');
    $this->form_validation->set_rules('city', 'City', 'trim|required');
    $this->form_validation->set_rules('country', 'Country', 'trim|required');
    if ($this->form_validation->run() !== false) {
      $this->load->model('admin_model');
      $query = $this->admin_model->create_client();
      if ($query){  //&& any other condition
        $result['title'] = $_POST['title'];
        $result['email'] = $_POST['email'];
        $result['description'] = $_POST['description'];
        $result['url'] = $_POST['url'];
        $result['phone'] = $_POST['phone'];
        $result['title'] = $_POST['address'];
        $result['index'] = $_POST['index'];
        $result['city'] = $_POST['city'];
        $result['country'] = $_POST['country'];
        $result['curator'] = $_POST['curator'];
        $result['error'] = 0;
        $result['result'] = "<ul><li> Company ".$_POST['title']."</li><li> Email ".$_POST['email']."</li><li> Description ".substr($_POST['description'],1,50)."</li><li> URL ".$_POST['url']."</li><li> Phone ".$_POST['phone']."</li><li> Address ".$_POST['address']."</li><li> Index ".$_POST['index']."</li><li> City ".$_POST['city']."</li><li>Country ".$_POST['country']."</li></ul><div>Was successfully created</div>";
      }
      else {
        $result['error'] = 1;
        $result['result'] = 'Error in Database';
      }
    }
    else {
      $result['error'] = 1;
      $result['result'] = validation_errors();
    }
    echo json_encode($result); //At the end of the function.
  }

    /**
     * Upload avatar
     */

    function do_upload() {
        $this->load->model('files_model');
        $status = "";
        $msg = "";
        $del = "";
        $new_avatar = "";
        $file_element_name = 'userfile';
        if (empty($_POST['user_id'])) {
            $status = "error";
            $msg = "Something wrong...";
        }

        if ($status != "error") {
            $config['upload_path'] = './uploads/avatar';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 1024 * .5;
            $config['encrypt_name'] = FALSE;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload($file_element_name)) {
                $status = 'error';
                $msg = $this->upload->display_errors('', '');
            }
            else {
                $data = $this->upload->data();
//                search avatar if not found we insert new one
                $search = $this->files_model->search_avatar($_POST['user_id']);

                if(!empty($search)) {
                    $old_file =   './uploads/avatar/'.$search[0]['filename'];
                    if(unlink($old_file)) {
                        $del= 'ok';
                    }
                    else {
                        $del= 'no';
                    }
                    $file_id = $this->files_model->update_avatar($data['file_name'], $_POST['user_id']);
                    $search_new = $this->files_model->search_avatar($_POST['user_id']);
                    $new_avatar = $search_new[0]['filename'];
                }
                else {
                    $file_id = $this->files_model->insert_avatar($data['file_name'], $_POST['user_id']);
                    $search_new = $this->files_model->search_avatar($_POST['user_id']);
                    $new_avatar = $search_new[0]['filename'];
                }

                if($file_id) {

                    $status = $search[0]['filename'];
                    $msg = "File successfully uploaded";
                }
                else {
                    unlink($data['full_path']);
                    $status = "error";
                    $msg = "Something went wrong when saving the file, please try again.";
                }
            }
            @unlink($_FILES[$file_element_name]);
        }
        echo json_encode(array('status' => $status, 'msg' => $msg,  'delete' => $del, 'new_avatar' => $new_avatar));
    }


    /**
     * INVITATION NEW PERSON
     */
    function invitation() {
        $url = base_url();
        $result['email'] = true;
        $result['check_email'] = true;
        $result['empty'] = true;
        $result['send'] = false;
        $this->load->model('admin_model');
        $email = trim($_POST['email']);
        $fname = trim($_POST['first_name']);
        $lname = trim($_POST['last_name']);
        $role = $_POST['role'];
        $user_id = $_POST['user_id'];
        $user_array = $this->admin_model->get_user_id($user_id);
//        get curator data
        $curator_fname = $user_array[0]['first_name'];
        $curator_lname = $user_array[0]['last_name'];
        $curator_name = $curator_fname. ' '.$curator_lname;
        $curator_email = $user_array[0]['email'];
        $query= $this->admin_model->emails_users($email);
        foreach($query as $v) {
            if($v['email'] == $email) {
                $result['email'] = false;
            }
        }
        $query= $this->admin_model->emails_client($email);
        foreach($query as $v) {
            if($v['email'] == $email) {
                $result['email'] = false;
            }
        }
        $query= $this->admin_model->emails_new($email);
        foreach($query as $v) {
            if($v['email'] == $email) {
                $result['email'] = false;
            }
        }

        $query= $this->admin_model->emails_added($email);
        foreach($query as $v) {
            if($v['email'] == $email) {
                $result['email'] = false;
            }
        }

        if($email == '' OR $fname == '' OR $lname == '') {
            $result['empty'] = false;
        }
        else {
            $result['empty'] = true;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $result['check_email'] = false;
        }
        else {
            $result['check_email'] = true;
        }

        // mail to user
        // Generate password
        $letter = 'qwertyuipasdfghjklzxcvbnm';
        $letter .= strtoupper($letter);
        $letter .= '123456789';
        $pass = '';
        for ($i = 0; $i < 6; $i++){
            $pass .= $letter[mt_rand(0, strlen($letter)-1)];
        }

        if ($result['email'] == true AND $result['empty'] == true AND $result['check_email'] == true ) {
            if ($query = $this->admin_model->insert_user($fname,$lname,$role,$email,$pass)) {
            $this->load->library('email');
            $this->email->from($curator_email, $curator_name);
            $this->email->to($email);
            $this->email->subject('Invitation from Brilliant project management');
            $this->email->message("Hello, ".$fname." ".$lname."\n"."\n".$curator_name." Invites you to Brilliant Project management"."\n"."\n".
            "Link: ".$url."\n"."\n"."Username: ".$email."\n"."\n"."Password: ".$pass."\n"."\n");
            $this->email->send();
            $result['send'] = true;
            }
        }

        echo json_encode($result);
    }


    /**
     * Add project
     */

    function addproject() {
        $this->load->model('project_model');
        $result['empty'] = true;
        $result['send'] = false;
        $title = $_POST['project_title'];
        $desc = $_POST['project_desc'];
        $uid = $_POST['user_id'];
        $result['id']=$uid;
        $result['title']=$title;
        $result['desc']=$desc;
        if ($title == '' OR $desc == '') {
            $result['empty'] = false;
        }
        else {
            $text ='created project';
            $event ='project';
            $this->project_model->createEvent($uid, $event, $text);
            if ($query = $this->project_model->create_project($title, $desc, $uid)) {
                $result['send'] = true;
            }
        }
        echo json_encode($result);
    }

    /**
     * Get user ID for localStorage
     */

    function getUserId() {
        $result =$this->session->userdata('user_id');
        echo json_encode (array('id'=>$result[0]['id']));
    }

    /**
     * countProjects
     */

    function countProjects() {
        $this->load->model('project_model');
        $result = $this->project_model->countProjects();
        echo json_encode ($result);
    }

    /**
     * Read event
     */
    function readEvent() {
        $this->load->model('project_model');
        $result = $this->project_model->readEvent();
        echo json_encode ($result);
    }
}



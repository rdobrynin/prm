<?php if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

class Admin extends CI_Controller {

  function __construct() {
    parent::__construct();
    session_start();
  }

  public function index() {

    if(isset($_SESSION['username'])) {
      redirect('dashboard');
    }

    $this->load->library('form_validation');
    $this->form_validation->set_rules('email_address', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'required|min_length[4]');

    if ($this->form_validation->run() !== false) {
      $this->load->model('admin_model');
     $res = $this
       ->admin_model
       ->verify_user(
         $this->input->post('email_address'),
         $this->input->post('password'));
      if($res !== false) {
//person has account
        $_SESSION['username'] = $this->input->post('email_address');
        redirect('dashboard');
      }
      else {
        echo 'Wrong password';
      }
    }
    $this->load->view('login_view');
  }

// logout and session destroy
  function logout() {
    session_destroy();
    $this->load->view('login_view');
  }

//  sign up
//  function signup() {
//    if(isset($_SESSION['username'])) {
//      redirect('dashboard');
//    }
//    $this->load->view('signup_view');
//  }

//  validate sign form

  function signup() {

    $this->load->library('form_validation');
    $this->form_validation->set_rules('email_address_signup', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('password_signup', 'Password', 'required|min_length[4]');
    if ($this->form_validation->run() !== false) {
      echo('thanx for registration');
    }
      else {
        $this->load->view('signup_view');
      }
  }

//  forgot password or username
  function forgot() {
    session_destroy();
    $this->load->view('forgot_view');
  }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model(array('Dbs'));
  }

  function index()
  {
    $this->load->view('vLogin');
  }

  function auth(){//Proses pengecekan login
    $username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => md5($password)
			);
		$sql = $this->Dbs->check("user",$where);//ubah user menjadi nama table user didatabase saat ini
    $check=$sql->num_rows();
		if($check > 0){
      //Kalo login berhasil eksekusi disini

		}else{
      $this->session->set_flashdata('flashMessage', 'Username dan Password Salah');
      redirect(base_url('login'));
		}
  }




  function randomPassword($length = 3) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

public function email($subject,$isi,$emailtujuan){

$config['protocol'] = 'smtp';
$config['smtp_host'] = 'ssl://smtp.gmail.com';
$config['smtp_port'] = '465';
$config['smtp_user'] = 'shopagansta@gmail.com';
$config['smtp_pass'] = 'faztars123'; //ini pake akun pass google email
$config['mailtype'] = 'html';
$config['charset'] = 'iso-8859-1';
$config['wordwrap'] = 'TRUE';
$config['newline'] = "\r\n";

$this->load->library('email', $config);
$this->email->initialize($config);

$this->email->from('shopagansta@gmail.com');
$this->email->to($emailtujuan);
$this->email->subject($subject);
$this->email->message($isi);
$this->email->set_mailtype('html');
$this->email->send();
}

  function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}



  // function reset(){
  //   $email=$this->input->post('email');
  //   $where = array(
	// 		'email' => $email,
	// 		);
	// 	$sql = $this->Dbs->check("user",$where);
  //   $check=$sql->num_rows();
	// 	if($check > 0){
  //     $getdatauser=$sql->result();
  //     $passwordBaru="pwBaru".$this->randomPassword();
  //     $username=$getdatauser[0]->username;
  //     $data = array(
  //       'password' => md5($passwordBaru)
  //     );
  //     $this->User_model->update($username,$data);
  //     $this->email("Info Akun","Password Baru Anda : ".$passwordBaru,$email);
  //     $this->session->set_flashdata('flashMessage', 'Password baru telah terkirim,silahkan cek email anda');
  //     redirect(base_url('login'));
  //   }else{
  //     $this->session->set_flashdata('flashMessage', 'Email yang anda masukan belum pernah didaftarkan');
  //     redirect(base_url('login'));
  //   }
  //
  // }

}

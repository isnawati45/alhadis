<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function login()
	{
		check_already_login();
		$this->load->view('login');
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['login'])) {
			$this->load->model('admin_m');
			$query = $this->admin_m->login($post);
			if($query->num_rows() > 0){
				$row = $query->row();
				$params = array(
					'id_admin' => $row->id_admin,
					'level' => $row->level 	
				);
				$this->session->set_userdata($params);
				echo "<script>
				alert('Selamat, login berhasil');
				window.location='".base_url('dashboard')."';
				</script>";
			} else {
				echo "<script>
				alert('Login gagal, username/password salah');
				window.location='".base_url('auth/login')."';
				</script>";				
			}
		}
	}

	public function logout()
	{
		$params = array('id_admin', 'level');
		$this->session->unset_userdata($params);
		redirect('auth/login');
	}
}

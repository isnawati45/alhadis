<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('admin_m');
    }

	public function index()
	{
		$data['title']= 'Dashboard';
		$data['admin'] = $this->admin_m->get();
		$this->template->load('template', 'dashboard', $data);
	}
}

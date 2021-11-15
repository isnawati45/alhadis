<?php

Class Fungsi {

    protected $ci;

    function __construct(){
        $this->ci =& get_instance();
    }

    function admin_login(){
        $this->ci->load->model('admin_m');
        $id_admin = $this->ci->session->userdata('id_admin');
        $admin_data = $this->ci->admin_m->get($id_admin)->row();
        return $admin_data;
    }

    public function admin_count(){
        $this->ci->load->model('admin_m');
        return $this->ci->admin_m->get()->num_rows();
    }

    public function hadis_count(){
        $this->ci->load->model('hadis_m');
        return $this->ci->hadis_m->get_hadis()->num_rows();
    }

    public function sumber_count(){
        $this->ci->load->model('sumber_m');
        return $this->ci->sumber_m->get_sumber()->num_rows();
    }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('admin_m');
    }
    
	public function index()
	{
        $data['title'] = "Data Admin";
        $data['dataAdmin'] = $this->admin_m->get();
		$this->template->load('template', 'admin/admin_data', $data);
    }
    
    public function add()
    {
        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[3]|is_unique[tb_admin.username]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'required|matches[password]',
            array('matches' => '%s Tidak Sesuai dengan Password')
        );
        $this->form_validation->set_rules('level', 'Level', 'required');

        $this->form_validation->set_message('required', '%s masih kosong, silakan isi');
        $this->form_validation->set_message('min_length', '{field} minimal 3 karakter');
        $this->form_validation->set_message('is_unique', '%s sudah ada yang pakai');

        $this->form_validation->set_error_delimiters('<div class="invalid-feedback"></div>');

        if ($this->form_validation->run() == FALSE){
            $data['title'] = "Tambah Admin";
            $this->template->load('template', 'admin/admin_add', $data);
        }else{
            $post = $this->input->post(null, TRUE);
            $this->admin_m->add($post);
            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            }
            echo "<script>window.location='".base_url('admin')."';</script>";
        }
    }

    public function delete($id_admin)
    {
        $this->db->where('id_admin', $id_admin);
        $this->db->delete('tb_admin');
        $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        redirect('admin');
    }

    public function edit($id)
    {        
        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[3]|callback_username_check');
        
        if($this->input->post('password')){
            $this->form_validation->set_rules('password', 'Password');
            $this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'matches[password]',
                array('matches' => '%s Tidak Sesuai dengan Password')
            );
        }
        if($this->input->post('passconf')){
            $this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'matches[password]',
                array('matches' => '%s Tidak Sesuai dengan Password')
            );
        }
        
        $this->form_validation->set_rules('level', 'Level', 'required');

        $this->form_validation->set_message('required', '%s masih kosong, silakan isi');
        $this->form_validation->set_message('min_length', '{field} minimal 3 karakter');
        $this->form_validation->set_message('is_unique', '%s sudah dipakai, silakan ganti');

        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span/>');

        if ($this->form_validation->run() == FALSE){
            $query = $this->admin_m->get($id);
            if($query->num_rows() > 0) {
                $data['title'] = "Edit Admin";
                $data['dataAdmin'] = $query->row();
                $this->template->load('template', 'admin/admin_edit', $data);
            } else {
                echo "<script>alert('data tidak ditemukan');";
                echo "window.location='".base_url('admin')."';</script>";
            }
        } else {
            $post = $this->input->post(null, TRUE);
            $this->admin_m->edit($post);
            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('success', 'Data Berhasil Diubah');
            }
            echo "<script>window.location='".base_url('admin')."';</script>";
        }
    }

    function username_check()
    {
        $post = $this->input->post(null, TRUE);
        $query = $this->db->query("SELECT * FROM tb_admin WHERE username = '$post[username]' AND id_admin != '$post[id_admin]'");
        if($query->num_rows() > 0) {
            $this->form_validation->set_message('username_check', '{field} ini sudah dipakai, silakan ganti');
            return FALSE;
        } else {
            return TRUE;
        }
    }
}

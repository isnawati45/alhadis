<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sanad extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('sanad_m');
    }

    public function index()
    {
        $data['datasanad'] = $this->sanad_m->get_sanad()->result_array();
        $data['title']= 'Data Sanad';
        $this->template->load('template', 'datas/sanad', $data);

        $this->form_validation->set_rules('nama_sanad', 'nama_sanad', 'required');
        $this->form_validation->set_rules('kuniyah', 'kuniyah');
        $this->form_validation->set_rules('kalangan', 'kalangan', 'required');
        $this->form_validation->set_rules('negeri', 'negeri', 'required');
        $this->form_validation->set_rules('wafat', 'wafat');
        $this->form_validation->set_rules('keterangan', 'keterangan');
        
        if ($this->form_validation->run() == FALSE) {
            // code ...
        } else {
            $data = [
            'nama_sanad' => $this->input->post('nama_sanad'),
            'kuniyah' => $this->input->post('kuniyah'),
            'kalangan' => $this->input->post('kalangan'),
            'negeri' => $this->input->post('negeri'),
            'wafat' => $this->input->post('wafat'),
            'keterangan' => $this->input->post('keterangan')
            ];
            $this->db->insert('tb_sanad', $data);
            $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            redirect('sanad');
        }
    }

    public function get_ubah_sanad()
    {
        echo json_encode($this->sanad_m->get_sanad_byId($_POST['id_sanad']));
    }

    public function ubah_sanad()
    {
        if ($this->sanad_m->get_ubah_sanad($_POST) > 0) {
            $this->session->set_flashdata('fail', 'Data Gagal Diubah');
        redirect('sanad');
        } else {
            $this->session->set_flashdata('success', 'Data Berhasil Diubah');
        redirect('sanad');
        }
    }

    public function delete($id_sanad)
    {
        $this->sanad_m->delete($id_sanad);
        $error = $this->db->error();
        if($error['code'] != 0) {
            $this->session->set_flashdata('fail', 'Data Tidak Bisa dihapus');
        } else {
            $this->session->set_flashdata('success', 'Data Berhasil dihapus');
        }
        redirect('sanad');        
    }
}
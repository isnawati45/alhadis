<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sumber extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('sumber_m');
    }

    public function index()
    {
        $data['datasumber'] = $this->sumber_m->get_sumber()->result_array();
        $data['title']= 'Data Buku';
        $this->template->load('template', 'datas/sumber', $data);

        $this->form_validation->set_rules('sumber', 'sumber', 'required');
        $this->form_validation->set_rules('penulis', 'penulis', 'required');
        $this->form_validation->set_rules('penerjemah', 'penerjemah', 'required');
        $this->form_validation->set_rules('penerbit', 'penerbit', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            // code ...
        } else {
            $data = [
            'sumber' => $this->input->post('sumber'),
            'penulis' => $this->input->post('penulis'),
            'penerjemah' => $this->input->post('penerjemah'),
            'penerbit' => $this->input->post('penerbit')
            ];
            $this->db->insert('tb_sumber', $data);
            $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            redirect('sumber');
        }
    }

    public function get_ubah_sumber()
    {
        echo json_encode($this->sumber_m->get_sumber_byId($_POST['id_sumber']));
    }

    public function ubah_sumber()
    {
        if ($this->sumber_m->get_ubah_sumber($_POST) > 0) {
            $this->session->set_flashdata('fail', 'Data Gagal Diubah');
        redirect('sumber');
        } else {
            $this->session->set_flashdata('success', 'Data Berhasil Diubah');
        redirect('sumber');
        }
    }

    public function delete($id_sumber)
    {
        $this->sumber_m->delete($id_sumber);
        $error = $this->db->error();
        if($error['code'] != 0) {
            $this->session->set_flashdata('fail', 'Buku Sedang dipakai Sebagai Sumber Hadis');
        } else {
            $this->session->set_flashdata('success', 'Data Berhasil dihapus');
        }
        redirect('sumber');
        
    }



}
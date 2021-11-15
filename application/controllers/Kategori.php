<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('kategori_m');
    }

    public function index()
    {
        $data['datakategori'] = $this->kategori_m->get_kategori()->result_array();
        $data['title']= 'Data Kategori';
        $this->template->load('template', 'datas/kategori', $data);

        $this->form_validation->set_rules('kategori', 'kategori', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            // code ...
        } else {
            $data = [
            'kategori' => $this->input->post('kategori')
            ];
            $this->db->insert('tb_kategori', $data);
            $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            redirect('kategori');
        }
    }

    public function get_ubah_kategori()
    {
        echo json_encode($this->kategori_m->get_kategori_byId($_POST['id_kategori']));
    }

    public function ubah_kategori()
    {
        if ($this->kategori_m->get_ubah_kategori($_POST) > 0) {
            $this->session->set_flashdata('fail', 'Data Gagal Diubah');
        redirect('kategori');
        } else {
            $this->session->set_flashdata('success', 'Data Berhasil Diubah');
        redirect('kategori');
        }
    }

    public function delete($id_kategori)
    {
        $this->kategori_m->delete($id_kategori);
        $error = $this->db->error();
        if($error['code'] != 0) {
            $this->session->set_flashdata('fail', 'Kategori Tidak Bisa dihapus');
        } else {
            $this->session->set_flashdata('success', 'Data Berhasil dihapus');
        }
        redirect('kategori');        
    }
}
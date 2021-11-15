<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ulamasyarah extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('ulamasyarah_m');
    }

    public function index()
    {
        $data['ulamasyarah'] = $this->ulamasyarah_m->get_ulamasyarah()->result_array();
        $data['title']= 'Data Ulama Syarah';
        $this->template->load('template', 'datas/ulama_syarah', $data);

        $this->form_validation->set_rules('ulama_syarah', 'ulama_syarah', 'required');
        $this->form_validation->set_rules('keterangan', 'keterangan');
        
        if ($this->form_validation->run() == FALSE) {
            // code ...
        } else {
            $data = [
            'ulama_syarah' => $this->input->post('ulama_syarah'),
            'keterangan' => $this->input->post('keterangan')
            ];
            $this->db->insert('tb_ulamasyarah', $data);
            $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            redirect('ulamasyarah');
        }
    }

    public function get_ubah_ulamasyarah()
    {
        echo json_encode($this->ulamasyarah_m->get_ulamasyarah_byId($_POST['id_ulamasyarah']));
    }

    public function ubah_ulamasyarah()
    {
        if ($this->ulamasyarah_m->get_ubah_ulamasyarah($_POST) > 0) {
            $this->session->set_flashdata('fail', 'Data Gagal Diubah');
        redirect('ulamasyarah');
        } else {
            $this->session->set_flashdata('success', 'Data Berhasil Diubah');
        redirect('ulamasyarah');
        }
    }

    public function delete($id_ulamasyarah)
    {
        $this->ulamasyarah_m->delete($id_ulamasyarah);
        $error = $this->db->error();
        if($error['code'] != 0) {
            $this->session->set_flashdata('fail', 'Data Tidak Bisa dihapus');
        } else {
            $this->session->set_flashdata('success', 'Data Berhasil dihapus');
        }
        redirect('ulamasyarah');        
    }
}
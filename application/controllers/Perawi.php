<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perawi extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('perawi_m');
    }

    public function index()
    {
        $data['dataperawi'] = $this->perawi_m->get_perawi()->result_array();
        $data['title']= 'Data Perawi';
        $this->template->load('template', 'datas/perawi', $data);

        $this->form_validation->set_rules('nama_perawi', 'nama_perawi', 'required');
        $this->form_validation->set_rules('keterangan', 'keterangan');
        
        if ($this->form_validation->run() == FALSE) {
            // code ...
        } else {
            $data = [
            'nama_perawi' => $this->input->post('nama_perawi'),
            'keterangan' => $this->input->post('keterangan')
            ];
            $this->db->insert('tb_perawi', $data);
            $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            redirect('perawi');
        }
    }

    public function get_ubah_perawi()
    {
        echo json_encode($this->perawi_m->get_perawi_byId($_POST['id_perawi']));
    }

    public function ubah_perawi()
    {
        if ($this->perawi_m->get_ubah_perawi($_POST) > 0) {
            $this->session->set_flashdata('fail', 'Data Gagal Diubah');
        redirect('perawi');
        } else {
            $this->session->set_flashdata('success', 'Data Berhasil Diubah');
        redirect('perawi');
        }
    }

    public function delete($id_perawi)
    {
        $this->perawi_m->delete($id_perawi);
        $error = $this->db->error();
        if($error['code'] != 0) {
            $this->session->set_flashdata('fail', 'Data Tidak Bisa dihapus');
        } else {
            $this->session->set_flashdata('success', 'Data Berhasil dihapus');
        }
        redirect('perawi');        
    }
}
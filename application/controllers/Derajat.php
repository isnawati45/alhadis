<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Derajat extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('derajat_m');
    }

    public function index()
    {
        $data['dataderajat'] = $this->derajat_m->get_derajat()->result_array();
        $data['title']= 'Data Derajat';
        $this->template->load('template', 'datas/derajat', $data);

        $this->form_validation->set_rules('derajat', 'derajat', 'required');
        $this->form_validation->set_rules('keterangan', 'keterangan');
        
        if ($this->form_validation->run() == FALSE) {
            // code ...
        } else {
            $data = [
            'derajat' => $this->input->post('derajat'),
            'keterangan' => $this->input->post('keterangan')
            ];
            $this->db->insert('tb_derajat', $data);
            $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            redirect('derajat');
        }
    }

    public function get_ubah_derajat()
    {
        echo json_encode($this->derajat_m->get_derajat_byId($_POST['id_derajat']));
    }

    public function ubah_derajat()
    {
        if ($this->derajat_m->get_ubah_derajat($_POST) > 0) {
            $this->session->set_flashdata('fail', 'Data Gagal Diubah');
        redirect('derajat');
        } else {
            $this->session->set_flashdata('success', 'Data Berhasil Diubah');
        redirect('derajat');
        }
    }

    public function delete($id_derajat)
    {
        $this->derajat_m->delete($id_derajat);
        $error = $this->db->error();
        if($error['code'] != 0) {
            $this->session->set_flashdata('fail', 'Derajat Tidak Bisa dihapus');
        } else {
            $this->session->set_flashdata('success', 'Data Berhasil dihapus');
        }
        redirect('derajat');        
    }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Hadis extends CI_Controller{
     
    function __construct(){
        parent::__construct();
        check_not_login();
        $this->load->model(['hadis_m','kategori_m', 'perawi_m', 'sumber_m', 'ulamasyarah_m', 'ulamatakrij_m', 'derajat_m', 'sanad_m', 'read_m']);
    }
 
    // READ
    public function index(){
        $hadis = $this->hadis_m->get_hadis();
        $data = [
            'title' => 'Data Hadis',
            'hadis' => $hadis,
        ];
        $this->template->load('template', 'hadis/hadis_data', $data);
    }
 

    public function create()
    {
        $hadis = new stdClass();
        $hadis->id = null;
        $hadis->id_kategori = null;
        $hadis->id_perawi= null;
        $hadis->judul = null;
        $hadis->matan = null;
        $hadis->terjemah = null;

        $hadis->id_sumber = null;
        $hadis->sumber = null;
        $hadis->penulis = null;
        $hadis->penerjemah = null;
        $hadis->penerbit = null;

        $hadis->catatan = null;
        $hadis->id_ulamatakrij = null;
        $hadis->ulama_takrij = null;
        $hadis->id_derajat = null; 
        $hadis->derajat = null; 
        $hadis->id_sanad = null; 
        $hadis->nama_sanad = null; 
        $hadis->sanad_matan = null; 
        $hadis->nama_perawi = null; 
        
        $hadis->s1 = null;
        $hadis->s2 = null;
        $hadis->s3 = null;
        $hadis->s4 = null;
        $hadis->s5 = null;

        $hadis->id_syarah = null;
        $hadis->id_ulamasyarah = null;
        $hadis->ulama_syarah = null;
        $hadis->no_syarah = null;
        $hadis->isi_syarah = null; 
      
        
        $kategori = $this->kategori_m->get_kategori();
        $perawi = $this->perawi_m->get_perawi();
        $sumber = $this->sumber_m->get_sumber();

        $ulama_takrij = $this->ulamatakrij_m->get_ulamatakrij();
        $derajat = $this->derajat_m->get_derajat();
        $sanad = $this->sanad_m->get_sanad();

        $ulama_syarah = $this->ulamasyarah_m->get_ulamasyarah();

        $data = [
            'page' => 'add',
            'title' => 'Tambah Hadis',
            'row' => $hadis,
            's1' => $hadis,
            's2' => $hadis,
            's3' => $hadis,
            's4' => $hadis,
            's5' => $hadis,
            'sumber' => $sumber,            
            'ulama_takrij' => $ulama_takrij,
            'derajat' => $derajat,
            'sanad' => $sanad,
            'kategori' => $kategori,
            'perawi' => $perawi,
            'ulama_syarah' => $ulama_syarah,
        ];
        $this->template->load('template', 'hadis/hadis_form', $data);
    }

    public function edit($id)
    {
        $query = $this->hadis_m->get_detail_hadis($id);
        $s1 = $this->hadis_m->get_name_s1($id)->row();
        $s2 = $this->hadis_m->get_name_s2($id)->row();
        $s3 = $this->hadis_m->get_name_s3($id)->row();
        $s4 = $this->hadis_m->get_name_s4($id)->row();
        $s5 = $this->hadis_m->get_name_s5($id)->row();
        if($query->num_rows() > 0) {
            $hadis = $query->row();           
            $kategori = $this->kategori_m->get_kategori();
            $perawi = $this->perawi_m->get_perawi();
            $derajat = $this->derajat_m->get_derajat();                        
            $sanad = $this->sanad_m->get_sanad();
            $ulama_takrij = $this->ulamatakrij_m->get_ulamatakrij();
            $ulama_syarah = $this->ulamasyarah_m->get_ulamasyarah();
            $sumber = $this->sumber_m->get_sumber();
            $data = [
                'page' => 'edit',
                'title' => 'Edit Hadis',
                'row' => $hadis,
                's1' => $s1,
                's2' => $s2,
                's3' => $s3,
                's4' => $s4,
                's5' => $s5,
                'kategori' => $kategori,
                'perawi' => $perawi,
                'sumber' => $sumber,
                'derajat' => $derajat,
                'sanad' => $sanad,

                'ulama_takrij' => $ulama_takrij,
                'ulama_syarah' => $ulama_syarah,
            ];
        $this->template->load('template', 'hadis/hadis_form', $data);
        } else {
            echo "<script>alert('Data tidak ditemukan');";
            echo "window.location='".base_url('hadis')."';</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if(isset($_POST['add'])) {
            $this->hadis_m->create();
            
        } else if(isset($_POST['edit'])) {
            $this->hadis_m->update($post);
        } 

        if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            echo "<script>window.location='".base_url('hadis')."';</script>";   
        } 
        else {        
            $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            echo "<script>window.location='".base_url('hadis')."';</script>";   
        }
    }

    public function detail($id = null)
    {
        $query = $this->hadis_m->get_detail_hadis($id);
        $s1 = $this->hadis_m->get_name_s1($id);
        $s2 = $this->hadis_m->get_name_s2($id);
        $s3 = $this->hadis_m->get_name_s3($id);
        $s4 = $this->hadis_m->get_name_s4($id);
        $s5 = $this->hadis_m->get_name_s5($id);
        if($query->num_rows() > 0) {
            $hadis = $query->row();
            $perawi = $this->hadis_m->get_detail_hadis($id);
            $data = [
                'title' => 'Detail Hadis',
                'row' => $hadis,
                'perawi' => $perawi,
                's1' => $s1,
                's2' => $s2,
                's3' => $s3,
                's4' => $s4,
                's5' => $s5
            ];
        $this->template->load('template', 'hadis/hadis_detail', $data);
        } else {
            echo "<script>alert('Data tidak ditemukan');";
            echo "window.location='".base_url('hadis')."';</script>";
        }
    }

    public function print($id = null)
    {
        $query = $this->hadis_m->get_detail_hadis($id);
        if($query->num_rows() > 0) {
            $hadis = $query->row();
            $perawi = $this->hadis_m->get_detail_hadis($id);
            $data = [
                'title' => 'Print Hadis',
                'row' => $hadis,
                'perawi' => $perawi
            ];
        $this->load->view('hadis/hadis_print', $data);
        } else {
            echo "<script>alert('Data tidak ditemukan');";
            echo "window.location='".base_url('hadis')."';</script>";
        }
    }
 
    public function delete($id)
    {
        $this->hadis_m->delete($id);
        $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        redirect('hadis');
    }
}
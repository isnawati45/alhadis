<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class User extends CI_Controller {

	function __construct()
    {
        parent::__construct();
		$this->load->model(['read_m','tampil_m']);
    }

	public function index()
	{
        $perawi = $this->tampil_m->get_hadis_count_by_perawi();
        $sumber = $this->tampil_m->get_hadis_count_by_sumber();
		$data =[
            'title' => 'ALHADIS',
            'perawi' => $perawi,
            'sumber' => $sumber
        ];
		$this->page->load('page', 'pages/welcome', $data);
		
	}

	public function reading($id = null)
    {
        $query = $this->read_m->get_detail_hadis($id);
        if($query->num_rows() > 0) {
            $hadis = $query->row();
            $perawi = $this->read_m->get_detail_hadis($id);
            $data = [
                'title' => 'Baca Hadis',
                'row' => $hadis,
                'perawi' => $perawi
            ];
        $this->page->load('page', 'pages/slider', $data);
        } else {
            echo "<script>alert('Data tidak ditemukan');";
            echo "window.location='".base_url('user/reading')."';</script>";
        }
    }

    public function baca_perawi($id = null)
    {
        $query = $this->tampil_m->get_hadis_by_perawi($id);
        if($query->num_rows() > 0) {
            $perawi = $query->row();
            $bacaperawi = $this->tampil_m->get_hadis_by_perawi($id);
            $data = [
                'title' => 'Data Hadis',
                'row' => $perawi,
                'bacaperawi' => $bacaperawi
            ];
        $this->page->load('page', 'pages/data_by_perawi', $data);
        } else {
            echo "<script>alert('Data tidak ditemukan');";
            echo "window.location='".base_url('user')."';</script>";
        }
    }

    public function baca_sumber($id = null)
    {
        $query = $this->tampil_m->get_hadis_by_sumber($id);
        if($query->num_rows() > 0) {
            $sumber = $query->row();
            $bacasumber = $this->tampil_m->get_hadis_by_sumber($id);
            $data = [
                'title' => 'Data Hadis',
                'row' => $sumber,
                'bacasumber' => $bacasumber
            ];
        $this->page->load('page', 'pages/data_by_sumber', $data);
        } else {
            echo "<script>alert('Data tidak ditemukan');";
            echo "window.location='".base_url('user')."';</script>";
        }
    }


	 // DATATABLE ALL HADIS
	 public function data(){
        $hadis = $this->read_m->get_hadis();
        $data = [
            'title' => 'Data Hadis',
            'hadis' => $hadis,
        ];
        $this->page->load('page', 'pages/data', $data);
    }

	public function baca($id = null)
    {
        $query = $this->read_m->get_detail_hadis($id);
        $s1 = $this->read_m->get_name_s1($id);
        $s2 = $this->read_m->get_name_s2($id);
        $s3 = $this->read_m->get_name_s3($id);
        $s4 = $this->read_m->get_name_s4($id);
        $s5 = $this->read_m->get_name_s5($id);
        if($query->num_rows() > 0) {
            $hadis = $query->row();
            $perawi = $this->read_m->get_detail_hadis($id);
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
        $this->page->load('page', 'pages/baca', $data);
        } else {
            echo "<script>alert('Data tidak ditemukan');";
            echo "window.location='".base_url('user')."';</script>";
        }
    }

    public function print($id = null)
    {
        $query = $this->read_m->get_detail_hadis($id);
        if($query->num_rows() > 0) {
            $hadis = $query->row();
            $perawi = $this->read_m->get_detail_hadis($id);
            $data = [
                'row' => $hadis,
                'perawi' => $perawi
            ];
        $this->load->view('pages/print', $data);
        } else {
            echo "<script>alert('Data tidak ditemukan');";
            echo "window.location='".base_url('user/data')."';</script>";
        }
    }
}
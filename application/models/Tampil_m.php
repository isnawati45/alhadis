<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tampil_m extends CI_Model {


    //select count(id), nama_perawi from tb_hadis join perawi_hadis on tb_hadis.id=perawi_hadis.id_matan join tb_perawi on tb_perawi.id_perawi=perawi_hadis.id_nama_perawi group by nama_perawi;
    public function get_hadis_count_by_perawi()
    {
        $this->db->select('COUNT(id) AS hitung, tb_perawi.*');
        $this->db->from('tb_hadis');
        $this->db->join('perawi_hadis', 'id=id_matan');
        $this->db->join('tb_perawi', 'id_perawi=id_nama_perawi');
        $this->db->group_by('nama_perawi');
        $query = $this->db->get();
        return $query;
    }
    
    //READ
    function get_hadis($id = null)
    {
        $this->db->select('*');
        $this->db->from('tb_hadis');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_hadis.id_kategori');
        $this->db->join('tb_sumber', 'tb_sumber.id_sumber = tb_hadis.id_sumber');
        $this->db->join('tb_ulamatakrij', 'tb_ulamatakrij.id_ulamatakrij = tb_hadis.id_ulamatakrij');
        $this->db->join('tb_derajat', 'tb_derajat.id_derajat = tb_hadis.id_derajat');

        $this->db->join('syarah_hadis', 'tb_hadis.id=syarah_hadis.id_matan');    
        $this->db->join('tb_syarah', 'syarah_hadis.id_isi_syarah=tb_syarah.id_syarah');       
        $this->db->join('tb_ulamasyarah', 'tb_ulamasyarah.id_ulamasyarah = tb_syarah.id_ulamasyarah');


        if($id != null){
            $this->db->where('id', $id);
        }
        
        $query = $this->db->get();
        return $query;
    }


    //select tb_hadis.judul, tb_perawi.nama_perawi from tb_hadis join perawi_hadis on tb_hadis.id=perawi_hadis.id_matan join tb_perawi on tb_perawi.id_perawi=perawi_hadis.id_nama_perawi where id_perawi=1;
    public function get_hadis_by_perawi($id = null)
    {
        $this->db->select('*');
        $this->db->from('tb_hadis');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_hadis.id_kategori');
        $this->db->join('tb_sumber', 'tb_sumber.id_sumber = tb_hadis.id_sumber');
        $this->db->join('tb_ulamatakrij', 'tb_ulamatakrij.id_ulamatakrij = tb_hadis.id_ulamatakrij');
        $this->db->join('tb_derajat', 'tb_derajat.id_derajat = tb_hadis.id_derajat');
        $this->db->join('tb_sanad', 'tb_sanad.id_sanad = tb_hadis.id_sanad');

        $this->db->join('syarah_hadis', 'tb_hadis.id=syarah_hadis.id_matan');    
        $this->db->join('tb_syarah', 'syarah_hadis.id_isi_syarah=tb_syarah.id_syarah');       
        $this->db->join('tb_ulamasyarah', 'tb_ulamasyarah.id_ulamasyarah = tb_syarah.id_ulamasyarah');

        $this->db->join('perawi_hadis', 'tb_hadis.id=perawi_hadis.id_matan');
        $this->db->join('tb_perawi', 'perawi_hadis.id_nama_perawi=tb_perawi.id_perawi');
        
        $this->db->where('tb_perawi.id_perawi', $id);
        $query = $this->db->get();
        return $query;
    }

    //select tb_hadis.id, tb_sumber.sumber from tb_hadis join tb_sumber on tb_hadis.id_sumber=tb_sumber.id_sumber where tb_sumber.id_sumber=1;
    public function get_hadis_count_by_sumber()
    {
        $this->db->select('COUNT(id) AS hitung, tb_sumber.*');
        $this->db->from('tb_hadis');
        $this->db->join('tb_sumber', 'tb_hadis.id_sumber=tb_sumber.id_sumber');
        $this->db->group_by('sumber');
        $query = $this->db->get();
        return $query;
    }
    
    //select tb_hadis.id, tb_sumber.sumber from tb_hadis join tb_sumber on tb_hadis.id_sumber=tb_sumber.id_sumber where tb_sumber.id_sumber=1;
    public function get_hadis_by_sumber($id = null)
    {
        $this->db->select('*');
        $this->db->from('tb_hadis');
        $this->db->join('tb_sumber', 'tb_sumber.id_sumber = tb_hadis.id_sumber');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_hadis.id_kategori');
        $this->db->join('tb_ulamatakrij', 'tb_ulamatakrij.id_ulamatakrij = tb_hadis.id_ulamatakrij');
        $this->db->join('tb_derajat', 'tb_derajat.id_derajat = tb_hadis.id_derajat');
        $this->db->join('tb_sanad', 'tb_sanad.id_sanad = tb_hadis.id_sanad');

        
        $this->db->join('perawi_hadis', 'tb_hadis.id=perawi_hadis.id_matan');
        $this->db->join('tb_perawi', 'perawi_hadis.id_nama_perawi=tb_perawi.id_perawi');

        $this->db->join('syarah_hadis', 'tb_hadis.id=syarah_hadis.id_matan');    
        $this->db->join('tb_syarah', 'syarah_hadis.id_isi_syarah=tb_syarah.id_syarah');       
        $this->db->join('tb_ulamasyarah', 'tb_ulamasyarah.id_ulamasyarah = tb_syarah.id_ulamasyarah');

        $this->db->where('tb_sumber.id_sumber', $id);
        $query = $this->db->get();
        return $query;
    }


}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Hadis_m extends CI_Model{

    //HADIS MODEL
    
    //DATA TABEL SEMUA HADIS
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

    // GET NAMA SANAD INTO SILSILAH CHAIN
    // SELECT h.id_matan, s.id_sanad, s.nama_sanad
    // FROM sanad_hadis h
    // JOIN tb_sanad s on h.s1=s.id_sanad
    // WHERE id_matan=43
    public function get_name_s1($id = null){
        $this->db->select('*');
        $this->db->from('sanad_hadis');
        $this->db->join('tb_sanad', 'sanad_hadis.s1=tb_sanad.id_sanad');
        if($id != null){
            $this->db->where('id_matan', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    public function get_name_s2($id = null){
        $this->db->select('*');
        $this->db->from('sanad_hadis');
        $this->db->join('tb_sanad', 'sanad_hadis.s2=tb_sanad.id_sanad');
        if($id != null){
            $this->db->where('id_matan', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    public function get_name_s3($id = null){
        $this->db->select('*');
        $this->db->from('sanad_hadis');
        $this->db->join('tb_sanad', 'sanad_hadis.s3=tb_sanad.id_sanad');
        if($id != null){
            $this->db->where('id_matan', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    public function get_name_s4($id = null){
        $this->db->select('*');
        $this->db->from('sanad_hadis');
        $this->db->join('tb_sanad', 'sanad_hadis.s4=tb_sanad.id_sanad');
        if($id != null){
            $this->db->where('id_matan', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    public function get_name_s5($id = null){
        $this->db->select('*');
        $this->db->from('sanad_hadis');
        $this->db->join('tb_sanad', 'sanad_hadis.s5=tb_sanad.id_sanad');
        if($id != null){
            $this->db->where('id_matan', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    
    //GET DATA HADIS BY ID
    function get_detail_hadis($id = null)
    {
        $this->db->select('*');
        $this->db->from('tb_hadis');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_hadis.id_kategori');
        $this->db->join('tb_sumber', 'tb_sumber.id_sumber = tb_hadis.id_sumber');
        $this->db->join('tb_ulamatakrij', 'tb_ulamatakrij.id_ulamatakrij = tb_hadis.id_ulamatakrij');
        $this->db->join('tb_derajat', 'tb_derajat.id_derajat = tb_hadis.id_derajat');
        // $this->db->join('tb_sanad', 'tb_sanad.id_sanad = tb_hadis.id_sanad');

        $this->db->join('syarah_hadis', 'tb_hadis.id=syarah_hadis.id_matan');    
        $this->db->join('tb_syarah', 'syarah_hadis.id_isi_syarah=tb_syarah.id_syarah');       
        $this->db->join('tb_ulamasyarah', 'tb_ulamasyarah.id_ulamasyarah = tb_syarah.id_ulamasyarah');
        
        $this->db->join('perawi_hadis', 'tb_hadis.id=perawi_hadis.id_matan');
        $this->db->join('tb_perawi', 'id_nama_perawi=id_perawi');

        // $this->db->join('sanad_hadis', 'tb_hadis.id=sanad_hadis.id_matan');    
        // $this->db->join('tb_sanad', 'sanad_hadis.s1=tb_sanad.id_sanad');

        if($id != null){
            $this->db->where('id', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    
    public function create()
    {
        // $this->db->trans_start();

        //INSERT TO HADIS
        $hadis = [
            'judul' => $this->input->post('judul', true),
            'id_kategori' => $this->input->post('id_kategori', true),
            'id_sumber' => $this->input->post('id_sumber', true),
            'matan' => $this->input->post('matan', true),
            'terjemah' => $this->input->post('terjemah', true),
            'id_derajat' => $this->input->post('id_derajat', true),
            'catatan' => $this->input->post('catatan', true),
            'id_ulamatakrij' => $this->input->post('id_ulamatakrij', true),
            'sanad_matan' => $this->input->post('sanad_matan', true)
        ];
        $this->db->insert('tb_hadis', $hadis);
        
       

        //GET ID HADIS
        $id = $this->db->insert_id();

        $perawi = $this->input->post('id_perawi', true);
        $result = array();
            foreach($perawi AS $key => $val){
                 $result[] = array(
                  'id_matan'   => $id,
                  'id_nama_perawi'   => $_POST['id_perawi'][$key]
                 );
            }      
        //MULTIPLE INSERT TO DETAIL TABLE
        $this->db->insert_batch('perawi_hadis', $result);

        // INSERT INTO `sanad_hadis` (`id_ss`, `id_matan`, `s1`, `s2`, `s3`, `s4`, `s5`) VALUES (NULL, '51', '1', '2', '3', '4', '5');
        //INSERT TO SILSILAH
        $silsilah = [
            'id_matan' => $id,
            's1' => $this->input->post('s1', true),
            's2' => $this->input->post('s2', true),
            's3' => $this->input->post('s3', true),
            's4' => $this->input->post('s4', true),
            's5' => $this->input->post('s5', true),
        ];
        $this->db->insert('sanad_hadis', $silsilah);
        
        // INSERT INTO SYARAH TABLE
        $syarah = [
            'id_syarah' => $id,
            'no_syarah' => $this->input->post('no_syarah', true),
            'isi_syarah' => $this->input->post('isi_syarah', true),         
            'id_ulamasyarah' => $this->input->post('id_ulamasyarah', true),         
        ];
        $this->db->insert('tb_syarah', $syarah);
        

        //GET ID SYARAH 
        $syarah_hadis = [
            'id_matan' => $id,
            'id_isi_syarah' => $id
        ];                
        //MULTIPLE INSERT TO SYARAH_HADIS TABLE            
        $this->db->insert('syarah_hadis', $syarah_hadis);

        // $this->db->trans_complete();

        var_dump($hadis, $silsilah);
    }

    //GET PEAWI BY ID HADIS
    function get_perawi_by_hadis($id){
        $this->db->select('*');
        $this->db->from('tb_perawi');
        $this->db->join('perawi_hadis', 'id_nama_perawi=id_perawi');
        $this->db->join('tb_hadis', 'id=id_matan');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query;
    }

    

    public function update($post)
    {
        
        //EDIT TO HADIS
        $hadis = [
            'judul' => $this->input->post('judul', true),
            'id_kategori' => $this->input->post('id_kategori', true),
            'id_sumber' => $this->input->post('id_sumber', true),
            'matan' => $this->input->post('matan', true),
            'terjemah' => $this->input->post('terjemah', true),
            'id_derajat' => $this->input->post('id_derajat', true),
            'catatan' => $this->input->post('catatan', true),
            'id_ulamatakrij' => $this->input->post('id_ulamatakrij', true),
            'sanad_matan' => $this->input->post('sanad_matan', true)
                       
        ];        
        $this->db->where('id', $post['id_hadis']);
        $this->db->update('tb_hadis', $hadis);
        
        $this->db->trans_start();
        //GET ID HADIS
        $id = $this->input->post('id_hadis',TRUE);
        $perawi = $this->input->post('id_perawi', true);

        //DELETE PERAWI HADIS
        $this->db->delete('perawi_hadis', array('id_matan' => $id));

        $result = array();
            foreach($perawi AS $key => $val){
                 $result[] = array(
                  'id_matan'   => $id,
                  'id_nama_perawi'   => $_POST['id_perawi'][$key]
                 );
            }      
        //MULTIPLE INSERT TO DETAIL TABLE
        $this->db->insert_batch('perawi_hadis', $result);
        $this->db->trans_complete();

        // UPDATE `sanad_hadis` SET `s1` = '5' WHERE `sanad_hadis`.`id_matan` = 43;
        //EDIT TO SILSILAH
        $silsilah = [ 
            's1' => $this->input->post('s1', true),
            's2' => $this->input->post('s2', true),
            's3' => $this->input->post('s3', true),
            's4' => $this->input->post('s4', true),
            's5' => $this->input->post('s5', true),
        ];
        $this->db->where('id_matan', $post['id_hadis']);
        $this->db->update('sanad_hadis', $silsilah);

        //EDIT TO SYARAH
        $syarah = [
            'id_ulamasyarah' => $this->input->post('id_ulamasyarah', true),
            'no_syarah' => $this->input->post('no_syarah', true),
            'isi_syarah' => $this->input->post('isi_syarah', true),
        ];
        $this->db->where('id_syarah', $post['id_syarah']);
        $this->db->update('tb_syarah', $syarah);            
        

    }
    
    // DELETE
    function delete($id){
        $this->db->trans_start();
            $this->db->delete('perawi_hadis', array('id_matan' => $id));
            $this->db->delete('sanad_hadis', array('id_matan' => $id));
            $this->db->delete('syarah_hadis', array('id_matan' => $id));
            $this->db->delete('tb_hadis', array('id' => $id));
        $this->db->trans_complete();
    }
   
}
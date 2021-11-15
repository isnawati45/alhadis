<div class="alert alert-info" role="alert">
  <?='Halaman '.ucfirst($page).' Hadis'?>
</div>
<?php $this->view('messages') ?>

<form action="<?=site_url('hadis/process')?>" method="post">

  <!-- HADIS -->
  <div class="card shadow mb-4">
    <!-- Card Header - Accordion -->
    <a href="#collapseHadis" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseHadis">
      <h6 class="m-0 font-weight-bold text-primary">Matan</h6>
    </a>
    <!-- Card Content - Collapse -->
    <div class="collapse show" id="collapseHadis"> 
      <div class="card-body">
        <!-- SUMBER -->
        <div class="row">
          <div class="col-3">
            <label>* Sumber Buku</label> 
            <div class="input-group">
              <input type="hidden" name="id_sumber" id="id_sumber" value="<?=$row->id_sumber?>"> 
              <input type="text" class="form-control" id="sumber" placeholder="Cari Buku ..." value="<?=$row->sumber?>" required readonly>
              <div class="input-group-append">
                <button class="btn btn-info" type="button" data-toggle="modal" data-target="#sumberModal">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </div> 
          <div class="col-3">
            <label>Karya</label>
            <input type="text"  class="form-control" id="penulis" value="<?=$row->penulis?>" readonly>
          </div> 
          <div class="col-3">
            <label>Penerjemah</label>
            <input type="text"  class="form-control" id="penerjemah" value="<?=$row->penerjemah?>" readonly>
          </div> 
        </div>
        <br> 

        <!-- MATAN --> 
        <div class="row" >
          <div class="col-6">
            <label>Judul Hadis</label>
            <input type="text"  class="form-control" name ="id_hadis" value="<?=$row->id?>" hidden>
            <input type="text"  class="form-control" name ="judul" value="<?=$row->judul?>">
          </div> 
          <div class="col-4">
            <label>* Kategori Hadis</label>
            <select name="id_kategori" class="form-control" required>
              <option value="">- Pilih -</option>
              <?php foreach($kategori->result() as $kt) { ?>
              <option value="<?=$kt->id_kategori?>" <?=$kt->id_kategori == $row->id_kategori ? "selected" : ''?>><?=$kt->kategori?></option>
              <?php } ?>
            </select>
          </div>
        </div>
          
        <br>
          
        <div class="row">
          <div class="col-12">
            <label>* Matan Hadis</label>
            <textarea name="matan" id="matan" class="form-control" required><?=$row->matan?></textarea>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-12">
            <label>Terjemah Hadis</label>
            <textarea name="terjemah" id="terjemah" class="form-control"><?=$row->terjemah?></textarea>
          </div>
        </div> 
        <br>
        <div class="row">
          <div class="col-4">
              <label>* Perawi Hadis</label>
              <select multiple name="id_perawi[]" class="form-control" required>
                <?php foreach($perawi->result() as $pw) { ?>
                <option value="<?=$pw->id_perawi?>" <?=$pw->id_perawi == $row->id_perawi ? "selected" : ''?>><?=$pw->nama_perawi?></option>
                <?php } ?>
              </select>
            </div>        
        </div> 
        <br>        

        <!-- TAKRIJ -->
        <div class="row">
          <div class="col-3">
            <label>* Derajat Hadis</label>
            <select name="id_derajat" class="form-control" required>
            <option value="">- Pilih -</option>
              <?php foreach($derajat->result() as $drj) { ?>
              <option value="<?=$drj->id_derajat?>" <?=$drj->id_derajat == $row->id_derajat ? "selected" : ''?>><?=$drj->derajat?></option>
              <?php } ?>
            </select>
          </div> 
          <div class="col-3">
            <label>* Ulama Takrij</label> 
            <select name="id_ulamatakrij" class="form-control" required>
            <option value="">- Pilih -</option>
              <?php foreach($ulama_takrij->result() as $ut) { ?>
              <option value="<?=$ut->id_ulamatakrij?>" <?=$ut->id_ulamatakrij == $row->id_ulamatakrij ? "selected" : ''?>><?=$ut->ulama_takrij?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-4">
            <label>* Sanad</label>
            <div class="input-group">
              <input type="hidden" name="id_sanad" id="id_sanad" value="<?=$row->id_sanad?>"> 
              <input type="text" class="form-control" id="nama_sanad" placeholder="Cari ..." value="<?=$row->nama_sanad?>" readonly>
              <div class="input-group-append">
                <button class="btn btn-info" type="button" data-toggle="modal" data-target="#sanadModal">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </div>   
        </div>
        <br>
        <div class="row">
          <div class="col-12">
            <label>Catatan</label>
            <textarea name="catatan" id="catatan" class="form-control"><?=$row->catatan?></textarea>
          </div> 
        </div>
      </div>
    </div>
  </div>

  <!-- SYARAH -->
  <div class="card shadow mb-4">
    <!-- Card Header - Accordion -->
    <a href="#collapseSyarah" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseSyarah">
      <h6 class="m-0 font-weight-bold text-primary">Syarah</h6>
    </a>
    <!-- Card Content - Collapse -->
    <div class="collapse" id="collapseSyarah">
      <!-- Card Body -->
      <div class="card-body">
        <div class="row"> 
          <div class="col-4">
            <label>* Ulama Syarah</label>
            <select name="id_ulamasyarah" class="form-control" required>
              <option value="">- Pilih -</option>
              <?php foreach($ulama_syarah->result() as $us) { ?>
              <option value="<?=$us->id_ulamasyarah?>" <?=$us->id_ulamasyarah == $row->id_ulamasyarah ? "selected" : ''?>><?=$us->ulama_syarah?></option>
              <?php } ?>
            </select>
            <input type="hidden" name="id_syarah" value="<?=$row->id_syarah?>"> 
          </div> 
          <div class="col-2">
            <label>* Nomor Hadis</label>
            <input type="number"  class="form-control" required name ="no_syarah" value="<?=$row->no_syarah?>"> 
          </div> 
        </div>
        <br>

        <div class="row">
          <div class="col-12">
            <label>* Isi Syarah</label>
            <textarea name="isi_syarah" id="syarah" class="form-control" required><?=$row->isi_syarah?></textarea>
          </div>
        </div>

      </div>    
    </div>
  </div>

  <!-- Divider -->
  <hr class="divider">


  <div class="card-footer">
    <button type="submit" name="<?=$page?>" class="btn btn-success btn-sm"><i
        class="fas fa-save"></i> Save</button>
    <button type="reset" class="btn btn-secondary btn-sm"><i
        class="fas fa-undo"></i> Reset</button>
  </div>
</form>


<!-- Sumber Kitab Modal -->
<div class="modal fade" id="sumberModal" tabindex="-1" role="dialog" aria-labelledby="sumberLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="sumberLabel">Data Sumber</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTableSumber">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Sumber</th>
                    <th>Penulis</th>
                    <th>Penerjemah</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($sumber->result() as $row) :?>
                    <tr>
                      <td>
                          <a class="badge badge-success" id="selectSumber"
                          data-id_sumber="<?=$row->id_sumber?>"
                          data-sumber="<?=$row->sumber?>"
                          data-penulis="<?=$row->penulis?>"
                          data-penerjemah="<?=$row->penerjemah?>">
                              <i class="fa fa-check"></i>
                          </a>
                      </td>                             
                        <td><?=$row->sumber?></td>
                        <td><?=$row->penulis?></td>
                        <td><?=$row->penerjemah?></td>
                    </tr>
                <?php endforeach;?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        *isi manual jika data belum tersedia
      </div>
    </div>
  </div>
</div>

<!-- Sanad Modal -->
<div class="modal fade" id="sanadModal" tabindex="-1" role="dialog" aria-labelledby="sanadLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="sanadLabel">Data Sanad</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTableSanad">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th>Nama Sanad</th>
                    <th>Kuniyah</th>
                    <th>Kalangan</th>
                    <th>Pilihan</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($sanad->result() as $row) :?>
                    <tr>
                        <td><?=$no++?></td>                
                        <td><?=$row->nama_sanad?></td>
                        <td><?=$row->kuniyah?></td>
                        <td><?=$row->kalangan?></td>
                        <td>
                            <a class="badge badge-success" id="selectSanad"
                            data-id_sanad="<?=$row->id_sanad?>"
                            data-nama_sanad="<?=$row->nama_sanad?>">
                                <i class="fa fa-check"></i>
                            </a>
                        </td>                
                    </tr>
                <?php endforeach;?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        *isi manual jika data belum tersedia
      </div>
    </div>
  </div>
</div>


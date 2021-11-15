
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
            <label>Pengarang </label>
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
          <div class="col-2">
            <label>* Sanad Matan</label>
            <select name="sanad_matan" class="form-control" required>
              <?php foreach($perawi->result() as $pw) { ?>
              <option value="<?=$pw->nama_perawi?>" <?=$pw->nama_perawi == $row->nama_perawi ? "selected" : ''?>><?=$pw->nama_perawi?></option>
              <?php } ?>
            </select>
          </div> 
          <div class="col-2">
            <label>* Sanad 1</label>
            <div class="input-group">
              <input type="hidden" name="s1" id="id_sanad1" value="<?=$s1->id_sanad?>"> 
              <input type="text" class="form-control" id="nama_sanad1" placeholder="Cari ..." value="<?=$s1->nama_sanad?>" readonly>
              <div class="input-group-append">
                <button class="btn btn-info" type="button" data-toggle="modal" data-target="#sanadModal1">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </div>
          <div class="col-2">
            <label>* Sanad 2</label>
            <div class="input-group">              
                <input type="hidden" name="s2" id="id_sanad2" value="<?=$s2->id_sanad?>"> 
                <input type="text" class="form-control" id="nama_sanad2" placeholder="Cari ..." value="<?=$s2->nama_sanad?>" readonly>   
              <div class="input-group-append">
                <button class="btn btn-info" type="button" data-toggle="modal" data-target="#sanadModal2">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </div>
          <div class="col-2">
            <label>* Sanad 3</label>
            <div class="input-group">
              <input type="hidden" name="s3" id="id_sanad3" value="<?=$s3->id_sanad?>"> 
              <input type="text" class="form-control" id="nama_sanad3" placeholder="Cari ..." value="<?=$s3->nama_sanad?>" readonly>
              <div class="input-group-append">
                <button class="btn btn-info" type="button" data-toggle="modal" data-target="#sanadModal3">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </div>
          <div class="col-2">
            <label>* Sanad 4</label>
            <div class="input-group">
              <input type="hidden" name="s4" id="id_sanad4" value="<?=$s4->id_sanad?>"> 
              <input type="text" class="form-control" id="nama_sanad4" placeholder="Cari ..." value="<?=$s4->nama_sanad?>" readonly>
              <div class="input-group-append">
                <button class="btn btn-info" type="button" data-toggle="modal" data-target="#sanadModal4">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </div>
          <div class="col-2">
            <label>* Sanad 5</label>
            <div class="input-group">
              <input type="hidden" name="s5" id="id_sanad5" value="<?=$s5->id_sanad?>"> 
              <input type="text" class="form-control" id="nama_sanad5" placeholder="Cari ..." value="<?=$s5->nama_sanad?>" readonly>
              <div class="input-group-append">
                <button class="btn btn-info" type="button" data-toggle="modal" data-target="#sanadModal5">
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

<!-- Sanad Modal 1 -->
<div class="modal fade" id="sanadModal1" tabindex="-1" role="dialog" aria-labelledby="sanadLabel" aria-hidden="true">
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
                            <a class="badge badge-success" id="selectSanad1"
                            data-id_sanad1="<?=$row->id_sanad?>"
                            data-nama_sanad1="<?=$row->nama_sanad?>">
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
<!-- Sanad Modal 2 -->
<div class="modal fade" id="sanadModal2" tabindex="-1" role="dialog" aria-labelledby="sanadLabel" aria-hidden="true">
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
          <table class="table table-bordered" id="dataTableSanad2">
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
                            <a class="badge badge-success" id="selectSanad2"
                            data-id_sanad2="<?=$row->id_sanad?>"
                            data-nama_sanad2="<?=$row->nama_sanad?>">
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
<!-- Sanad Modal 3 -->
<div class="modal fade" id="sanadModal3" tabindex="-1" role="dialog" aria-labelledby="sanadLabel" aria-hidden="true">
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
          <table class="table table-bordered" id="dataTableSanad3">
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
                            <a class="badge badge-success" id="selectSanad3"
                            data-id_sanad3="<?=$row->id_sanad?>"
                            data-nama_sanad3="<?=$row->nama_sanad?>">
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
<!-- Sanad Modal 4 -->
<div class="modal fade" id="sanadModal4" tabindex="-1" role="dialog" aria-labelledby="sanadLabel" aria-hidden="true">
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
          <table class="table table-bordered" id="dataTableSanad4">
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
                            <a class="badge badge-success" id="selectSanad4"
                            data-id_sanad4="<?=$row->id_sanad?>"
                            data-nama_sanad4="<?=$row->nama_sanad?>">
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
<!-- Sanad Modal 5 -->
<div class="modal fade" id="sanadModal5" tabindex="-1" role="dialog" aria-labelledby="sanadLabel" aria-hidden="true">
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
          <table class="table table-bordered" id="dataTableSanad5">
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
                            <a class="badge badge-success" id="selectSanad5"
                            data-id_sanad5="<?=$row->id_sanad?>"
                            data-nama_sanad5="<?=$row->nama_sanad?>">
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


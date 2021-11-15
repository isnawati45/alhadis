<div class="alert alert-info" role="alert">
  Baca Hadis
</div>
<div class="card shadow mb-4">
  <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">
        <?='Bab Hadis : '.ucwords($row->kategori)?><br>
        <?='Hadis : '.ucwords($row->judul)?>
              
      </h6>
  </div>
  <div class="card-body"> 
      <?='Hadis Ke-: '.$row->no_syarah.' Dalam Kitab '.ucwords($row->sumber) ?>
      <a href="#" data-toggle="modal" data-target="#catatanModal" class="badge badge-info" >
          <i class="fas fa-info-circle"></i>
      </a><br>     
      <div style="font-size: 14pt; font-family: Times New Roman, serif;" lang="AR-SA" dir="RTL" >
        <p><?=$row->matan?></p>
      </div>
      <?=$row->terjemah?>
      HR. 
      <?php
        foreach($perawi->result() as $row) { ?>
          <?=$row->nama_perawi?>,
        <?php
        } ?> <hr>        
        
      <b><?='Hadis '.ucwords($row->derajat).' Menurut '.ucwords($row->ulama_takrij)?></b><hr>
       Sanad Matan <b><?=$row->sanad_matan?></b> : 
      <a href="#" data-toggle="modal" data-target="#sanadInfoModal" class="badge badge-info" >
          <i class="fas fa-info-circle"></i>
      </a>
  </div>
</div>

<!-- SYARAH -->
<div class="card shadow mb-4">
  <!-- Card Header - Accordion -->
  <a href="#collapseSyarah" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseSyarah">
    <h6 class="m-0 font-weight-bold text-primary">
        <?='Pensyarah : '.ucwords($row->ulama_syarah)?>
    </h6>
  </a>
  <!-- Card Content - Collapse -->
  <div class="collapse" id="collapseSyarah">
    <!-- Card Body -->
    <div class="card-body">
        <?=$row->isi_syarah?><br>
    </div>    
  </div>
</div>

<!-- Divider -->
<hr class="divider">

<div class="">
    <a href="<?=base_url('hadis/print/'.$row->id)?>" class="btn btn-sm btn-info"><i
        class="fas fa-print fa-sm text-white-50"></i> Simpan</a>
</div>


<!-- Isi Takrij Modal -->
<div class="modal fade" id="catatanModal" tabindex="-1" role="dialog" aria-labelledby="takrijLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-lg modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title">Keterangan</h6>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <?=$row->catatan?> <br>
        </div>
    </div>
  </div>
</div>

<!-- Sanad Info Modal -->
<div class="modal fade" id="sanadInfoModal" tabindex="-1" role="dialog" aria-labelledby="sanadInfoLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title">Silsilah Sanad Hadis Matan <?=$row->sanad_matan?></h6>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <?php
          foreach($s1->result() as $row) { ?>
            <?=ucwords($row->nama_sanad.'  '.$row->kuniyah)?><br>
            <?=ucwords('Kalangan : '.$row->kalangan)?>
          <?php
          } ?> <hr> 
          <?php
          foreach($s2->result() as $row) { ?>
            <?=ucwords($row->nama_sanad.'  '.$row->kuniyah)?><br>
            <?=ucwords('Kalangan : '.$row->kalangan)?>
          <?php
          } ?> <hr> 
          <?php
          foreach($s3->result() as $row) { ?>
            <?=ucwords($row->nama_sanad.'  '.$row->kuniyah)?><br>
            <?=ucwords('Kalangan : '.$row->kalangan)?>
          <?php
          } ?> <hr> 
          <?php
          foreach($s4->result() as $row) { ?>
            <?=ucwords($row->nama_sanad.'  '.$row->kuniyah)?><br>
            <?=ucwords('Kalangan : '.$row->kalangan)?>
          <?php
          } ?> <hr> 
          <?php
          foreach($s5->result() as $row) { ?>
            <?=ucwords($row->nama_sanad.'  '.$row->kuniyah)?><br>
            <?=ucwords('Kalangan : '.$row->kalangan)?>
          <?php
          } ?> <hr> 
        </div>
    </div>
  </div>
</div>


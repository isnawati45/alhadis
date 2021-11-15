<div class="alert alert-info" role="alert">
    Data Derajat
</div>

<?php $this->view('messages') ?>

<button type="button" class="btn btn-primary mb-4 btn-icon-split btn-sm tblderajat" data-toggle="modal" data-target="#derajat-modal">
    <span class="icon text-white-50">
        <i class="fas fa-plus"></i>
    </span>
    <span class="text">Tambah Data Derajat</span>
</button>

<div class="table-responsive">
  <table class="table table-bordered" id="dataTableDerajat"  width="100%" cellspacing="0">
      <thead>
          <tr>
              <th scope="col">#</th>
              <th>Derajat</th>
              <th>Keterangan</th>
              <th>Pilihan</th>
          </tr>
      </thead>
      <tbody>
          <?php $no = 1;
          foreach ($dataderajat as $drj) :?>
              <tr>
                  <td><?=$no++?></td>
                  <td><?=ucwords($drj['derajat'])?></td>
                  <td><?=ucwords($drj['keterangan'])?></td>
                  <td>
                      <a href="" class="badge badge-success ubahderajat" data-toggle="modal" data-target="#derajat-modal" data-id_derajat="<?=$drj['id_derajat']?>">
                          <i class="fa fa-edit"></i> Edit
                      </a>
                      <a href="<?= base_url('derajat/delete/'). $drj['id_derajat'];?>" class="badge badge-danger" onclick="return confirm('Apakah anda yakin ingin menghapus?')">
                          <i class="fa fa-trash"></i> Hapus
                      </a>                    
                  </td>                
              </tr>
          <?php endforeach;?>
      </tbody>
  </table>
</div>  


<!-- derajat Modal -->
<div class="modal fade" id="derajat-modal" tabindex="-1" role="dialog" aria-labelledby="derajatlabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="derajatlabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('derajat');?>" method="post">
            <input type="hidden" name="id_derajat" id="id_derajat">
          <div class="form-group">
            <input type="text" class="form-control form-control-user" placeholder="Derajat Hadis" name="derajat" id="derajat">
          </div>
          <div class="form-group">
            <input type="text" class="form-control form-control-user" placeholder="Keterangan" name="keterangan" id="keterangan">
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success btn-sm"><i
        class="fas fa-save"></i> Simpan</button>
        </button>
        </form>
      </div>
    </div>
  </div>
</div>

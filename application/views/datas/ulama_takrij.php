<div class="alert alert-info" role="alert">
    Data Ulama Takrij
</div>

<?php $this->view('messages') ?>

<button type="button" class="btn btn-primary mb-4 btn-icon-split btn-sm tblulamatakrij" data-toggle="modal" data-target="#ulamatakrij-modal">
    <span class="icon text-white-50">
        <i class="fas fa-plus"></i>
    </span>
    <span class="text">Tambah Data Ulama</span>
</button>

<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th>Nama Ulama</th>
            <th>Keterangan</th>
            <th>Pilihan</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($ulamatakrij as $us) :?>
            <tr>
                <td><?=$no++?></td>
                <td><?=ucwords($us['ulama_takrij'])?></td>
                <td><?=ucwords($us['keterangan'])?></td>
                <td>
                    <a href="" class="badge badge-success ubahulamatakrij" data-toggle="modal" data-target="#ulamatakrij-modal" data-id_ulamatakrij="<?=$us['id_ulamatakrij']?>">
                        <i class="fa fa-edit"></i> Edit
                    </a>
                    <a href="<?= base_url('derajat/delete/'). $us['id_ulamatakrij'];?>" class="badge badge-danger" onclick="return confirm('Apakah anda yakin ingin menghapus?')">
                        <i class="fa fa-trash"></i> Hapus
                    </a>                    
                </td>                
            </tr>
        <?php endforeach;?>
    </tbody>
</table>


<!-- US Modal -->
<div class="modal fade" id="ulamatakrij-modal" tabindex="-1" role="dialog" aria-labelledby="ulamatakrijlabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ulamatakrijlabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('ulama-takrij');?>" method="post">
            <input type="hidden" name="id_ulamatakrij" id="id_ulamatakrij">
          <div class="form-group">
            <input type="text" class="form-control form-control-user" placeholder="Ulama takrij" name="ulama_takrij" id="ulama_takrij">
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

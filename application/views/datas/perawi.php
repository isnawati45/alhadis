<div class="alert alert-info" role="alert">
    Data Perawi
</div>

<?php $this->view('messages') ?>

<button type="button" class="btn btn-primary mb-4 btn-icon-split btn-sm tblperawi" data-toggle="modal" data-target="#perawi-modal">
    <span class="icon text-white-50">
        <i class="fas fa-plus"></i>
    </span>
    <span class="text">Tambah Data Perawi</span>
</button>

<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th>Perawi</th>
            <th>Keterangan</th>
            <th>Pilihan</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($dataperawi as $prw) :?>
            <tr>
                <td><?=$no++?></td>
                <td><?=ucwords($prw['nama_perawi'])?></td>
                <td><?=ucwords($prw['keterangan'])?></td>
                <td>
                    <a href="" class="badge badge-success ubahperawi" data-toggle="modal" data-target="#perawi-modal" data-id_perawi="<?=$prw['id_perawi']?>">
                        <i class="fa fa-edit"></i> Edit
                    </a>
                    <a href="<?= base_url('perawi/delete/'). $prw['id_perawi'];?>" class="badge badge-danger" onclick="return confirm('Apakah anda yakin ingin menghapus?')">
                        <i class="fa fa-trash"></i> Hapus
                    </a>                    
                </td>                
            </tr>
        <?php endforeach;?>
    </tbody>
</table>


<!-- perawi Modal -->
<div class="modal fade" id="perawi-modal" tabindex="-1" role="dialog" aria-labelledby="perawilabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="perawilabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('perawi');?>" method="post">
            <input type="hidden" name="id_perawi" id="id_perawi">
          <div class="form-group">
            <input type="text" class="form-control form-control-user" placeholder="Perawi Hadis" name="nama_perawi" id="nama_perawi">
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

<div class="alert alert-info" role="alert">
    Sumber Data
</div>

<?php $this->view('messages') ?>

<button type="button" class="btn btn-primary mb-4 btn-icon-split btn-sm tblsumber" data-toggle="modal" data-target="#sumber-modal">
    <span class="icon text-white-50">
        <i class="fas fa-plus"></i>
    </span>
    <span class="text">Tambah Buku</span>
</button>

<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th>Buku</th>
            <th>Penulis</th>
            <th>Penerjemah</th>
            <th>Penerbit</th>
            <th>Pilihan</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($datasumber as $sbr) :?>
            <tr>
                <td><?=$no++?></td>
                <td><?=ucwords($sbr['sumber'])?></td>
                <td><?=ucwords($sbr['penulis'])?></td>
                <td><?=ucwords($sbr['penerjemah'])?></td>
                <td><?=ucwords($sbr['penerbit'])?></td>
                <td>
                    <a href="" class="badge badge-success ubahsumber" data-toggle="modal" data-target="#sumber-modal" data-id_sumber="<?=$sbr['id_sumber']?>">
                        <i class="fa fa-edit"></i> Edit
                    </a>
                    <a href="<?= base_url('sumber/delete/'). $sbr['id_sumber'];?>" class="badge badge-danger" onclick="return confirm('Apakah anda yakin ingin menghapus?')">
                        <i class="fa fa-trash"></i> Hapus
                    </a>                    
                </td>                
            </tr>
        <?php endforeach;?>
    </tbody>
</table>


<!-- sumber Modal -->
<div class="modal fade" id="sumber-modal" tabindex="-1" role="dialog" aria-labelledby="sumberlabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="sumberlabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('sumber');?>" method="post">
            <input type="hidden" name="id_sumber" id="id_sumber">
          <div class="form-group">
            <input type="text" class="form-control form-control-user" placeholder="Buku Hadis" name="sumber" id="sumber">
          </div>
          <div class="form-group">
            <input type="text" class="form-control form-control-user" placeholder="Penulis" name="penulis" id="penulis">
          </div>
          <div class="form-group">
            <input type="text" class="form-control form-control-user" placeholder="Penerjemah" name="penerjemah" id="penerjemah">
          </div>
          <div class="form-group">
            <input type="text" class="form-control form-control-user" placeholder="Penerbit" name="penerbit" id="penerbit">
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

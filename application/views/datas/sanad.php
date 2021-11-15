<div class="alert alert-info" role="alert">
    Data Sanad
</div>

<?php $this->view('messages') ?>

<button type="button" class="btn btn-primary mb-4 btn-icon-split btn-sm tblsanad" data-toggle="modal" data-target="#sanad-modal">
    <span class="icon text-white-50">
        <i class="fas fa-plus"></i>
    </span>
    <span class="text">Tambah Data Nama Sanad</span>
</button>

<table class="table table-bordered" id="dataTableSanad">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th>Nama</th>
            <th>Kuniyah</th>
            <th>Kalangan</th>
            <th>Negeri</th>
            <th>Wafat</th>
            <th>Keterangan</th>
            <th>Pilihan</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($datasanad as $snd) :?>
            <tr>
                <td><?=$no++?></td>
                <td><?=ucwords($snd['nama_sanad'])?></td>
                <td><?=ucwords($snd['kuniyah'])?></td>
                <td><?=ucwords($snd['kalangan'])?></td>
                <td><?=ucwords($snd['negeri'])?></td>
                <td><?=ucwords($snd['wafat'])?></td>
                <td><?=ucwords($snd['keterangan'])?></td>
                <td>
                    <a href="" class="badge badge-success ubahsanad" data-toggle="modal" data-target="#sanad-modal" data-id_sanad="<?=$snd['id_sanad']?>">
                        <i class="fa fa-edit"></i> Edit
                    </a>
                    <a href="<?= base_url('sanad/delete/'). $snd['id_sanad'];?>" class="badge badge-danger" onclick="return confirm('Apakah anda yakin ingin menghapus?')">
                        <i class="fa fa-trash"></i> Hapus
                    </a>                    
                </td>                
            </tr>
        <?php endforeach;?>
    </tbody>
</table>


<!-- Sanad Modal -->
<div class="modal fade" id="sanad-modal" tabindex="-1" role="dialog" aria-labelledby="sanadlabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="sanadlabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('sanad');?>" method="post">
            <input type="hidden" name="id_sanad" id="id_sanad">
          <div class="form-group">
            <input type="text" class="form-control form-control-user" placeholder="Nama Sanad" name="nama_sanad" id="nama_sanad">
          </div>
          <div class="form-group">
            <input type="text" class="form-control form-control-user" placeholder="Kuniyah" name="kuniyah" id="kuniyah">
          </div>
          <div class="form-group">
            <input type="text" class="form-control form-control-user" placeholder="Kalangan" name="kalangan" id="kalangan">
          </div>
          <div class="form-group">
            <input type="text" class="form-control form-control-user" placeholder="Negeri Hidup" name="negeri" id="negeri">
          </div>
          <div class="form-group">
            <input type="text" class="form-control form-control-user" placeholder="Wafat" name="wafat" id="wafat">
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

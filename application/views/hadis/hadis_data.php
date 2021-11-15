<div class="alert alert-info" role="alert">
    Hadis Data
</div>

<?php $this->view('messages') ?>

<div class="mb-3">
    <a href="<?=base_url('hadis/create')?>" class="btn btn-sm btn-primary"><i
        class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
</div>
<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>#</th>
                <th>Kategori</th>
                <th>Derajat</th>
                <th>Matan</th>
                <th>Pilihan</th>

            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($hadis->result() as $row) :?>
                <tr>
                    <td><?=$no++?></td>
                    <td>
                        <?=ucwords($row->kategori)?><hr>
                    </td>
                    <td>
                        <?=ucwords($row->derajat)?><hr>
                        <?=ucwords($row->ulama_takrij)?>
                    </td>
                    <td>
                        <?=ucwords($row->sumber.' Hadis Ke- '.$row->no_syarah)?><br>
                        <?=$row->matan?><hr>
                        <a href="<?=base_url('hadis/detail/'.$row->id)?>" class="badge badge-info">Baca</i>
                        </a>
                    </td>
                    <td>
                        <a href="<?=base_url('hadis/edit/'.$row->id)?>" class="badge badge-success">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="<?=base_url('hadis/delete/'.$row->id)?>" class="badge badge-danger" onclick="return confirm('Apakah anda yakin ingin menghapus?')">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>                
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>

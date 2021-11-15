<div class="alert alert-info" role="alert">
    <?='Data Hadis Riwayat '.ucwords($row->nama_perawi)?>
</div>
<p>
    <a href=<?=base_url('user')?>>
        Kembali Ke Halaman Awal
    </a>
</p>

<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>#</th>
                <th>Kategori</th>
                <th>Derajat</th>
                <th>Matan</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($bacaperawi->result() as $row) :?>
                <tr>
                    <td><?=$no++?></td>
                    <td>
                        <?=ucwords($row->kategori)?><hr>
                        <?=ucwords($row->judul)?>

                    </td>
                    <td>
                        <?=ucwords($row->derajat)?><hr>
                        <?=ucwords($row->ulama_takrij)?>
                    </td>
                    <td>
                        <?=ucwords(' Hadis Ke- '.$row->no_syarah)?><br>
                        <?=$row->matan?><br>
                        <?='HR. '.$row->nama_perawi?><hr>
                        <a href="<?=base_url('user/baca/'.$row->id)?>" class="badge badge-info">Baca</i>
                        </a>
                    </td>         
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>

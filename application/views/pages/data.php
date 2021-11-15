<div class="alert alert-info" role="alert">
    Hadis Data
</div>

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
            foreach ($hadis->result() as $row) :?>
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
                        <?=ucwords($row->sumber.' Hadis Ke- '.$row->no_syarah)?><br>
                        <?=$row->matan?><hr>
                        <a href="<?=base_url('user/baca/'.$row->id)?>" class="badge badge-info">Baca</i>
                        </a>
                    </td>              
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>

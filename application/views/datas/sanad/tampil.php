<div class="alert alert-info" role="alert">
    Sanad Data
</div>

<?=form_open('sanad/tambah', array("method" => "GET"));?>

        <p>Silakan ubah angka pada form di bawah dengan angka yang kamu inginkan.</p>
        <label>Buat</label>
        <input type="number" name="total_form" value="1" style="width:50px;">
        <label> form</label>
        <input type="submit" name="submit" value="ok">

<?=form_close();?>

<?=$this->session->flashdata('notif');?>
<fieldset>
    <legend><b>Daftar Nama</b></legend>
    <p style="color:red;font-weight:bold;">*) Centang terlebih dahulu jika ingin mengubah atau menghapus data!</p>
    <?=form_open('sanad/sunting_hapus');?>
        <table cellpadding="5" cellspacing="5">
            <tr>
                <td>#</td>
                <td>Nama</td>
                <td>Kuniyah</td>
                <td>Kalangan</td>
                <td>Negeri</td>
                <td>Wafat</td>
                <td>Keterangan</td>
            </tr>
            <?php
                if($data_cout == 0)
                {
                    echo "
                        <tr>
                            <td colspan='4' align='center' style='color:#B0BEC5;'>Tidak ada data</td>
                        </tr>
                    ";
                }
                else
                {
                    foreach ($data as $v) {
                        echo "
                            <tr>
                                <td><input type='checkbox' name='check[]' value='{$v->id_sanad}'></td>
                                <td>".$v->nama_sanad."</td>
                                <td>".$v->kuniyah."</td>
                                <td>".$v->kalangan."</td>
                                <td>".$v->negeri."</td>
                                <td>".$v->wafat."</td>
                                <td>".$v->keterangan."</td>
                            </tr>
                        ";
                    }
                }
            ?>
        </table>
        <input type="submit" name="sunting" value="Sunting">
        <input type="submit" name="hapus" value="Hapus">
    <?=form_close();?>
</fieldset>
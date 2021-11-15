<?=form_open('sanad/tambah_proses');?>
    <fieldset>
        <legend><b>Tambah data</b></legend>
        <table cellpadding="5" cellspacing="5">
            <?php
                for ($i=0; $i < $total_form; $i++) 
                {
                    echo "
                        <tr>
                            <td><input type='text' name='nama_sanad[]' placeholder='Nama'></td>
                            <td><input type='text' name='kuniyah[]' placeholder='kuniyah'></td>
                            <td><input type='text' name='kalangan[]' placeholder='kalangan'></td>
                            <td><input type='text' name='negeri[]' placeholder='negeri'></td>
                            <td><input type='text' name='wafat[]' placeholder='wafat'></td>
                            <td><input type='text' name='keterangan[]' placeholder='keterangan'></td>
                        </tr>
                    ";
                }
            ?>
        </table>
        <input type="submit" name="simpan" value="Simpan">
        <input type="reset" value="Reset">
    </fieldset>
<?=form_close();?>
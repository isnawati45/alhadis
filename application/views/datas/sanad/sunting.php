<?=form_open('sanad/sunting_proses');?>
    <fieldset>
        <legend><b>Sunting data</b></legend>
        <table cellpadding="5" cellspacing="5">
            <?php
                foreach ($data as $key => $v) 
                {
                    echo "
                        <tr>
                            <td><input type='hidden' name='id_sanad[]' value='{$v->id_sanad}'></td>
                            <td><input type='text' name='nama_sanad[]' placeholder='Nama' value='{$v->nama_sanad}'></td>
                            <td><input type='text' name='kuniyah[]' placeholder='kuniyah' value='{$v->kuniyah}'></td>
                            <td><input type='text' name='kalangan[]' placeholder='kalangan' value='{$v->kalangan}'></td>
                            <td><input type='text' name='negeri[]' placeholder='negeri' value='{$v->negeri}'></td>
                            <td><input type='text' name='wafat[]' placeholder='wafat' value='{$v->wafat}'></td>
                            <td><input type='text' name='keterangan[]' placeholder='keterangan' value='{$v->keterangan}'></td>
                        </tr>
                    ";
                }
            ?>
        </table>
        <input type="submit" name="sunting" value="Simpan perubahan">
        <input type="reset" value="Reset">
    </fieldset>
<?=form_close();?>
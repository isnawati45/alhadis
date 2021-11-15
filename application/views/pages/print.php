<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= ucwords($row->sumber) ?></title>
</head>
<body>
<div class="">
    <?=ucwords('Buku : '.$row->sumber)?><br>
    <?=ucwords('Penulis : '.$row->penulis)?><br>
    <?=ucwords('Penerjemah : '.$row->penerjemah)?><br>
    <?=ucwords('Penerbit : '.$row->penerbit)?><hr>
</div>

<div style="text-align:center;">
    <?=ucwords($row->kategori)?><br>
    <?=ucwords('Hadis Ke-: '.$row->no_syarah)?><br>
    <?=ucwords('Hadis '.$row->derajat.' Menurut '.$row->ulama_takrij)?><br>
    <?=ucwords($row->judul)?><br>
</div>

<div style="font-size: 12pt; font-family: Times New Roman, serif;" lang="AR-SA" dir="RTL" style="text-align:justify;">
    <p><?=$row->matan?></p>
</div>
<div class="" style="text-align:justify;">
    <?=ucfirst($row->terjemah)?>
    [HR.
    <?php 
        foreach($perawi->result() as $p) { ?>
          <?=$p->nama_perawi.','?>
          <?php
        } ?>
    ] <br>
</div><br>
<div class="">
    <?=ucwords('Sanad Matan Jalur '.$row->nama_sanad.''.$row->kuniyah).'('.ucwords($row->kalangan).')'?><br>
</div><br>
<div class="" style="text-align:justify;">
    <b><?=ucwords('Syarah Hadis '.$row->ulama_syarah)?></b><br>
    <?=ucfirst($row->isi_syarah)?>
</div>
    
    <script type="text/javascript">
    window.print();
    </script>
</body>
</html>
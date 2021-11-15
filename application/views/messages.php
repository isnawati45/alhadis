<?php if ($this->session->has_userdata('success')) { ?>
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <i class="icon fas fa-check"></i> Sukses! 
    <?=$this->session->flashdata('success');?>
</div>
<?php } ?>

<?php if ($this->session->has_userdata('fail')) { ?>
<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <i class="icon fas fa-ban"></i> Gagal! 
    <?=$this->session->flashdata('fail');?>
</div>
<?php } ?>
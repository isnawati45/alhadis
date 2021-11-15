<div class="container-fluid">
    <div class="alert alert-info" role="alert">
        Dashboard
    </div>

    <div class="alert alert-success" role="alert">
        Ahlan Wa Sahlan <b><?= ucwords($this->fungsi->admin_login()->name)?></b>
        anda login sebagai <b><?= ucwords($this->fungsi->admin_login()->level == 1 ? "Super Admin" : "Admin")?></b>
        <hr>
        <div class="mb-3" >
            <a href="#" class="btn btn-sm btn-info" data-toggle="modal" data-target="#dashboardModal">
                <i class="fa fa-info"></i>
                Data Info
            </a>
        </div>
    </div>

    <div class="alert alert-warning" role="alert">
      Petunjuk Memasukkan Hadis
      <hr>
      Siapkan terlebih dahulu data-data hadis yang akan dimasukkan secara manual
      data-data yang perlu untuk disiapkan antara lain : judul hadis, matan dan terjemah, catatan buku, dan isi syarah hadis.          
      <hr>
      <div class="mb-3" >
          <a href="<?=base_url('hadis/create')?>" class="btn btn-sm btn-primary">
              <i class="fa fa-edit"></i>
              Form Input Hadis
          </a>
      </div>
    </div>
</div>

<!-- Info Modal-->
<div class="modal fade" id="dashboardModal" tabindex="-1" role="dialog" aria-labelledby="DashboardModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="DashboardModalLabel"><i class="fa fa-info"></i> Data Info</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-3">
              <div class="card-body">
                <h5 class="card-title">Data Hadis</h5>
                <p class="card-text"><?=$this->fungsi->hadis_count()?> Data</p>
                <a href=<?=base_url('hadis')?> class="card-link">Lihat</a>
              </div>              
            </div> 
            <div class="col-3">
              <div class="card-body">
                <h5 class="card-title">Data Buku</h5>
                <p class="card-text"> <?=$this->fungsi->sumber_count()?> Data</p>
                <a href=<?=base_url('sumber')?> class="card-link">Lihat</a>
              </div>              
            </div> 
            <div class="col-3">
              
            </div> 
          </div>
        </div>
      </div>
    </div>
</div>
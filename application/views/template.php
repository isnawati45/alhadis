<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?=$title?></title>

  <!-- Custom fonts for this template-->
  <link href="<?=base_url()?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?=base_url()?>assets/css/sb-admin-2.min.css" rel="stylesheet">
  
  <link href="<?=base_url()?>assets/vendor/bootstrap/js/bootstrap.min.js" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="<?=base_url()?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <!-- summernote -->
  <link href="<?=base_url()?>assets/vendor/summernote/summernote-bs4.css" rel="stylesheet">


</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href=<?=base_url('user')?>>
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">ALHADIS</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url('dashboard')?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url('hadis/create')?>">
          <i class="fa fa-edit"></i>
          <span>Form Input Hadis</span></a>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDataHadis" aria-expanded="true" aria-controls="collapseDataHadis">
          <i class="fa fa-book"></i>
          <span>Data Hadis</span>
        </a>
        <div id="collapseDataHadis" class="collapse" aria-labelledby="headingDataHadis" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?=base_url('hadis')?>"><i class="badge badge-info"></i>Data Hadis</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Kumpulan Hadis :</h6>
            <a class="collapse-item" href="#">Hadis Qudsi</a>
            <a class="collapse-item" href="#">Hadis Mutawattir</a>
          </div>
        </div>
      </li>


      <?php if($this->session->userdata('level') == 1) { ?>
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Admin
      </div>

    
      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url('admin')?>">
          <i class="fa fa-users"></i>
          <span>Admin</span></a>
      </li>

      <!-- Nav Item - Master Data -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDataMaster" aria-expanded="true" aria-controls="collapseDataMaster">
          <i class="fa fa-list"></i>
          <span>Master Data</span>
        </a>
        <div id="collapseDataMaster" class="collapse" aria-labelledby="headingDataMaster" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Hadis :</h6>
            <a class="collapse-item" href="<?=base_url('kategori')?>">Kategori</a>
            <a class="collapse-item" href="<?=base_url('sumber')?>">Buku Sumber</a>
            <a class="collapse-item" href="<?=base_url('derajat')?>">Derajat</a>
            <a class="collapse-item" href="<?=base_url('perawi')?>">Perawi</a>
            <a class="collapse-item" href="<?=base_url('sanad')?>">Sanad</a>
            <a class="collapse-item" href="<?=base_url('ulamatakrij')?>">Ulama Takrij</a>            
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Syarah :</h6>
            <a class="collapse-item" href="<?=base_url('ulamasyarah')?>">Ulama Syarah</a>
          </div>
        </div>
      </li>

      <?php } ?>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= ucfirst($this->fungsi->admin_login()->username)?></span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <?= ucfirst($this->fungsi->admin_login()->name)?><br>
                  <?= ucfirst($this->fungsi->admin_login()->address)?>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">          
            <?=$contents;?>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Alhadis 2021</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
          <a class="btn btn-primary" href="<?=base_url('auth/logout')?>">Logout</a>
        </div>
      </div>
    </div>
  </div>

  
  <!-- Bootstrap core JavaScript-->
  <script src="<?=base_url()?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?=base_url()?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  
  <!-- Core plugin JavaScript-->
  <script src="<?=base_url()?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
  
  <!-- Custom scripts for all pages-->
  <script src="<?=base_url()?>assets/js/sb-admin-2.min.js"></script>
  
  <!-- Page level plugins -->
  <script src="<?=base_url()?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?=base_url()?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Summernote -->
  <script src="<?=base_url()?>assets/vendor/summernote/summernote-bs4.min.js"></script>
  
  <!-- Page level custom scripts -->
  <script src="<?=base_url()?>assets/js/demo/datatables-demo.js"></script>
  
  <!-- Call the dataTables jQuery plugin -->
  <script>
    $(document).ready(function() {
      $('#dataTableSumber').DataTable();
      $('#dataTableSanad').DataTable();
      $('#dataTableSanad2').DataTable();
      $('#dataTableSanad3').DataTable();
      $('#dataTableSanad4').DataTable();
      $('#dataTableSanad5').DataTable();
      $('#dataTableKategori').DataTable();
      $('#dataTableDerajat').DataTable();
    });
  </script>

  <script>
    $(function () {
      // Summernote
      $('#matan').summernote({
        // placeholder: 'Matan',
        // toolbar: [
        //   ['view', ['fullscreen']]
        // ]
      });
      $('#terjemah').summernote({
        placeholder: 'Terjemahan Hadis',
        toolbar: [
          ['font', ['bold', 'underline', 'clear']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['view', ['fullscreen']]
        ]
      });
      $('#catatan').summernote({
        placeholder: 'Catatan',
        toolbar: [
          ['font', ['bold', 'underline', 'clear']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['view', ['fullscreen']]
        ]
      });
      $('#syarah').summernote({
        placeholder: 'Syarah Hadis',
        toolbar: [
          ['font', ['bold', 'underline', 'clear']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['view', ['fullscreen']]
        ]
      });
    });
  </script>

  <!-- MODAL DATA INPUTAN HADIS -->
  <script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click', '#selectSumber', function() {
      var id_sumber = $(this).data('id_sumber');
      var sumber = $(this).data('sumber');
      var penulis = $(this).data('penulis');
      var penerjemah = $(this).data('penerjemah');

      //class di inputan
      $('#id_sumber').val(id_sumber);
      $('#sumber').val(sumber);
      $('#penulis').val(penulis);
      $('#penerjemah').val(penerjemah);
      $('#sumberModal').modal('hide');
    });
  })
  </script>

  <script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click', '#selectSanad1', function() {
      var id_sanad = $(this).data('id_sanad1');
      var nama_sanad = $(this).data('nama_sanad1');

      //class di inputan
      $('#id_sanad1').val(id_sanad);
      $('#nama_sanad1').val(nama_sanad);
      $('#sanadModal1').modal('hide');
    });
    $(document).on('click', '#selectSanad2', function() {
      var id_sanad = $(this).data('id_sanad2');
      var nama_sanad = $(this).data('nama_sanad2');

      //class di inputan
      $('#id_sanad2').val(id_sanad);
      $('#nama_sanad2').val(nama_sanad);
      $('#sanadModal2').modal('hide');
    });
    $(document).on('click', '#selectSanad3', function() {
      var id_sanad = $(this).data('id_sanad3');
      var nama_sanad = $(this).data('nama_sanad3');

      //class di inputan
      $('#id_sanad3').val(id_sanad);
      $('#nama_sanad3').val(nama_sanad);
      $('#sanadModal3').modal('hide');
    });
    $(document).on('click', '#selectSanad4', function() {
      var id_sanad = $(this).data('id_sanad4');
      var nama_sanad = $(this).data('nama_sanad4');

      //class di inputan
      $('#id_sanad4').val(id_sanad);
      $('#nama_sanad4').val(nama_sanad);
      $('#sanadModal4').modal('hide');
    });
    $(document).on('click', '#selectSanad5', function() {
      var id_sanad = $(this).data('id_sanad5');
      var nama_sanad = $(this).data('nama_sanad5');

      //class di inputan
      $('#id_sanad5').val(id_sanad);
      $('#nama_sanad5').val(nama_sanad);
      $('#sanadModal5').modal('hide');
    });
  })
  </script>

  <!-- MODAL INPUTAN DATA MASTER -->
  <script>
    $(function(){

      // SCRIPT UBAH KATEGORI
      $('.tblkategori').on('click', function(){
          $('#kategorilabel').html('Tambah Data Buku');
          $('.save').html('Tambah');    
          $('#id_kategori').val('');
          $('#kategori').val('');
      });
      $('.ubahkategori').on('click', function(){
      $('#kategorilabel').html('Ubah Data kategori');
      $('.save').html('Ubah');
      $('#id_kategori').val('');
      $('#kategori').val('');
      
      $('.modal-body form').attr('action','<?=base_url('kategori/ubah_kategori')?>');
    
      const id_kategori = $(this).data('id_kategori');
            console.log(id_kategori);
            
        $.ajax({
            url:'<?=base_url('kategori/get_ubah_kategori')?>',
            data: {id_kategori : id_kategori},
            method: 'post',
            dataType:'json',
            success: function(data){
            $('#id_kategori').val(data.id_kategori);
            $('#kategori').val(data.kategori);
            }
        }); 
      });

      // SCRIPT UBAH SUMBER
      $('.tblsumber').on('click', function(){
          $('#sumberlabel').html('Tambah Data Buku');
          $('.save').html('Tambah');    
          $('#id_sumber').val('');
          $('#sumber').val('');
          $('#penulis').val('');
          $('#penerjemah').val('');
          $('#penerbit').val('');
      });
      $('.ubahsumber').on('click', function(){
      $('#sumberlabel').html('Ubah Data Buku');
      $('.save').html('Ubah');
      $('#id_sumber').val('');
      $('#sumber').val('');
      $('#penulis').val('');
      $('#penerjemah').val('');
      $('#penerbit').val('');
      
      $('.modal-body form').attr('action','<?=base_url('sumber/ubah_sumber')?>');
    
      const id_sumber = $(this).data('id_sumber');
            console.log(id_sumber);
            
        $.ajax({
            url:'<?=base_url('sumber/get_ubah_sumber')?>',
            data: {id_sumber : id_sumber},
            method: 'post',
            dataType:'json',
            success: function(data){
            $('#id_sumber').val(data.id_sumber);
            $('#sumber').val(data.sumber);
            $('#penulis').val(data.penulis);
            $('#penerjemah').val(data.penerjemah);
            $('#penerbit').val(data.penerbit);
            }
        }); 
      });

      // SCRIPT UBAH DERAJAT
      $('.tblderajat').on('click', function(){
          $('#derajatlabel').html('Tambah Data Derjat');
          $('.save').html('Tambah');    
          $('#id_derajat').val('');
          $('#derajat').val('');
          $('#keterangan').val('');
      });
      $('.ubahderajat').on('click', function(){
      $('#derajatlabel').html('Ubah Data Derajat');
      $('.save').html('Ubah');
      $('#id_derajat').val('');
      $('#derajat').val('');
      $('#keterangan').val('');
      
      $('.modal-body form').attr('action','<?=base_url('derajat/ubah_derajat')?>');
      
      const id_derajat = $(this).data('id_derajat');
              console.log(id_derajat);
              
          $.ajax({
              url:'<?=base_url('derajat/get_ubah_derajat')?>',
              data: {id_derajat : id_derajat},
              method: 'post',
              dataType:'json',
              success: function(data){
              $('#id_derajat').val(data.id_derajat);
              $('#derajat').val(data.derajat);
              $('#keterangan').val(data.keterangan);
              }
          }); 
      });

      // SCRIPT UBAH PERAWI
      $('.tblperawi').on('click', function(){
          $('#perawilabel').html('Tambah Data Derjat');
          $('.save').html('Tambah');    
          $('#id_perawi').val('');
          $('#nama_perawi').val('');
          $('#keterangan').val('');
      });
      $('.ubahperawi').on('click', function(){
      $('#perawilabel').html('Ubah Data Perawi');
      $('.save').html('Ubah');
      $('#id_perawi').val('');
      $('#nama_perawi').val('');
      $('#keterangan').val('');
      
      $('.modal-body form').attr('action','<?=base_url('perawi/ubah_perawi')?>');
      
      const id_perawi = $(this).data('id_perawi');
              console.log(id_perawi);
              
          $.ajax({
              url:'<?=base_url('perawi/get_ubah_perawi')?>',
              data: {id_perawi : id_perawi},
              method: 'post',
              dataType:'json',
              success: function(data){
              $('#id_perawi').val(data.id_perawi);
              $('#nama_perawi').val(data.nama_perawi);
              $('#keterangan').val(data.keterangan);
              }
          }); 
      });

      // SCRIPT UBAH PERAWI
      $('.tblsanad').on('click', function(){
          $('#sanadlabel').html('Tambah Data');
          $('.save').html('Tambah');    
          $('#id_sanad').val('');
          $('#nama_sanad').val('');
          $('#kuniyah').val('');
          $('#kalangan').val('');
          $('#negeri').val('');
          $('#wafat').val('');
          $('#keterangan').val('');
      });
      $('.ubahsanad').on('click', function(){
      $('#sanadlabel').html('Ubah Data sanad');
      $('.save').html('Ubah');
      $('#id_sanad').val('');
      $('#nama_sanad').val('');
      $('#kuniyah').val('');
      $('#kalangan').val('');
      $('#negeri').val('');
      $('#wafat').val('');
      $('#keterangan').val('');
      
      $('.modal-body form').attr('action','<?=base_url('sanad/ubah_sanad')?>');
      
      const id_sanad = $(this).data('id_sanad');
              console.log(id_sanad);
              
          $.ajax({
              url:'<?=base_url('sanad/get_ubah_sanad')?>',
              data: {id_sanad : id_sanad},
              method: 'post',
              dataType:'json',
              success: function(data){
              $('#id_sanad').val(data.id_sanad);
              $('#nama_sanad').val(data.nama_sanad);
              $('#kuniyah').val(data.kuniyah);
              $('#kalangan').val(data.kalangan);
              $('#negeri').val(data.negeri);
              $('#wafat').val(data.wafat);
              $('#keterangan').val(data.keterangan);
              }
          }); 
      });

      // SCRIPT UBAH ULAMA TAKRIJ
      $('.tblulamatakrij').on('click', function(){
          $('#ulamatakrijlabel').html('Tambah Ulama');
          $('.save').html('Tambah');    
          $('#id_ulamatakrij').val('');
          $('#ulama_takrij').val('');
          $('#keterangan').val('');
      });
      $('.ubahulamatakrij').on('click', function(){
      $('#ulamatakrijlabel').html('Ubah Data Ulama');
      $('.save').html('Ubah');
      $('#id_ulamatakrij').val('');
      $('#ulama_takrij').val('');
      $('#keterangan').val('');
      
      $('.modal-body form').attr('action','<?=base_url('ulamatakrij/ubah_ulamatakrij')?>');
      
      const id_ulamatakrij = $(this).data('id_ulamatakrij');
              console.log(id_ulamatakrij);
              
          $.ajax({
              url:'<?=base_url('ulamatakrij/get_ubah_ulamatakrij')?>',
              data: {id_ulamatakrij : id_ulamatakrij},
              method: 'post',
              dataType:'json',
              success: function(data){
              $('#id_ulamatakrij').val(data.id_ulamatakrij);
              $('#ulama_takrij').val(data.ulama_takrij);
              $('#keterangan').val(data.keterangan);
              }
          }); 
      });
      
      // SCRIPT UBAH ULAMA SYARAH
      $('.tblulamasyarah').on('click', function(){
          $('#ulamasyarahlabel').html('Tambah Ulama');
          $('.save').html('Tambah');    
          $('#id_ulamasyarah').val('');
          $('#ulama_syarah').val('');
          $('#keterangan').val('');
      });
      $('.ubahulamasyarah').on('click', function(){
      $('#ulamasyarahlabel').html('Ubah Data Ulama');
      $('.save').html('Ubah');
      $('#id_ulamasyarah').val('');
      $('#ulama_syarah').val('');
      $('#keterangan').val('');
      
      $('.modal-body form').attr('action','<?=base_url('ulamasyarah/ubah_ulamasyarah')?>');
      
      const id_ulamasyarah = $(this).data('id_ulamasyarah');
              console.log(id_ulamasyarah);
              
          $.ajax({
              url:'<?=base_url('ulamasyarah/get_ubah_ulamasyarah')?>',
              data: {id_ulamasyarah : id_ulamasyarah},
              method: 'post',
              dataType:'json',
              success: function(data){
              $('#id_ulamasyarah').val(data.id_ulamasyarah);
              $('#ulama_syarah').val(data.ulama_syarah);
              $('#keterangan').val(data.keterangan);
              }
          }); 
      });


    })
  </script>

</body>
</html>

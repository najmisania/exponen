<?php $this->load->view('template/head') ?>

<body class="">
  <div class="wrapper">
<?php $this->load->view('template/sidebar') ?>
    <div class="main-panel">
<?php $this->load->view('template/navbar') ?>

      <!-- End Navbar -->
      <div class="content">
        <div class="row">
    <div class="col-6" style="text-align:center;margin-bottom:10px;">
        <a href="<?php echo base_url('index.php/dosen/daftar_dosen')?>"><button type="button" class="btn big-btn btn-outline-secondary">Data Dosen</button></a>
         </div>
     <div class="col-6" style="text-align:center;margin-bottom:10px;">
      <a href="<?php echo base_url('index.php/mhs/daftar_mhs')?>"><button type="button" class="btn big-btn btn-outline-secondary">Data Mahasiswa</button></a>
         </div>
     <div class="col-6" style="text-align:center;margin-bottom:10px;">
      <a href="<?php echo base_url('index.php/tugas/daftar_tugas')?>"><button type="button" class="btn big-btn btn-outline-secondary">Data Tugas</button></a>
         </div>
     <div class="col-6" style="text-align:center;margin-bottom:10px;">
      <a href="<?php echo base_url('index.php/kas/daftar_kas')?>"><button type="button" class="btn big-btn btn-outline-secondary">Data Kas</button></a>
         </div>
          
        </div>
        
      </div>
<?php $this->load->view('template/footer') ?>
    </div>
  </div>
  
<?php $this->load->view('template/script') ?>
<?php $this->load->view('template/head') ?>
<body class="">
  <div class="wrapper">
<?php $this->load->view('template/sidebar') ?>
    <div class="main-panel">
      <?php $this->load->view('template/navbar') ?>
      <div class="modal modal-search fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="SEARCH">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="tim-icons icon-simple-remove"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- End Navbar -->
      <div class="content">
        <div class="row" style="padding-bottom:15px">
          <?php $this->load->view('template/endnavbar') ?>
        </div>
		  <div class="row">
<!-- Diulang sebanyak jumlah mahasiswa berdasarkan NAMA -->
<?php foreach ($data_dosen as $key => $value) { ?>
		    <div class="col-4">
			  <div class="card card-tasks text-center">
			    <div class="card-body ">
					<img class="rounded-circle" src="<?php echo base_url('assets/img/').$value->foto ?>" alt="Generic placeholder image" width="100" height="100">
					<h4><?php echo $value->nama_dosen ?></h4>
					<h6><?php echo $value->matkul ?></h6>
					<p class="text-justify" style="padding-left:10%"><span class="oi oi-phone" title="Nomor telepon" aria-hidden="true"><?php echo $value->no_tlp ?></span></p>
					<p class="text-justify" style="padding-left:10%"><span class="oi oi-envelope-closed" title="Staffsite" aria-hidden="true"><?php echo $value->email ?></span></p>
					<p class="text-justify" style="padding-left:10%"><span class="oi oi-link-intact" title="Staffsite" aria-hidden="true"><?php echo $value->linkstaff ?></span></p>
					<a href="<?php echo base_url('index.php/tugas/daftar_tugas')?>"><button type="button" class="btn md-btn btn-outline-secondary" style="margin-top:10%">Lihat Tugas</button></a>
			    </div>
			  </div>
			</div>
<?php } ?>
<!-- /Sample tampilan setelah diulang -->
		  </div>
      </div>
<?php $this->load->view('template/footer') ?>
    </div>
  </div>
  
  <!--   Core JS Files   -->
 <?php $this->load->view('template/script') ?>
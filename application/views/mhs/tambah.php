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
	 <?php echo form_open('mhs/simpan_mhs'); ?>
		<div class="card card-tasks" style="height: 500px;">	
		  <div class="card-header text-center" style="padding-bottom:10px">
            <h3 class="title d-inline">Tambah Data Mahasiswa</h3>
          </div>
		  <div class="card-body ">
			<div class="input-group mb-3">
			  <div class="input-group-prepend">
				<span class="input-group-text" id="inputGroup-sizing-default" style="font-size:0.7rem;">Nama</span>
			  </div>
			  <input type="text" class="form-control" name="nama" aria-label="Default" aria-describedby="inputGroup-sizing-default">
			</div>
			<div class="input-group mb-3">
			  <div class="input-group-prepend">
				<span class="input-group-text" id="inputGroup-sizing-default" style="font-size:0.7rem;">NPM</span>
			  </div>
			  <input type="text" class="form-control" name="npm" aria-label="Default" aria-describedby="inputGroup-sizing-default">
			</div>
			<div class="input-group mb-3">
			  <div class="input-group-prepend">
				<span class="input-group-text" id="inputGroup-sizing-default" style="font-size:0.7rem;">Nomor Telepon</span>
			  </div>
			  <input type="text" class="form-control" name="no_tlp" aria-label="Default" aria-describedby="inputGroup-sizing-default">
			</div>
			<div class="input-group mb-3">
			  <div class="input-group-prepend">
				<span class="input-group-text" id="basic-addon1" style="font-size:0.7rem;">Alamat</span>
			  </div>
			  <input type="text" class="form-control" name="alamat" placeholder="" aria-label="Email" aria-describedby="basic-addon1">
			</div>
			<div class="input-group mb-3">
			  <div class="input-group-prepend">
				<span class="input-group-text" id="inputGroup-sizing-default" style="font-size:0.7rem;">Password Baru</span>
			  </div>
			 <input type="text" class="form-control" name="password" placeholder="Kosongkan jika tidak diganti" aria-label="Default" aria-describedby="inputGroup-sizing-default">
			</div>
			<div class="input-group mb-3">
			  <div class="input-group-prepend">
			  	<select class="btn btn-outline-secondary" name="jenis">
			  		<option value="Bendahara">Bendahara</option>
			  		<option value="Mahasiswa">Mahasiswa</option>
			  	</select>
			  </div>
			</div>
			<input type="submit" value="Simpan" class="btn md-btn btn-outline-secondary">
		  </div>
            </div>
      </div>
      <?php form_close(); ?>
<?php $this->load->view('template/footer') ?>
    </div>
  </div>
  
  <!--   Core JS Files   -->
 <?php $this->load->view('template/script') ?>
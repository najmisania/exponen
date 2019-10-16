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
		   <?php echo form_open('tugas/simpan_tugas'); ?>
		<div class="card card-tasks" style="height: 500px;">	
		  <div class="card-header text-center" style="padding-bottom:10px">
            <h3 class="title d-inline">Tambah Data Tugas</h3>
          </div>
		  <div class="card-body ">
			<div class="input-group mb-3">
			  <div class="input-group-prepend">
				<span class="input-group-text" id="inputGroup-sizing-default" style="font-size:0.7rem;">Tanggal</span>
			  </div>
			  <input type="date" name="deadline" class="form-control datepicker" id="deadline" aria-label="Large">
			</div>
			<div class="input-group mb-3">
			  <div class="input-group-prepend">
				<span class="input-group-text" id="inputGroup-sizing-default" style="font-size:0.7rem;">Mata Kuliah</span>
			  </div>
			  <input type="text" class="form-control" aria-label="Default" name="matkul" aria-describedby="inputGroup-sizing-default">
			</div>
			<div class="form-group" style="font-size:0.7rem;">
			  <p>Rincian tugas</p>
			  <textarea class="form-control" name="rincian"  rows="7" id="comment"></textarea>
			</div>
			<input type="submit" value="Simpan" class="btn md-btn btn-outline-secondary">
		  </div>
            </div>
      </div>
      <?php $this->load->view('template/footer') ?>
    </div>
  </div>
  
  <!--   Core JS Files   -->
 <?php $this->load->view('template/script') ?>
 <script type="text/javascript">
   $( function() {
    $( "#deadline" ).datepicker({ dateFormat: 'dd-mm-yy' });
  } );
</script>
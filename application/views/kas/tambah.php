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
		 <?php echo form_open('kas/simpan_kas'); ?>
		<div class="card card-tasks" style="height: 500px;">	
		  <div class="card-header text-center" style="padding-bottom:10px">
            <h3 class="title d-inline">Tambah Data Transaksi Kas</h3>
          </div>
           <div class="card-body ">
          <div class="form-group row">
                   <label class="col-sm-2">Jenis Transaksi</label>
                      <div class="col-sm-4">
                        <select class="form-control btn btn-outline-secondary dropdown-toggle" name="jenis_transaksi">
                          <option value="debit">Debit</option>
                          <option value="kredit">Kredit</option>
                        </select>
                      </div>
                      <label class="col-sm-1">Tanggal</label>
                      <div class="col-sm-3">
                        <input id="tanggal" type="date" name="tanggal" class="form-control datepicker">
                      </div>
                    </div>
		 
		  <div class="form-group row">
              <label class="col-sm-2">Nama Mahasiswa</label>
                  <div class="col-sm-4">
                      <select class="form-control btn-outline-secondary dropdown-toggle" name="npm" id="npm">
<?php                     foreach ($data_kas as $value) {  ?>
                             <option aria-label="Default" value="<?php echo $value->npm ?>"><?php echo "( ".$value->npm." ) ".$value->nama?></option>

<?php } ?>
                        </select>
                      </div>
                    </div>
			<div class="form-group row">
                      <label class="col-sm-2">Keterangan</label>
                      <div class="col-sm-4">
                        <input id="inputHorizontalWarning" type="text" name="ket" placeholder="Masukan Keterangan" class="form-control form-control-warning"><small class="form-text"></small>
                      </div>
                    </div>
			   <div class="form-group row">
                      <label class="col-sm-2">Nominal</label>
                      <div class="col-sm-4">
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text">Rp</span></div>
                            <input type="text" name="nominal" class="form-control">
                          </div>
                      </div>
                    </div>
                    <input type="submit" value="Simpan" class="btn md-btn btn-outline-secondary">
			  </div>
			</div>
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
    $( "#tanggal" ).datepicker({ dateFormat: 'dd-mm-yy' });
  } );
</script>
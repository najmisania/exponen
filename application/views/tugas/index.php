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
		<div class="card card-tasks" style="height: 500px;">	
		  <div class="card-header text-center" style="padding-bottom:10px">
            <h3 class="title d-inline">TUGAS</h3>
          </div>
			<div class="container p-t-md">
				<div class="row">
					<div class="col-md-12">
						<ul class="nav nav-tabs">
							<li class="nav-item">
								<a class="nav-link active" data-toggle="tab" href="#sebelum">Sebelum deadline</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#setelah">Setelah deadline</a>
							</li>
						</ul>
						<div class="tab-content">
							<div role="tabpanel" class="tab-pane active" id="sebelum">
								<ul class="list-group media-list media-list-stream">
									<div class="table-full-width table-responsive">
									  <table class="table">
									    <thead class="text-center">
											<th></th>
											<th>Deadline</th>
											<th>Mata Kuliah</th>
											<th>Keterangan</th>
											<th>Aksi</th>
										</thead>
										<tbody>
<!-- Diulang sebanyak jumlah mahasiswa berdasarkan TANGGAL DEADLINE TERDEKAT -->
<?php foreach ($data_tugas as $key => $value) { 
	$tgl_submit = new DateTime($value->deadline);
	$tgl_sekarang = new DateTime(date('Y-m-d'));
	$selisih = $tgl_sekarang->diff($tgl_submit);
	if($selisih->invert=="0") {
?>
										
										  <tr>
											<td>
											  <div class="form-check">
												<label class="form-check-label">
												  <input class="form-check-input" type="checkbox" value="">
												  <span class="form-check-sign">
													<span class="check"></span>
												  </span>
												</label>
											  </div>
											</td>
											<td><?php echo $value->deadline ?></td>
											<td><?php echo $value->matkul ?></td>
											<td>
											  <p><?php echo $value->rincian?></p>
											  <p class="text-muted">Di unggah oleh : <?php echo $value->nama ?> | <?php echo $value->npm ?></p>
											</td>
											<td class="td-actions text-center">
<!-- Hanya muncul ketika pengguna tersebut yang mengupload tugas -->														<?php if($_SESSION['jenis']=='admin' || $_SESSION['jenis']=='bendahara') { ?>				  
              				<a href="<?php echo site_url('tugas/edit_tugas/'.$value->id_tugas) ?>"  class="btn btn-link"><i class="tim-icons icon-pencil"></i></a>
              				<a href="<?php echo site_url('tugas/delete/'.$value->id_tugas)?>" class="btn btn-link"><i class="tim-icons icon-trash-simple"></i></a>
											<?php } ?>
<!-- /Hanya muncul ketika pengguna tersebut yang mengupload tugas -->											  
											</td>
										  </tr>
<?php  }
	  } 
	  ?>
<!-- /Diulang sebanyak jumlah mahasiswa berdasarkan TANGGAL DEADLINE TERDEKAT -->	
<!-- Contoh tugas yang sudah dikerjakan oleh masing-masing pengguna, hanya pengguna tersebut yg dapat melihat -->
<!-- /Contoh tugas yang sudah dikerjakan oleh masing-masing pengguna, hanya pengguna tersebut yg dapat melihat -->										  
										</tbody>
									  </table>
									</div>
								</ul>
							</div>
							<div role="tabpanel" class="tab-pane fade in" id="setelah">
								<ul class="list-group media-list media-list-stream">
									<div class="table-full-width table-responsive">
									  <table class="table">
									    <thead class="text-center">
											<th></th>
											<th>Deadline</th>
											<th>Mata Kuliah</th>
											<th>Keterangan</th>
											<th>Aksi</th>
										</thead>
										<tbody>
<!-- Diulang sebanyak jumlah mahasiswa berdasarkan TANGGAL DEADLINE TERDEKAT -->
<?php foreach ($data_tugas as $key => $value) { 
	$tgl_submit = new DateTime($value->deadline);
	$tgl_sekarang = new DateTime(date('Y-m-d'));
	$selisih = $tgl_sekarang->diff($tgl_submit);
	if($selisih->invert=="1") {
?>
										
										  <tr>
											<td>
											  <div class="form-check">
												<label class="form-check-label">
												  <input class="form-check-input" type="checkbox" value="">
												  <span class="form-check-sign">
													<span class="check"></span>
												  </span>
												</label>
											  </div>
											</td>
											<td><?php echo $value->deadline ?></td>
											<td><?php echo $value->matkul ?></td>
											<td>
											  <p><?php echo $value->rincian?></p>
											  <p class="text-muted">Di unggah oleh : <?php echo $value->nama ?> | <?php echo $value->npm ?></p>
											</td>
											<td class="td-actions text-center">
<!-- Hanya muncul ketika pengguna tersebut yang mengupload tugas -->														<?php if($_SESSION['jenis']=='admin' || $_SESSION['jenis']=='bendahara') { ?>				  
              				<a href="<?php echo site_url('tugas/edit_tugas/'.$value->id_tugas) ?>"  class="btn btn-link"><i class="tim-icons icon-pencil"></i></a>
              				<a href="<?php echo site_url('tugas/delete/'.$value->id_tugas)?>" class="btn btn-link"><i class="tim-icons icon-trash-simple"></i></a>
											<?php } ?>
<!-- /Hanya muncul ketika pengguna tersebut yang mengupload tugas -->											  
											</td>
										  </tr>
<?php  }
	  } 
	  ?>
<!-- /Diulang sebanyak jumlah mahasiswa berdasarkan TANGGAL DEADLINE TERDEKAT -->	
<!-- Contoh tugas yang sudah dikerjakan oleh masing-masing pengguna, hanya pengguna tersebut yg dapat melihat -->
<!-- /Contoh tugas yang sudah dikerjakan oleh masing-masing pengguna, hanya pengguna tersebut yg dapat melihat -->										  
										</tbody>
									  </table>
									</div>
								</ul>
							</div>
						</div>
					</div>

				</div>
			</div>
              <div class="card-body ">
                
              </div>
            </div>
      </div>
<?php $this->load->view('template/footer') ?>
    </div>
  </div>
  
  <!--   Core JS Files   -->
 <?php $this->load->view('template/script') ?>
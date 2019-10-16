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
            <h3 class="title d-inline">DATA KAS</h3>
          </div>
			<div class="container p-t-md">
				<div class="row">
					<div class="col-md-12">
						<ul class="nav nav-tabs">
							<li class="nav-item">
								<a class="nav-link active" data-toggle="tab" href="#transaksi">Transaksi</a>
							</li>
							
						</ul>

				<div role="tabpanel" class="tab-pane active" id="transaksi">
								<ul class="list-group media-list media-list-stream">
									<div class="table-full-width table-responsive " style="margin-top:10px">
									  <table class="table">
									    <thead class="text-center">
											<th>No Transaksi</th>
											<th>Tanggal</th>
											<th>Keterangan</th>
											<th>Jenis Transaksi</th>
											<th>Nominal</th>
											<th>Saldo</th>
											<th>Action</th>
										</thead>
										<tbody>
<!-- Diulang sebanyak jumlah mahasiswa berdasarkan TANGGAL DEADLINE TERDEKAT -->
<?php 
$saldo_kas=0;
foreach ($data_kas as $key => $value) {
	if($value->jenis_transaksi=="debit"){
	   		$saldo_kas=$saldo_kas+$value->nominal;
	   		$masuk = $value->nominal;
	   		$keluar = "";
	   	}
	   	else{
	   		$saldo_kas=$saldo_kas-$value->nominal;
	   		$keluar = $value->nominal;
	   		$masuk = "";
	   	}
?>
						  <tr class="text-center">
                          <td><?php echo $value->id_trans  ?></td>
                          <td><?php 
                             $tgl = explode("-", $value->tanggal);
                             echo " $tgl[2]-$tgl[1]-$tgl[0]";  
                             ?>
                          </td>
                          <td><?php echo $value->ket ?> </td>
                          <td><?php echo $value->jenis_transaksi ?></td>        
                          <td><?php echo $value->nominal  ?></td>           
                          <td><?php echo $saldo_kas ?></td>  
                          <td>
                           <?php if($_SESSION['jenis']=='admin') { ?>
              				<a href="<?php echo site_url('kas/edit_kas/'.$value->id_trans) ?>"  class="btn btn-link"><i class="tim-icons icon-pencil"></i></a>
              				<a href="<?php echo site_url('kas/delete/'.$value->id_trans)?>" class="btn btn-link">
              				<i class="tim-icons icon-trash-simple"></i></a>
            				<?php }?>
                          </td>
                        </tr>
<?php  }?>
<!-- /Diulang sebanyak jumlah mahasiswa berdasarkan TANGGAL DEADLINE TERDEKAT -->	
									  
										</tbody>
									  </table>
									</div>
								</ul>
							</div>
							
										  
<!-- /Diulang sebanyak jumlah mahasiswa berdasarkan TANGGAL DEADLINE TERDEKAT -->	
									  
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
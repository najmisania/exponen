<?php
include 'conn.php';
if ($_POST['daftar']=="1"){
	/*$kass = $_POST['kas'];
	$periode = "";
	foreach ($_POST as $key => $value) {
    echo "Field ".htmlspecialchars($key)." is ".htmlspecialchars($value)."<br>";
	
}*/
	$query = "SELECT * FROM t_mhs ORDER BY nama";
	$result = mysqli_query($conn, $query);
	$n = 1;
	/*while ($row = mysqli_fetch_array($result)) {
		$npm[$n] = $row['npm'];
		for($m = 1; $m <= 12; $m++){
			$kass[$n][$m] = $_POST['kas'][$n][$m];
			if(!$kass[$n][$m]==""){
				$querysimpan = "INSERT INTO t_kas ('".$npm[$n]."','".$kass[$n][$m]."')";
				echo $querysimpan."<br>";
			}
		}
		echo "<br>";
		$n = $n + 1;
		
	}*/
	while ($row = mysqli_fetch_array($result)) {
		$npm[$n] = $row['npm'];
		$kass[$n][1] = $_POST['kas'][$n][1];
		$kass[$n][2] = $_POST['kas'][$n][2];
		$kass[$n][3] = $_POST['kas'][$n][3];
		$kass[$n][4] = $_POST['kas'][$n][4];
		$kass[$n][5] = $_POST['kas'][$n][5];
		$kass[$n][6] = $_POST['kas'][$n][6];
		$kass[$n][7] = $_POST['kas'][$n][7];
		$kass[$n][8] = $_POST['kas'][$n][8];
		$kass[$n][9] = $_POST['kas'][$n][9];
		$kass[$n][10] = $_POST['kas'][$n][10];
		$kass[$n][11] = $_POST['kas'][$n][11];
		$kass[$n][12] = $_POST['kas'][$n][12];
		$jumlah = ($kass[$n][1]+$kass[$n][2]+$kass[$n][3]+$kass[$n][4]+$kass[$n][5]+$kass[$n][6]+
					$kass[$n][7]+$kass[$n][8]+$kass[$n][9]+$kass[$n][10]+$kass[$n][11]+$kass[$n][12]+$jumlah);
		$querysimpan = "INSERT INTO t_kas (id_kas, npm, per_1, per_2, per_3, per_4, per_5, per_6, per_7, per_8, per_9, per_10, per_11, per_12) VALUES ('".$n."','".$npm[$n]."','".$kass[$n][1]."',
						'".$kass[$n][2]."','".$kass[$n][3]."','".$kass[$n][4]."','".$kass[$n][5]."','".$kass[$n][6]."','".$kass[$n][7]."','".$kass[$n][8]."','".$kass[$n][9]."',
						'".$kass[$n][10]."','".$kass[$n][11]."','".$kass[$n][12]."')";
		//echo $jumlah;
		mysqli_query($conn, $querysimpan);
		//setiap tambah mahasiswa baru, querynya ditambahkan untuk mengisi npm pada tabel t_kas
		//$querysimpan2 = "UPDATE t_kas set per_1='".$kass[$n][1]."', per_2='".$kass[$n][2]."', per_3='".$kass[$n][3]."', per_4='".$kass[$n][4]."', 
		//				per_5='".$kass[$n][5]."', per_6='".$kass[$n][6]."', per_7='".$kass[$n][7]."', per_8='".$kass[$n][8]."', per_9='".$kass[$n][9]."',
		//				per_10='".$kass[$n][10]."', per_11='".$kass[$n][11]."', per_12='".$kass[$n][12]."' WHERE npm='".$npm[$n]."'";
		$n = $n + 1;
		
	}
	$jumlahnya = $jumlah*5000;
	//echo $jumlahnya;
	$querytrans = "SELECT * FROM t_trans ORDER BY tanggal DESC LIMIT 1";
	$resulttrans = mysqli_query($conn, $querytrans);
	$saldo = 20000;
	while ($row = mysqli_fetch_array($resulttrans)) {
		$saldo = $row['saldo'];
		$saldo = $saldo + $jumlahnya;
		$querytra = "INSERT INTO t_trans (ket, debit, saldo) VALUES ('Uang kas kelas','".$jumlahnya."','".$saldo."')";
		
	}
	//INSERT INTO t_resep (f_jdlresep,f_userid) VALUES ('".$namaresep."','".$userid."')
	//UPDATE t_resep set f_gambar='".$filename."' WHERE f_idresep='".$idresep."'";
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Exponen
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="../assets/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
  <link href="../../../open-iconic-master/font/css/open-iconic-bootstrap.css" rel="stylesheet">
</head>

<body class="">
  <div class="wrapper">
    <div class="sidebar">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
    -->
      <div class="sidebar-wrapper">
        <div class="logo">
          <a href="javascript:void(0)" class="simple-text logo-normal">
            *Nama Mahasiswa*
          </a>
		  <small class="text-muted">*NPM*</small>
        </div>
        <ul class="nav">
          <li>
            <a href="home.html">
              <i class="tim-icons oi oi-home"></i>
              <p>Home</p>
            </a>
          </li>
		  <li>
            <a href="ubahpass.html">
              <i class="tim-icons icon-pencil"></i>
              <p>Ubah Profil</p>
            </a>
          </li>
		  <li>
            <a href="tdatadosen.html">
              <i class="tim-icons icon-simple-add"></i>
              <p>Data Dosen</p>
            </a>
          </li>
		  <li>
            <a href="tdatamahasiswa.html">
              <i class="tim-icons icon-simple-add"></i>
              <p>Data Mahasiswa</p>
            </a>
          </li>
		  <li>
            <a href="tdatatugas.html">
              <i class="tim-icons icon-simple-add"></i>
              <p>Data Tugas</p>
            </a>
          </li>
		  <li>
            <a href="tdatakas.php">
              <i class="tim-icons icon-simple-add"></i>
              <p>Data Kas</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle d-inline">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:void(0)">EXPONEN 4IA18</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav ml-auto">
              <li>
                <a href="#" class="dropdown-toggle nav-link" >
                  <i class="tim-icons icon-button-power"></i>
                  <p class="d-lg-none">
                    Keluar
                  </p>
                </a>
              </li>
              <li class="separator d-lg-none"></li>
            </ul>
          </div>
        </div>
      </nav>
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
		<div class="col-3" style="text-align:center;margin-bottom:10px;">
				<a href="datadosen.html"><button type="button" class="btn md-btn btn-outline-secondary">Data Dosen</button></a>
         </div>
		 <div class="col-3" style="text-align:center;margin-bottom:10px;">
			<a href="datamahasiswa.html"><button type="button" class="btn md-btn btn-outline-secondary">Data Mahasiswa</button></a>
         </div>
		 <div class="col-3" style="text-align:center;margin-bottom:10px;">
			<a href="datatugas.html"><button type="button" class="btn md-btn btn-outline-secondary">Data Tugas</button></a>
         </div>
		 <div class="col-3" style="text-align:center;margin-bottom:10px;">
			<a href="datakas.php"><button type="button" class="btn md-btn btn-outline-secondary">Data Kas</button></a>
         </div>
          
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
								<a class="nav-link active" data-toggle="tab" href="#kas">Kas Kelas</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#transaksi">Transaksi</a>
							</li>
						</ul>
						<div class="tab-content">
						
							<div role="tabpanel" class="tab-pane active" id="kas">
							<form class="needs-validation" action="datakas.php" method="POST" novalidate>
								<ul class="list-group media-list media-list-stream">
<!-- Button hanya tampil untuk ADMIN dan BENDAHARA-->								
								<button type="submit" class="btn md-btn btn-outline-secondary" style="margin-top:10px">Simpan</button>
								<input type="hidden" name="daftar" value="1">
								
<!-- /Button hanya tampil untuk ADMIN dan BENDAHARA-->
									<div class="table-full-width table-responsive " style="margin-top:10px">
									  <table class="table">
									    <thead class="text-center">
											<tr>
											<th rowspan="2">NPM</th>
											<th rowspan="2">Nama</th>
											<th colspan="12">Periode</th>
											</tr>
											<tr>
											<th>1</th>
											<th>2</th>
											<th>3</th>
											<th>4</th>
											<th>5</th>
											<th>6</th>
											<th>7</th>
											<th>8</th>
											<th>9</th>
											<th>10</th>
											<th>11</th>
											<th>12</th>
											</tr>
										</thead>
										<tbody>
<!-- Diulang sebanyak jumlah mahasiswa berdasarkan TANGGAL DEADLINE TERDEKAT -->
<?php
			$query = "SELECT *,A.npm AS nnpm FROM t_mhs AS A LEFT JOIN t_kas AS B ON A.npm = B.npm ORDER BY nama";
			$result = mysqli_query($conn, $query);
			$urut = 1;
			while ($row = mysqli_fetch_array($result)) {
				$npm = $row['nnpm'];
				$nama = $row['nama'];
				$per1[$urut] = $row['per_1'];
				$per2[$urut] = $row['per_2'];
				$per3[$urut] = $row['per_3'];
				$per4[$urut] = $row['per_4'];
				$per5[$urut] = $row['per_5'];
				$per6[$urut] = $row['per_6'];
				$per7[$urut] = $row['per_7'];
				$per8[$urut] = $row['per_8'];
				$per9[$urut] = $row['per_9'];
				$per10[$urut] = $row['per_10'];
				$per11[$urut] = $row['per_11'];
				$per12[$urut] = $row['per_12'];
		  ?>
			  <tr>
				<td >
				  <?php echo $npm;?>
				</td>
				<td name="nama"><?php echo $nama;?></td>
				<td class="text-center">
				  <div class="form-check">
					<label class="form-check-label">
					  <input class="form-check-input" type="checkbox" value=1 name="kas[<?php echo $urut;?>][1]" id="periode_1" <?php if($per1[$urut]==1){ ?>checked="" <?php } ?>>
					  <span class="form-check-sign">
						<span class="check"></span>
					  </span>
					</label>
				  </div>
				</td>
				<td class="text-center">
				  <div class="form-check">
					<label class="form-check-label">
					  <input class="form-check-input" type="checkbox" value=1 name="kas[<?php echo $urut;?>][2]" id="periode_2" <?php if($per2[$urut]==1){ ?>checked="" <?php } ?>>
					  <span class="form-check-sign">
						<span class="check"></span>
					  </span>
					</label>
				  </div>
				</td>
				<td class="text-center">
				  <div class="form-check">
					<label class="form-check-label">
					  <input class="form-check-input" type="checkbox" value=1 name="kas[<?php echo $urut;?>][3]" id="periode_3" <?php if($per3[$urut]==1){ ?>checked="" <?php } ?>>
					  <span class="form-check-sign">
						<span class="check"></span>
					  </span>
					</label>
				  </div>
				</td>
				<td class="text-center">
				  <div class="form-check">
					<label class="form-check-label">
					  <input class="form-check-input" type="checkbox" value=1 name="kas[<?php echo $urut;?>][4]" id="periode_4" <?php if($per4[$urut]==1){ ?>checked="" <?php } ?>>
					  <span class="form-check-sign">
						<span class="check"></span>
					  </span>
					</label>
				  </div>
				</td>
				<td class="text-center">
				  <div class="form-check">
					<label class="form-check-label">
					  <input class="form-check-input" type="checkbox" value=1 name="kas[<?php echo $urut;?>][5]" id="periode_5" <?php if($per5[$urut]==1){ ?>checked="" <?php } ?>>
					  <span class="form-check-sign">
						<span class="check"></span>
					  </span>
					</label>
				  </div>
				</td>
				<td class="text-center">
				  <div class="form-check">
					<label class="form-check-label">
					  <input class="form-check-input" type="checkbox" value=1 name="kas[<?php echo $urut;?>][6]" id="periode_6" <?php if($per6[$urut]==1){ ?>checked="" <?php } ?>>
					  <span class="form-check-sign">
						<span class="check"></span>
					  </span>
					</label>
				  </div>
				</td>
				<td class="text-center">
				  <div class="form-check">
					<label class="form-check-label">
					  <input class="form-check-input" type="checkbox" value=1 name="kas[<?php echo $urut;?>][7]" id="periode_7" <?php if($per7[$urut]==1){ ?>checked="" <?php } ?>>
					  <span class="form-check-sign">
						<span class="check"></span>
					  </span>
					</label>
				  </div>
				</td>
				<td class="text-center">
				  <div class="form-check">
					<label class="form-check-label">
					  <input class="form-check-input" type="checkbox" value=1 name="kas[<?php echo $urut;?>][8]" id="periode_8" <?php if($per8[$urut]==1){ ?>checked="" <?php } ?>>
					  <span class="form-check-sign">
						<span class="check"></span>
					  </span>
					</label>
				  </div>
				</td>
				<td class="text-center">
				  <div class="form-check">
					<label class="form-check-label">
					  <input class="form-check-input" type="checkbox" value=1 name="kas[<?php echo $urut;?>][9]" id="periode_9" <?php if($per9[$urut]==1){ ?>checked="" <?php } ?>>
					  <span class="form-check-sign">
						<span class="check"></span>
					  </span>
					</label>
				  </div>
				</td>
				<td class="text-center">
				  <div class="form-check">
					<label class="form-check-label">
					  <input class="form-check-input" type="checkbox" value=1 name="kas[<?php echo $urut;?>][10]" id="periode_10" <?php if($per10[$urut]==1){ ?>checked="" <?php } ?>>
					  <span class="form-check-sign">
						<span class="check"></span>
					  </span>
					</label>
				  </div>
				</td>
				<td class="text-center">
				  <div class="form-check">
					<label class="form-check-label">
					  <input class="form-check-input" type="checkbox" value=1 name="kas[<?php echo $urut;?>][11]" id="periode_11" <?php if($per11[$urut]==1){ ?>checked="" <?php } ?>>
					  <span class="form-check-sign">
						<span class="check"></span>
					  </span>
					</label>
				  </div>
				</td>
				<td class="text-center">
				  <div class="form-check">
					<label class="form-check-label">
					  <input class="form-check-input" type="checkbox" value=1 name="kas[<?php echo $urut;?>][12]" id="periode_12" <?php if($per12[$urut]==1){ ?>checked="" <?php } ?>>
					  <span class="form-check-sign">
						<span class="check"></span>
					  </span>
					</label>
				  </div>
				</td>
			  </tr>
			  <?php 
			  $urut = $urut + 1; 
			  } ?>
<!-- /Diulang sebanyak jumlah mahasiswa berdasarkan TANGGAL DEADLINE TERDEKAT -->	
									  
										</tbody>
									  </table>
									</div>
								</ul>
								</form>
							</div>
						
							<div role="tabpanel" class="tab-pane fade in" id="transaksi">
								<ul class="list-group media-list media-list-stream">
									<div class="table-full-width table-responsive " style="margin-top:10px">
									  <table class="table">
									    <thead class="text-center">
											<th>No Transaksi</th>

											<th>Tanggal</th>
											<th>Keterangan</th>
											<th>Debit (Rp)</th>
											<th>Kredit (Rp)</th>
											<th>Saldo</th>
											<th>Aksi</th>
										</thead>
										<tbody>
<!-- Diulang sebanyak jumlah mahasiswa berdasarkan TANGGAL DEADLINE TERDEKAT -->
										  <tr>
											<td>
											  *No Transaksi*
											</td>

											<td>*Tanggal*
											
											</td>
											<td>
											  *Keterangan*
											  <p class="text-muted">Di unggah pada *Tanggal upload*</p>
											</td>
											<td class="text-center">
											  *00.000*
											</td class="text-center">
											<td>
											  *00.000*
											</td>
											<td class="text-center">
											  *000.000*
											</td>	
											<td class="td-actions text-center">

											  <button type="button" rel="tooltip" title="Ubah" class="btn btn-link" data-original-title="Ubah">
												<i class="tim-icons icon-pencil"></i>
											  </button>
											  <button type="button" rel="tooltip" title="Hapus" class="btn btn-link" data-original-title="Hapus">
												<i class="tim-icons icon-trash-simple"></i>
											  </button>
											  
											</td>
										  </tr>
										  
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
      <footer class="footer my-5 pt-5 text-muted text-center text-small">
		<div class="container">
			<p class="mb-1">&copy; 2018 C&N </p>
		</div>
	  </footer>
    </div>
  </div>
  
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <!-- Place this tag in your head or just before your close body tag. -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Black Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/black-dashboard.min.js?v=1.0.0"></script>
  <!-- Black Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');
        $navbar = $('.navbar');
        $main_panel = $('.main-panel');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');
        sidebar_mini_active = true;
        white_color = false;

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();



        $('.fixed-plugin a').click(function(event) {
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .background-color span').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data', new_color);
          }

          if ($main_panel.length != 0) {
            $main_panel.attr('data', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data', new_color);
          }
        });

        $('.switch-sidebar-mini input').on("switchChange.bootstrapSwitch", function() {
          var $btn = $(this);

          if (sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            sidebar_mini_active = false;
            blackDashboard.showSidebarMessage('Sidebar mini deactivated...');
          } else {
            $('body').addClass('sidebar-mini');
            sidebar_mini_active = true;
            blackDashboard.showSidebarMessage('Sidebar mini activated...');
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);
        });

        $('.switch-change-color input').on("switchChange.bootstrapSwitch", function() {
          var $btn = $(this);

          if (white_color == true) {

            $('body').addClass('change-background');
            setTimeout(function() {
              $('body').removeClass('change-background');
              $('body').removeClass('white-content');
            }, 900);
            white_color = false;
          } else {

            $('body').addClass('change-background');
            setTimeout(function() {
              $('body').removeClass('change-background');
              $('body').addClass('white-content');
            }, 900);

            white_color = true;
          }


        });

        $('.light-badge').click(function() {
          $('body').addClass('white-content');
        });

        $('.dark-badge').click(function() {
          $('body').removeClass('white-content');
        });
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();

    });
  </script>
  
</body>

</html>
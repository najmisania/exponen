
<?php
include 'conn.php';
if ($_POST['daftar']=="1"){
	$ket = $_POST['ket'];
	$jenis = $_POST['jenis'];
	$tanggal = $_POST['tanggal'];
	$uang = $_POST['uangtrans'];
	$querytrans = "SELECT * FROM t_trans ORDER BY tanggal DESC LIMIT 1";
	$resulttrans = mysqli_query($conn, $querytrans);
	while ($row = mysqli_fetch_array($resulttrans)) {
		$saldo = $row['saldo'];	
	}
	$saldo = $saldo + $uang;
	if($jenis == "debit"){
		$querydbt = "INSERT INTO t_trans (ket, debit, saldo, tanggal) VALUES ('".$ket."','".$uang."','".$saldo."',
						'".$tanggal."')";
		mysqli_query($conn, $querydbt);
	}
	if($jenis == "kredit"){
		$querykrdt = "INSERT INTO t_trans (ket, kredit, saldo, tanggal) VALUES ('".$ket."','".$uang."','".$saldo."',
						'".$tanggal."')";
		mysqli_query($conn, $querykrdt);
	}
	
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
            <h3 class="title d-inline">Tambah Data Transaksi Kas</h3>
          </div>
		  <div class="card-body ">
		  
			<div class="input-group mb-3">
			  <div class="input-group-prepend">
				<span class="input-group-text" id="inputGroup-sizing-default" style="font-size:0.7rem;">Tanggal</span>
			  </div>
			  <input value="" name="tanggal" type="date" class="form-control" id="Tanggal Lahir" placeholder="Tanggal Lahir" value="" aria-label="Large">
			</div>
			<div class="input-group mb-3">
			  <div class="input-group-prepend">
			<span class="input-group-text" id="inputGroup-sizing-default" style="font-size:0.7rem;" >Keterangan</span>
			  </div>
			  <input type="text" class="form-control" name="ket" aria-label="Default" aria-describedby="inputGroup-sizing-default">
			</div>
			<div class="input-group mb-3">
			  <div class="input-group-prepend">
			  <select id="jenistrans" name="jenis" class="form-control btn btn-outline-secondary dropdown-toggle">
				<option value="debit">Debit</option>
				<option value="kredit">Kredit</option>
			  </select>
			  </div>
			  <input min=0 type="number" name="uangtrans" class="form-control" aria-label="Text input with dropdown button">
			</div>
			<button type="submit" class="btn md-btn btn-outline-secondary" style="margin-top:10px">Simpan</button>
			<input type="hidden" name="daftar" value="1">
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
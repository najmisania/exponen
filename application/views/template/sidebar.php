    <div class="sidebar">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
    -->
      <div class="sidebar-wrapper">
        <div class="logo">
          <a href="javascript:void(0)" class="simple-text logo-normal">
            <?php print_r ($_SESSION['nama']); ?>
          </a>
      <small class="simple-text"><?php print_r($_SESSION['npm']); ?></small>
        </div>
        <ul class="nav">
          <li class="active ">
            <a href="<?php echo base_url('index.php/home/index')?>">
              <i class="tim-icons oi oi-home"></i>
              <p>Home</p>
            </a>
          </li>
      <li>
<?php if($_SESSION['jenis']=='mahasiswa') { ?>
            <a href="<?php echo base_url('index.php/ubah/daftar_ubah')?>">
              <i class="tim-icons icon-pencil"></i>
              <p>Ubah Profil</p>
            </a>
          </li>
<li>
            <a href="<?php echo base_url('index.php/tugas/tambah_tugas')?>">
              <i class="tim-icons icon-simple-add"></i>
              <p>Data Tugas</p>
            </a>
          </li>
<?php } ?>
<!-- Ditampilkan hanya untuk ADMIN -->
<?php if($_SESSION['jenis']=='admin') { ?>

      <li>
            <a href="<?php echo base_url('index.php/dosen/tambah_dosen')?>">
              <i class="tim-icons icon-simple-add"></i>
              <p>Data Dosen</p>
            </a>
          </li>

      <li>
            <a href="<?php echo base_url('index.php/mhs/tambah_mhs')?>">
              <i class="tim-icons icon-simple-add"></i>
              <p>Data Mahasiswa</p>
            </a>
          </li>
<!-- /Ditampilkan hanya untuk ADMIN -->
<!-- Ditampilkan untuk SEMUA -->
      <li>
            <a href="<?php echo base_url('index.php/tugas/tambah_tugas')?>">
              <i class="tim-icons icon-simple-add"></i>
              <p>Data Tugas</p>
            </a>
          </li>
<!-- /Ditampilkan untuk SEMUA -->
<!-- Ditampilkan hanya untuk ADMIN dan BENDAHARA -->
      <li>
            <a href="<?php echo base_url('index.php/kas/tambah_kas')?>">
              <i class="tim-icons icon-simple-add"></i>
              <p>Data Kas</p>
            </a>
          </li>
  <?php } ?>
<!-- /Ditampilkan hanya untuk ADMIN dan BENDAHARA -->
        </ul>
      </div>
    </div>
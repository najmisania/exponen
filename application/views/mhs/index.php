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
  
      <div class="card card-tasks">
        <div class="card-header text-center">
        <h4 class="title d-inline ">Data Mahasiswa - 4IA18</h4>
        </div>
        <div class="card-body ">
        <div class="table-full-width table-responsive">
          <table class="table">
          <thead class="text-center">
          <tr>
            <th>NPM</th>
            <th>Nama</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
<!-- Diulang sebanyak jumlah mahasiswa berdasarkan NAMA -->
<?php foreach ($data_mhs as $key => $value) { ?>
            <tr>
            <td>
              <p><?php echo $value->npm ?></p>
            </td>
            <td>
              <p><?php echo $value->nama ?></p>
              <p class="text-muted"><i class="tim-icons oi oi-phone" style="font-size: 12px"></i><?php echo $value->no_tlp ?></p>
              <p class="text-muted"><i class="tim-icons icon-home-85" style="font-size: 12px"></i><?php echo $value->alamat ?></p>
            </td>
            <td class="td-actions text-center">
              <?php if($_SESSION['jenis']=='admin') { ?>
              <a href="<?php echo site_url('mhs/edit_mhs/'.$value->npm) ?>"  class="btn btn-link">
                 <i class="tim-icons icon-pencil"></i>
              </a>
              <a href="<?php echo site_url('mhs/delete/'.$value->npm)?>" class="btn btn-link">
              <i class="tim-icons icon-trash-simple"></i>
              </a>
            <?php } ?>
            </td>
            </tr>
<?php } ?>
<!-- /Diulang sebanyak jumlah mahasiswa berdasarkan NAMA-->
<!-- Sample tampilan setelah diulang -->            
<!-- /Sample tampilan setelah diulang -->
          </tbody>
          </table>
        </div>
        </div>
      </div>

      </div>
<?php $this->load->view('template/footer') ?>
    </div>
  </div>
  
  <!--   Core JS Files   -->
 <?php $this->load->view('template/script') ?>
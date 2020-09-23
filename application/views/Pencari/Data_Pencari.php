<?php $this->load->view('Templates/Header'); ?>

<link rel="stylesheet" href="<?php echo base_url('assets/') ?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

<?php $this->load->view('Templates/Navigation'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Pencari
      <small>Semua Data Pencari</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo site_url('Pencari') ?>"><i class="fa fa-table"></i> Kelola User</a></li>
      <li class="active">Data Pencari</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="box">
          <div class="box-header">
            <a href="#" data-toggle="modal" data-target="#tambah_pencari" class="btn btn-default btn-sm btn-icon icon-left"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah Pencari</a>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Id Pencari</th>
                  <th>Nama Pencari</th>
                  <th>Kontak Pencari</th>
                  <th>Email Pencari</th>
                  <th>Password Pencari</th>
                  <th style="width: 15%;">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $x = 0;
                foreach ($pencari as $key => $p) {
                    $x++;
                  ?>
                  <tr>
                    <td><?php echo $p->id_pencari ?></td>
                    <td><?php echo $p->nama_pencari ?></td>
                    <td><?php echo $p->kontak_pencari ?></td>
                    <td><?php echo $p->email_pencari ?></td>
                    <td><?php echo $p->password_pencari ?></td>
                    <td style="text-align: center;">
                      <a href="#" data-toggle="modal" data-target="#edit_pencari_<?php echo $p->id_pencari ?>" class="btn btn-warning btn-sm btn-icon icon-left"><i class="fa fa-pencil"></i>&nbsp;&nbsp;Edit</a>
                      &nbsp
                      <a href="#sample-modal" data-toggle="modal" data-target="#konfirmasi_hapus_<?php echo $p->id_pencari ?>" class="btn btn-danger btn-sm btn-icon icon-left"><i class="fa fa-trash"></i>&nbsp;&nbsp;Hapus</a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php foreach ($pencari as $key => $p) { ?>
  <!-- modal hapus -->
  <div class="modal fade" id="konfirmasi_hapus_<?php echo $p->id_pencari ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Apakah anda yakin ingin menghapus <b><?php echo $p->nama_pencari ?></b> dari pencari?</h4>
          </div>
          <div class="modal-footer">
            <center>
              <a href="<?php echo site_url('Pencari/hapus_pencari/'.$p->id_pencari) ?>"><button type="submit" class="btn btn-danger" style="width: 75px;">Ya</button></a>
              &nbsp;
              <button data-dismiss="modal" type="submit" class="btn btn-success" style="width: 75px;">Tidak</button>
            </center>
            
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
<?php } ?>

<?php foreach ($pencari as $key => $p) { ?>
<!-- modal edit -->
<div class="modal fade" id="edit_pencari_<?php echo $p->id_pencari ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Edit Pencari <?php echo $p->nama_pencari ?></h4>
        </div>
        <form action="<?php echo site_url('Pencari/edit_pencari/'.$p->id_pencari) ?>" method="POST">
          <div class="modal-body">
            <div class="form-group">
              <label>Nama Pencari</label>
              <input type="text" class="form-control" id="" name="nama_pencari" value="<?php echo $p->nama_pencari ?>">
            </div>
            <div class="form-group">
              <label>Kontak Pencari</label>
              <input type="text" class="form-control" id="" name="kontak_pencari" value="<?php echo $p->kontak_pencari ?>">
            </div>
            <div class="form-group">
              <label>Email Pencari</label>
              <input type="text" class="form-control" id="" name="email_pencari" value="<?php echo $p->email_pencari ?>">
            </div>
            <div class="form-group">
              <label>Password Pencari (biarkan kosong jika tidak ada perubahan)</label>
              <input type="password" class="form-control" id="" name="password_pencari" value="">
            </div>
          </div>

          <div class="modal-footer">
            <button type="submit" class="btn btn-danger pull-left">Simpan</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
<?php } ?>

<!-- modal tambah -->
<div class="modal fade" id="tambah_pencari">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Tambah Pencari</h4>
        </div>
        <form action="<?php echo site_url('Pencari/tambah_pencari') ?>" method="POST">
          <div class="modal-body">
            <div class="form-group">
              <label>Nama Pencari</label>
              <input type="text" class="form-control" id="" name="nama_pencari">
            </div>
            <div class="form-group">
              <label>Kontak Pencari</label>
              <input type="text" class="form-control" id="" name="kontak_pencari">
            </div>
            <div class="form-group">
              <label>Email Pencari</label>
              <input type="text" class="form-control" id="" name="email_pencari">
            </div>
            <div class="form-group">
              <label>Password Pencari</label>
              <input type="password" class="form-control" id="" name="password_pencari">
            </div>
          </div>

          <div class="modal-footer">
            <button type="submit" class="btn btn-danger pull-left">Tambah</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <?php $this->load->view('Templates/Footer'); ?>

  <script src="<?php echo base_url('assets/') ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url('assets/') ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

  <script>
    $(function () {
      $('#example1').DataTable({
          'ordering'    : false,
      })
      $('#example2').DataTable({
        'paging'      : true,
        'lengthChange': false,
        'searching'   : false,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
      })
    })
  </script>
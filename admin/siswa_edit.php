<?php include_once "views/main.php";?>
<?php 
  include '../config/connection.php';
?>
<div class="my-md-1">
          <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="index.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Siswa</li>
          </ol>
          <div class="my-3 my-md-5">
          <div class="container">
            <div class="row">
              <div class="col-lg-4">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Tambah Data Siswa Aktif</h3>
                  </div>
                  <div class="card-body">
                  <?php
                include "../config/connection.php";
                $query = mysqli_query($connect,"SELECT tb_siswa.nis, tb_siswa.no_pendaftar, tb_siswa.nama_siswa, tb_siswa.siswa_status FROM tb_siswa LEFT JOIN tb_pendaftar ON tb_siswa.no_pendaftar=tb_pendaftar.no_pendaftar  WHERE tb_siswa.nis='".$_GET['id']."'");
                $Data  = mysqli_fetch_array($query);
            ?>
            <form action="siswa_edit_proses.php" enctype="multipart/form-data" method="post">
              <div class="form-group">
                <label>No. Pendaftar</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="no_pendaftar" readonly type="text" class="form-control" onkeypress="" value="<?php echo $Data['no_pendaftar'] ?>"/>
                  </div>
              </div>
              <div class="form-group">
                <label>No. Induk Siswa</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="no_induk" readonly type="text" class="form-control" value="<?php echo $Data['nis'] ?> " />
                  </div>
              </div>
              <div class="form-group">
                <label>Nama Siswa</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="nama_siswa" type="text" class="form-control" onkeypress="" value="<?php echo $Data['nama_siswa'] ?> "/>
                  </div>
              </div>
              <div class="form-group">
                <label>Status</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-user-o"></i>
                    </div>
                    <select name="statussiswa" class="form-control">
                      <option selected value="">-Pilih Status-</option>
                      <?php
                      if ($Data['siswa_status'] == "Aktif") echo "<option value='Aktif' selected>Aktif</option>";
                        else echo "<option value='Aktif'>Aktif</option>";
                      if ($Data['siswa_status'] == "Tidak Aktif") echo "<option value='Tidak Aktif' selected>Tidak Aktif</option>";
                        else echo "<option value='Tidak Aktif'>Tidak Aktif</option>";
                      ?>
                    </select>
                  </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-success" type="submit" name="btnedit" value="btnedit">
                  Ubah
                </button>
                <a href="siswa.php" class="btn btn-danger">
                  Batal
                </a>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <form class="card">
          <div class="card-header">
            <h3 class="card-title">Data Siswa Aktif</h3>
          </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowrap datatable">
                  <thead>
                    <tr>
                      <th class="w-1">No.</th>
                      <th>No. Pendaftaran</th>
                      <th>No Induk Siswa</th>
                      <th>Nama Siswa</th>
                      <th>Status Siswa</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                    <tbody>
                        <?php
                      $sql=mysqli_query($connect,"SELECT tb_siswa.nis, tb_siswa.no_pendaftar, tb_siswa.nama_siswa, tb_siswa.siswa_status FROM tb_siswa LEFT JOIN tb_pendaftar ON tb_siswa.no_pendaftar=tb_pendaftar.no_pendaftar ");
                      $no=1;
                      while($h=mysqli_fetch_array($sql)){ ?>
                      <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $h['no_pendaftar'];?></td>
                        <td><?php echo $h['nis'];?></td>
                        <td><?php echo $h['nama_siswa'];?></td>
                        <td><?php echo $h['siswa_status'];?></td>
                        <td>
                            <a href="siswa_edit.php?id=<?php echo $h['nis'];?>" class="btn btn-secondary btn-sm"><i class="fe fe-edit"></i>Edit</a>
                        </td>
                      </tr>
                        <?php $no++; } ?>
                    </tbody>
                </table>
                    <script>
                      require(['datatables', 'jquery'], function(datatable, $) {
                            $('.datatable').DataTable();
                          });
                    </script>
              </div>
            </div>
          </div>
        </div>
      </div>
  </body>
</html>
<?php
include_once('function.php');
include_once('templates/header.php');

if (isset($_GET['id'])) {
  $id = $_GET['id'];
}
if (isset($_SESSION['role'])) {
  if ($_SESSION['role'] == 'admin') {
    ?>
    <div class="alert alert-danger" role="alert">
      Selamat Datang!
    </div>
    <?php
} else {
  ?>
  <div class="alert alert-danger" role="alert">
    Anda tidak memiliki akses untuk mengakses halaman ini.
    </div>
    <?php
    exit;
}
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Data User</h1>

<?php
if (isset($_POST['simpan'])) {
  if (tambah_user($_POST) > 0) {
?>
      <div class="alert alert-danger" role="alert">
        Data berhasil disimpan!
      </div>
      <?php
  } else {
    ?>
    <div class="alert alert-danger" role="alert">
      Data gagal disimpan!
    </div>
  <?php
  } 
}
?>

<?php
if (isset($_POST['ganti_password'])) {
    if (ganti_password($_POST) > 0) {
        ?>
            <div class="alert alert-danger" role="alert">
                Password berhasil diganti!
            </div>
        <?php
} else {
    ?>
    <div class="alert alert-danger" role="alert">
        Password gagal diganti!
    </div>
<?php
}
}
?>
<?php
    $query = mysqli_query($koneksi, "SELECT max(id_user) as kodeTerbesar FROM users");
    $data = mysqli_fetch_array($query);
    $kodeuser = $data['kodeTerbesar'];

    $urutan = (int) substr($kodeuser, 3, 2);

    $urutan++;

    $huruf = "usr";
    $kodeuser = $huruf . sprintf("%02s", $urutan);
?>
<!-- DataTales Example -->
<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <button type="button" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#tambahModal">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">Data User</span>
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Username</th>
                                            <th>User Role</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;

                                        $users = query("SELECT * FROM users");
                                        foreach($users as $user) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $user['username'] ?></td>
                                            <td><?= $user['user_role'] ?></td>
                                            <td><a class="btn btn-success" href="edit-user.php?id=<?= $user['id_user']?>">Ubah</a>
                                            <button type="button" class="btn btn-info btn-icon-split" data-toggle="modal" data-target="#gantiPassword" data-id="<?= $user['id_user'] ?>">
                                                <span class="text">Ganti Password</span>
                                            </button>
                                            <a onclick="confirm('Apakah anda yakin ingin menghapus data ini')" class="btn btn-danger" href="hapus-tamu.php?id=<?= $user['id_user']?>">Hapus</a>
                                          </td>
                                        </tr>
                                        <?php endforeach; ?>    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

</div>
<?php
    $query = mysqli_query($koneksi, "SELECT max(id_user) as kodeTerbesar FROM users");
    $data = mysqli_fetch_array($query);
    $kodeuser = $data['kodeTerbesar'];

    $urutan = (int) substr($kodeuser, 3, 2);

    $urutan++;

    $huruf = "usr";
    $kodeuser = $huruf . sprintf("%02s", $urutan);
?>
<!-- Modal Tambah -->
<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="">
          <input type="hidden" name="id_user" id="id_user" value="<?= $kodeuser ?>">
          
          <div class="form-group row">
            <label for="username" class="col-sm-3 col-form-label">Username</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="username" name="username">
            </div>
          </div>
          
          <div class="form-group row">
            <label for="password" class="col-sm-3 col-form-label">Password</label>
            <div class="col-sm-8">
              <input type="password" class="form-control" id="password" name="password">
            </div>
          </div>
          
          <div class="form-group row">
            <label for="user_role" class="col-sm-3 col-form-label">User Role</label>
            <div class="col-sm-8">
              <select name="user_role" id="user_role">
                <option value="admin">Administrator</option>
                <option value="operator">Operator</option>
              </select>
            </div>
          </div>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
      </div>
        </form>
    </div>
  </div>
</div>

<!-- Modal Ganti Password -->
<div class="modal fade" id="gantiPassword" tabindex="-1" aria-labelledby="gantiPasswordLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="gantiPasswordLabel">Ganti Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="">
          <input type="hidden" name="id_user" id="id_user">
          <div class="form-group row">
            <label for="password" class="col-sm-4 col-form-label">Password Baru</label>
            <div class="col-sm-7">
              <input type="password" class="form-control" id="password" name="password">
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
        <button type="submit" name="ganti_password" class="btn btn-primary">Simpan</button>
      </div>
        </form>
    </div>
  </div>
</div>

<!-- /.container-fluid -->

<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

<?php
include_once('templates/footer.php');
?>
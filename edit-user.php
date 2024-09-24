<?php
include_once('templates/header.php');
include_once('function.php');

// jika ada id_tamu di url
if (isset($_GET['id'])) {
    $id_user = $_GET['id'];

    $data = query("SELECT * FROM users WHERE id_user = '$id_user'")[0];
}
?>
<?php
if (isset($_POST['simpan'])) {
    if (ubah_user($_POST) > 0) {
?>
        <div class="alert alert-success" role="alert">
            Data berhasil disimpan!
        </div>
    <?php
    } else {
    ?>
    <div class="alert alert-danger" role="alert">
        Data gagal diubah!
    </div>
<?php
    }
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Data Tamu</h1>

<!-- Kontent edit data tamu -->
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
          <input type="hidden" name="id_user" id="id_user" value="<?= $id_user ?>">
          
          <div class="form-group row">
            <label for="username" class="col-sm-3 col-form-label">Username</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="username" name="username" value="<?= $data['username'] ?>">
            </div>
          </div>
          
          <div class="form-group row">
            <label for="password" class="col-sm-3 col-form-label">Password</label>
            <div class="col-sm-8">
              <input type="password" class="form-control" id="password" name="password" value="<?= $data['password'] ?>">
            </div>
          </div>
          
          <div class="form-group row">
            <label for="user_role" class="col-sm-3 col-form-label">User Role</label>
            <div class="col-sm-8">
              <select name="user_role" id="user_role">
                <option value="admin" <?= $data['user_role'] == 'admin' ? 'selected' : ''; ?>>Administrator</option>
                <option value="operator" <?= $data['user_role'] == 'operator' ? 'selected' : ''; ?>>Operator</option>
              </select>
            </div>
          </div>
          
      </div>
      <div class="form-group row">
        <label for="" class="col-sm-3 col-form-label"></label>
        <div class="col-sm-8 d-flex justify-content-end">
            <div>
                <a type="button" class="btn btn-danger btn-icon-split" href="users.php">
                    <span class="icon text-white-50">
                        <i class="fas fa-chevron-left"></i>
                    </span>
                    <span class="text">Kembali</span>
                </a>
                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
            </div>
        </div>
      </div>
        </form>
    </div>
  </div>
</div>
<!-- /.container-fluid -->

<?php
include_once('templates/footer.php');
?>
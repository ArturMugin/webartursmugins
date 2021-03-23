<?php
include ('security.php');
include ('inc/head.php');
include ('inc/navbar.php');
?>



<div class="container-fluid pad-cont-fix">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">EDIT Admin Profile </h6>
  </div>

  <div class="card-body">

<?php
require 'config/config.php';
if (isset($_POST['edit_btn'])) {
    $id = $_POST["edit_id"];
    $query = "SELECT * FROM admins WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);
    foreach ($query_run as $row) {
?>


  <form action="code.php" method="POST">
<input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
<div class="modal-body">

    <div class="form-group">
        <label> Username </label>
        <input type="text" name="edit_username" value="<?php echo $row['username'] ?>" class="form-control" placeholder="Enter Username">
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="email" name="edit_email" value="<?php echo $row['email'] ?>" class="form-control" placeholder="Enter Email">
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password" name="edit_password" value="<?php echo $row['password'] ?>" class="form-control" placeholder="Enter Password">
    </div>
</div>
<div class="modal-footer">
    <button type="submit" name="updatebtn" class="btn btn-primary" data-dismiss="modal">UPDATE</button>
    <a href="register.php" class="btn btn-danger">CANCEL</a>
</div>
</form>
<?php
    }
}
?>
</div>
</div>
</div>










<div class="container-fluid pad-cont-fix">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">EDIT Usere Profile </h6>
  </div>

  <div class="card-body">

<?php
require 'config/config.php';
if (isset($_POST['edit_btn'])) {
    $id = $_POST["edit_id"];
    $query = "SELECT * FROM basic_user WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);
    foreach ($query_run as $row) {
?>


  <form action="code.php" method="POST">
<input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
<div class="modal-body">

    <div class="form-group">
        <label> Username </label>
        <input type="text" name="edit_username" value="<?php echo $row['username'] ?>" class="form-control" placeholder="Enter Username">
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="email" name="edit_email" value="<?php echo $row['email'] ?>" class="form-control" placeholder="Enter Email">
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password" name="edit_password" value="<?php echo $row['password'] ?>" class="form-control" placeholder="Enter Password">
    </div>
</div>
<div class="modal-footer">
    <button type="submit" name="updatebtnu" class="btn btn-primary" data-dismiss="modal">UPDATE</button>
    <a href="register.php" class="btn btn-danger">CANCEL</a>
</div>
</form>
<?php
    }
}
?>
</div>
</div>
</div>




<?php
include ('inc/js-scripts.php');
include ('inc/footer.php');
?>

<?php
include ('security.php');
include ('inc/head.php');
include ('inc/navbar.php');
?>



<!-- PROBABLY NEEDS TO BE REMOVED, but if color of the page wont change this needs to be uncomented-->
<?php
// require 'config/config.php';
// $currentUser = $_SESSION["username"];
// $query = "SELECT * FROM admins WHERE username='$currentUser' ";
// $query_run = mysqli_query($connection, $query);
// if ($query_run) {
//     if (mysqli_num_rows($query_run) > 0) {
//         while ($row = mysqli_fetch_array($query_run)) {
//             if ($row['dark'] == 1) {
//                 echo "<script> var body = document.body;

//             body.classList.add('white-content'); </script>";
//             } else {
//                 echo "<script> $('body').addClass('white-content'); </script>";
//             }
//         }
//     }
// }
?>


<!--    popup window for adding admins     -->
<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Admin Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> Username </label>
                <input type="text" name="username" class="form-control inp-color" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control inp-color" placeholder="Enter Email">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control inp-color" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirmpassword" class="form-control inp-color" placeholder="Confirm Password">
            </div>
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid pad-cont-fix">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">  
    <h6 class="m-0 font-weight-bold text-primary">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
        Add Admin Profile
    </h6>
  </div>

  <div class="card-body">
<!--     alert of user updates or errors    -->
    <?php
if (isset($_SESSION['success']) && $_SESSION['success'] != '') {
    echo '<h2 class="bg-primary text-white">' . $_SESSION['success'] . '</h2>';
    unset($_SESSION['success']);
}
if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
    echo '<h2 class="bg-danger text-white">' . $_SESSION['status'] . '</h2>';
    unset($_SESSION['status']);
}
?>







<!--   make a table with admin contents      -->
    <div class="table-responsive">
      <?php
require 'config/config.php';
$query = "SELECT * FROM admins";
$query_run = mysqli_query($connection, $query);
?>

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th> Username </th>
            <th>Email </th>
            <th>Password</th>
            <th>EDIT </th>
            <th>DELETE </th>
          </tr>
        </thead>
        <tbody>
     <?php
if (mysqli_num_rows($query_run) > 0) {
    while ($row = mysqli_fetch_assoc($query_run)) {
?>
              <tr>
          
            <td><?php echo $row["id"]; ?></td>
            <td><?php echo $row["username"]; ?></td>
            <td><?php echo $row["email"] ?></td>
            <td><?php echo $row["password"]; ?></td>
            <td>
        
                <form action="edit-profile.php" method="post">
                    <input type="hidden" name="edit_id" value="<?php echo $row["id"]; ?>">
                    <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                </form>
            </td>
            <td>

                <form action="code.php" method="post">
                  <input type="hidden" name="delete_id" value="<?php echo $row['id'] ?>">
                  <button type="submit" name="delete_btn" class="btn btn-danger" onclick="demo.showNotification('bottom','center');"> DELETE</button>
                </form>
            </td>
          </tr>
          <?php
    }
} else {
    echo "no record found";
}
?>
        </tbody>
      </table>

    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

















<div class="container-fluid pad-cont-fix">
<!--      sho user profiles   -->
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">  
    <h6 class="m-0 font-weight-bold text-primary">
      <button type="button" class="btn btn-primary">
        USER PROFILES
    </h6>
  </div>

  <div class="card-body">

    <?php
if (isset($_SESSION['success']) && $_SESSION['success'] != '') {
    echo '<h2 class="bg-primary text-white">' . $_SESSION['success'] . '</h2>';
    unset($_SESSION['success']);
}
if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
    echo '<h2 class="bg-danger text-white">' . $_SESSION['status'] . '</h2>';
    unset($_SESSION['status']);
}
?>








    <div class="table-responsive">
      <?php
require 'config/config.php';
$query = "SELECT * FROM basic_user";
$query_run = mysqli_query($connection, $query);
?>

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th> Username </th>
            <th>Email </th>
            <th>Password</th>
            <th>EDIT </th>
            <th>DELETE </th>
          </tr>
        </thead>
        <tbody>
     <?php
if (mysqli_num_rows($query_run) > 0) {
    while ($row = mysqli_fetch_assoc($query_run)) {
?>
              <tr>
          
            <td><?php echo $row["id"]; ?></td>
            <td><?php echo $row["username"]; ?></td>
            <td><?php echo $row["email"] ?></td>
            <td><?php echo $row["password"]; ?></td>
            <td>
        
                <form action="edit-profile.php" method="post">
                    <input type="hidden" name="edit_id" value="<?php echo $row["id"]; ?>">
                    <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                </form>
            </td>
            <td>

                <form action="code.php" method="post">
                  <input type="hidden" name="delete_id" value="<?php echo $row['id'] ?>">
                  <button type="submit" name="delete_btnu" class="btn btn-danger" onclick="demo.showNotification('bottom','center');"> DELETE</button>
                </form>
            </td>
          </tr>
          <?php
    }
} else {
    echo "no record found";
}
?>
        </tbody>
      </table>

    </div>
  </div>
</div>

</div>


















<?php
include ('inc/js-scripts.php');
include ('inc/footer.php');
?>
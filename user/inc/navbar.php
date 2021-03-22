<?php 

require 'config/config.php';
$currentUser = $_SESSION["username"];
$query = "SELECT * FROM basic_user WHERE username='$currentUser' "; 
$query_run = mysqli_query($connection, $query);
if($query_run){

    if(mysqli_num_rows($query_run)>0){


        while($row = mysqli_fetch_array($query_run)){
          if ($row['dark'] == 1){

            echo '<script type="text/javascript">',
            'var body = document.body;body.classList.add("white-content");',
            '</script>';
          }



}}}


?>





  <div class="wrapper">
    <div class="sidebar">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
    -->
      <div class="sidebar-wrapper">
        <div class="logo">

          <a href="javascript:void(0)" class="simple-text logo-normal">
            SETTINGS
          </a>
        </div>
        <ul class="nav">

  <!--        <li>
            <a href="settings.php">
              <i class="tim-icons icon-settings-gear-63"></i>
              <p>Settings</p>
            </a>
          </li> -->
          <div class="dropdown" style="text-align:center;">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Colour Mode
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="margin-left: 30px;">







    <form action="code.php" method="POST">
  
<?php 

require 'config/config.php';
$currentUser = $_SESSION["username"];
$query = "SELECT * FROM basic_user WHERE username='$currentUser' "; 
$query_run = mysqli_query($connection, $query);
if($query_run){

    if(mysqli_num_rows($query_run)>0){

        while($row = mysqli_fetch_array($query_run)){

            ?>
            <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
<div class="modal-body">



    <div class="form-group">

        <p>
    <input class="dropdown-item" type="radio" id="test1" name="edit_dark" value="0">
    <label for="test1">Dark</label>
  </p>
  <p>
    <input class="dropdown-item" type="radio" id="test2" name="edit_dark" value="1">
    <label for="test2">White</label>
  </p>
    </div>
    
</div>

    <button style="margin: auto; display: block;" type="submit" name="update_dark" class="btn btn-primary" data-dismiss="modal">UPDATE</button>


            <?php

        }

    }

}



?>



 

</form>

















  </div>
</div>
          <li class="active-pro">
            <a href="./upgrade.html">
              <i class="tim-icons icon-spaceship"></i>
              <p>Upgrade to PRO</p>
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



<?php

$currentUser = $_SESSION["username"];
$query = "SELECT * FROM basic_user WHERE username='$currentUser' "; 
$query_run = mysqli_query($connection, $query);
if($query_run){

    if(mysqli_num_rows($query_run)>0){


        while($row = mysqli_fetch_array($query_run)){
          if ($row['dark'] == 1){

            echo '<a class="navbar-brand" href="javascript:void(0)"><img style="width: 200px;" src="img/logos/logo.png"></a>';
          }
          else{
            echo '<a class="navbar-brand" href="javascript:void(0)"><img style="width: 200px;" src="img/logos/logo-w.png"></a>';
          }



}}}

?>






            











          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav ml-auto">

            <li class="" style="margin-top:10px;">Hello <?php echo $_SESSION['username'];?> !</li>
              <li class="dropdown nav-item">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                  <div class="photo">
                    <img src="assets/img/anime3.png" alt="Profile Photo">
                  </div>
                  <b class="caret d-none d-lg-block d-xl-block"></b>
                  <p class="d-lg-none">
                    Log out
                  </p>
                </a>
                <ul class="dropdown-menu dropdown-navbar">
               
                 
                  <li class="nav-link"><form action="logout.php" method="POST"> </li>
          
          <button type="submit" name="logout_btn" style="display: contents;">Logout</button>

        </form></li>
                </ul>
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











<?php
include ('security.php');
include ('inc/head.php');
include ('inc/navbar.php');
?>
      
      
      
      <!-- End Navbar -->
      <div class="content">




<div class="row">



    <div class="col-12">


    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel" data-interval="5000">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="img/g2.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
    <img class="d-block w-100" src="img/fnatic.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
    <img class="d-block w-100" src="img/g2-2.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
    <img class="d-block w-100" src="img/edg.jpg" alt="First slide">
    </div>

    </div>



    <div class="row vsrow">
  <div class="col-5 text-center"><img src="img/logos/cloud.png" class="float-right logow"></div>
  <div class="col-2 text-center"><img src="img/logos/vs.png" class="float-center vsfight"></div>
  <div class="col-5 text-center"><img src="img/logos/unicorns.png" class="float-left logow"></div>
  <div class="w-100"></div>
  <div class="col"> </div>
    <div class="col-6 text-center" style="margin-top:20px;">
    <button type="button" class="btn btn-dark w-50" data-toggle="modal" data-target="#exampleModal">VOTE!</button>
    </div>
    <div class="col"></div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Who will win?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
          <i class="tim-icons icon-simple-remove"></i>
        </button>
      </div>
      <div class="modal-body">
       
      




      <form action="code.php" method="POST">
  
  <?php
$currentUser = $_SESSION["username"];
$query = "SELECT * FROM basic_user WHERE username='$currentUser' ";
$query_run = mysqli_query($connection, $query);
if ($query_run) {
    if (mysqli_num_rows($query_run) > 0) {
        while ($row = mysqli_fetch_array($query_run)) {
?>
              <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
  <div class="modal-body">
  
  
  
  <div class="form-group">

<p style="text-align: center;">
<input class="" type="radio" id="cloud1" name="edit_team" value="1">
<label for="cloud1"><img src="img/logos/cloud.png" class="float-left" style="width:100px;"></label>

<input class="" type="radio" id="cloud2" name="edit_team" value="2">
<label for="cloud2"><img src="img/logos/unicorns.png" class="float-right" style="width:100px;"></label>
</p>




</div>
<div class="modal-footer">
<button style="margin: auto; display: block;" type="submit" name="update_team" class="btn btn-warning" >VOTE</button>
</div>

      
         
  
              <?php
        }
    }
}
?>
  

  
  </form>

      </div>

    </div>
  </div>
</div>


</div>

        
      </div>


<ul style="list-style: none;margin: auto;     width: 450px; padding-top:30px;">
  <li><img src="https://media1.giphy.com/media/McsDYx2ihXzztTFMap/giphy.gif" style="width:80px;float:left;"> <h2 style="    font-size: 50px;" class="text-center"> LIVE GAME </h2></li>
</ul>

      <style>

iframe{    border-radius: 60px;}

</style>

  <!-- Add a placeholder for the Twitch embed -->
  <div id="twitch-embed" style="text-align:center;"></div>

  <!-- Load the Twitch embed script -->
  <script src="https://embed.twitch.tv/embed/v1.js"></script>

  <!-- Create a Twitch.Embed object that will render within the "twitch-embed" root element. -->
  <script type="text/javascript">
    new Twitch.Embed("twitch-embed", {
      width: "74%",
      height: 480,
      channel: "riotgames",
      // only needed if your site is also embedded on embed.example.com and othersite.example.com 
      parent: ["embed.example.com", "othersite.example.com"]
    });
  </script>






<?php
include ('inc/footer.php');
include ('inc/js-scripts.php');
?>
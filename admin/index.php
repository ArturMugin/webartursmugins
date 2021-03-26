<?php
include ('security.php');
include ('inc/head.php');
include ('inc/navbar.php');
?>
      
      
      
      <!-- End Navbar -->
      <div class="content">
        <div class="row" style="display:none;">
          <div class="col-12">
            <div class="card card-chart">
<!--    disable one graph to make the next one work -- theme breaks them   for some reason  -->
              <div class="card-body">
                <div class="chart-area">
             
                  <canvas id="chartBig1"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
        <div class="col-lg-6">
            <div class="card card-chart">
              <div class="card-header">
     <!--      add bar chart for teams   -->
                <h3 class="card-title"><i style="font-size: 30px;" class="tim-icons icon-user-run text-primary"></i> CLOUD 9 VS UNICORNS voting results</h3>
              </div>
              <div class="card-body">
              <canvas id="LCSgame"></canvas>
              <form action="code.php" method="POST" style="text-align: center;">
              <button  type="submit" name="update_team" class="btn btn-primary" data-dismiss="modal">RESET</button>
</form>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="card card-chart">
              <div class="card-header">

                <h3 class="card-title"><i style="font-size: 30px;" class="tim-icons icon-palette text-primary"></i> THEME COLOR THAT USER CHOSE </h3>
              </div><!--    black and white graph display     -->
              <div class="card-body">
              <canvas id="dark-mode"></canvas>
              <form action="code.php" method="POST" style="text-align: center;">
              <button  type="submit" name="update_dark" class="btn btn-primary" data-dismiss="modal">RESET</button>
</form>

              </div>
            </div>
          </div>

          
      
     





        </div>
        
      </div>
<?php
include ('inc/footer.php');
include ('inc/js-scripts.php');
?>
<!--   Core JS Files   -->
<script src="assets/js/core/jquery.min.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <!-- Place this tag in your head or just before your close body tag. -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Black Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/black-dashboard.min.js?v=1.0.0"></script><!-- Black Dashboard DEMO methods, don't include it in your project! -->
  <script src="assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');
        $navbar = $('.navbar');
        $main_panel = $('.main-panel');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');
        sidebar_mini_active = true;
        white_color = false;

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();



        $('.fixed-plugin a').click(function(event) {
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .background-color span').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data', new_color);
          }

          if ($main_panel.length != 0) {
            $main_panel.attr('data', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data', new_color);
          }
        });

        $('.switch-sidebar-mini input').on("switchChange.bootstrapSwitch", function() {
          var $btn = $(this);

          if (sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            sidebar_mini_active = false;
            blackDashboard.showSidebarMessage('Sidebar mini deactivated...');
          } else {
            $('body').addClass('sidebar-mini');
            sidebar_mini_active = true;
            blackDashboard.showSidebarMessage('Sidebar mini activated...');
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);
        });

        $('.switch-change-color input').on("switchChange.bootstrapSwitch", function() {
          var $btn = $(this);

          if (white_color == true) {

            $('body').addClass('change-background');
            setTimeout(function() {
              $('body').removeClass('change-background');
              $('body').removeClass('white-content');
            }, 900);
            white_color = false;
          } else {

            $('body').addClass('change-background');
            setTimeout(function() {
              $('body').removeClass('change-background');
              $('body').addClass('white-content');
            }, 900);

            white_color = true;
          }


        });

        $('.light-badge').click(function() {
          $('body').addClass('white-content');
        });

        $('.dark-badge').click(function() {
          $('body').removeClass('white-content');
        });
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();

    });
  </script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script>

<?php 
        require 'config/config.php';
        $query = "SELECT * FROM basic_user ";
        $query_run = mysqli_query($connection, $query);
        $sql = "SELECT 'novote' AS SELECTION ,COUNT(team) AS team FROM `basic_user` WHERE team=0
        UNION ALL
        SELECT 'cloud',COUNT(team) FROM `basic_user` WHERE team=1
        UNION ALL
        SELECT 'unicorns',COUNT(team) FROM `basic_user` WHERE team=2 ";
        $query_run = mysqli_query($connection, $sql);
        



      if(mysqli_num_rows($query_run)>0){

        $row = mysqli_fetch_array($query_run);
        $novote = $row['team'];
        $row = mysqli_fetch_array($query_run);
        $cloud = $row['team'];
        $row = mysqli_fetch_array($query_run);
        $unicorns = $row['team'];
 
      }
        
        ?>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "black-dashboard-free"
      });






      var ctx = document.getElementById('LCSgame').getContext('2d');
      
      var gradientStroke = ctx.createLinearGradient(0, 600, 0, 50);

gradientStroke.addColorStop(1,   'rgba(29,140,248,0.2)');
gradientStroke.addColorStop(0.4, 'rgba(29,140,248,0.0)');
gradientStroke.addColorStop(0,   'rgba(29,140,248,0)'); //blue colors

var gradientStrokep = ctx.createLinearGradient(0, 230, 0, 50);

gradientStrokep.addColorStop(1,   'rgba(255, 0, 102,0.2)');
gradientStrokep.addColorStop(0.1, 'rgba(255, 0, 102,0.0)');
gradientStrokep.addColorStop(0,   'rgba(255, 0, 102,0)');

var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'bar',
    responsive: true,

    // The data for our dataset
    data: {
        labels: ['Unicorns Of Love', 'Cloud 9'],
        datasets: [{
          label: "Countries",
          fill: true,
          backgroundColor: [gradientStroke,gradientStrokep],
          hoverBackgroundColor: [gradientStroke,gradientStrokep],
          borderColor: ['#1f8ef1','rgba(255, 0, 102)'],
          borderWidth: 2,
          borderDash: [],
          borderDashOffset: 0.0,
          data: [<?php echo $unicorns;?>, <?php echo $cloud;?>],
        }]
    },

    // Configuration options go here
    options: {
      scales: {
                            yAxes: [{
                                ticks: {
                                  
                                  beginAtZero: true,
                 userCallback: function(label, index, labels) {
                     // when the floored value is the same as the value we have a whole number
                     if (Math.floor(label) === label) {
                         return label;
                     }

                 },
                                    
                                }
                            }]
                        },
    legend: {
    	display: false
    },
  	tooltips: {
    	callbacks: {
      	label: function(tooltipItem) {
        console.log(tooltipItem)
        	return tooltipItem.yLabel;
        }
      }
    }

  }
  
});









  </script>

<script>
  
  <?php 
        require 'config/config.php';
        $query = "SELECT * FROM basic_user ";
        $query_run = mysqli_query($connection, $query);
        $sql = "SELECT 'd' AS SELECTION ,COUNT(dark) AS dark FROM `basic_user` WHERE dark=0
        UNION ALL
        SELECT 'w',COUNT(dark) FROM `basic_user` WHERE dark=1";
        $query_run = mysqli_query($connection, $sql);
        



      if(mysqli_num_rows($query_run)>0){

        $row = mysqli_fetch_array($query_run);
        $d = $row['dark'];
        $row = mysqli_fetch_array($query_run);
        $w = $row['dark'];

 
      }
        
        ?>

  var ctx = document.getElementById('dark-mode').getContext('2d');
      
      var gradientStroke = ctx.createLinearGradient(0, 400, 0, 50);
      var gradientStrokep = ctx.createLinearGradient(0, 430, 0, 50);

gradientStroke.addColorStop(1,   'rgba(255, 255, 255,0.2)');
gradientStroke.addColorStop(0.1, 'rgba(255, 255, 255,0.0)');
gradientStroke.addColorStop(0,   'rgba(255, 255, 255,0)');


    gradientStrokep.addColorStop(1, 'rgba(0, 0, 0, 0.2)');
    gradientStrokep.addColorStop(0.1, 'rgba(0, 0, 0, 0.0)');
    gradientStrokep.addColorStop(0, 'rgba(0, 0, 0, 0)');
//blue colors


var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'doughnut',
    responsive: true,

    // The data for our dataset
    data: {
        labels: ['White theme', 'Dark theme'],
        datasets: [{
          label: "Countries",
          fill: true,
          backgroundColor: [gradientStroke,gradientStrokep],
          hoverBackgroundColor: [gradientStroke,gradientStrokep],
          borderColor: ['#ffffff','#000000'],
          borderWidth: 2,
          borderDash: [],
          borderDashOffset: 0.0,
          data: [<?php echo $d;?>, <?php echo $w;?>],
        }]
    },

    // Configuration options go here
    options: {


  }
  
});

</script>







<?php


include('config/config.php');

if(isset($_POST['registerbtn']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirmpassword'];

    if($password === $confirm_password)
    {
        $query = "INSERT INTO admins (username,email,password) VALUES ('$username','$email','$password')";
        $query_run = mysqli_query($connection, $query);
    
        if($query_run)
        {
            echo "done";
            $_SESSION['success'] =  "Admin is Added Successfully";
            header('Location: login.php');
            echo '<script>alert("1")</script>'; 
        }
        else 
        {
            echo "not done";
            $_SESSION['status'] =  "Admin is Not Added";
            header('Location: register.php');
            echo '<script>alert("2")</script>'; 
        }
    }
    else 
    {
        echo "pass no match";
        $_SESSION['status'] =  "Password and Confirm Password Does not Match";
        header('Location: register.php');
        echo '<script>alert("3")</script>'; 
    }

}

?>

<script src="assets/js/login.js"></script>




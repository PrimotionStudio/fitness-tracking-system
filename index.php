<?php
require_once "required/session.php";
require_once "required/sql.php";
const PAGE_TITLE = "Dashboard - Fitness Tracking System";
require_once "required/validate.php";

require_once "func/call_ai_advice.php";
include_once "included/head.php";

?>

<body class="g-sidenav-show bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>
  <?php
  include_once "included/sidebar.php";
  ?>
  <main class="main-content position-relative border-radius-lg ">
    <?php
    include_once "included/navbar.php";
    ?>
    <div class="container-fluid py-4">
      <!-- Top Statistics -->
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Calories<br>Burned in Total</p>
                    <h5 class="font-weight-bolder">
                      <?php
                      $select_activity_metrics = "SELECT * FROM activity_metrics WHERE user_id='$user_id'";
                      $query_activity_metrics = mysqli_query($con, $select_activity_metrics);
                      $total_activity_metrics_logged = mysqli_num_rows($query_activity_metrics);
                      $total_calories_burned = 0;
                      $last_calories_burned = 0;
                      while ($get_activity_metrics = mysqli_fetch_assoc($query_activity_metrics)) {
                        $total_calories_burned += $get_activity_metrics["calories_burned"];
                        $last_calories_burned = $get_activity_metrics["calories_burned"];
                      }
                      echo number_format($total_calories_burned, 2);
                      ?>
                    </h5>
                    <p class="mb-0">
                      <span class="text-success text-sm font-weight-bolder"><?= number_format($last_calories_burned, 4) ?></span>
                      last time
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                    <i class="ni ni-ambulance text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Goals<br>Set</p>
                    <h5 class="font-weight-bolder">
                      <?php
                      // get the total no of goals set and the total no of completed goals
                      $select_goals = "SELECT * FROM goals WHERE user_id='$user_id'";
                      $query_goals = mysqli_query($con, $select_goals);
                      $total_goals_set = mysqli_num_rows($query_goals);
                      $select_completed_goals = "SELECT * FROM goals WHERE user_id='$user_id' && status='Completed'";
                      $query_completed_goals = mysqli_query($con, $select_completed_goals);
                      $total_completed_goals = mysqli_num_rows($query_completed_goals);
                      echo $total_goals_set;
                      ?>
                    </h5>
                    <p class="mb-0">
                      <span class="text-success text-sm font-weight-bolder"><?= $total_completed_goals ?></span>
                      achieved
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Activity<br>Logged</p>
                    <h5 class="font-weight-bolder">
                      <?= $total_activity_metrics_logged ?>
                    </h5>
                    <p class="mb-0">
                      <?php
                      $current_date = date("Y-m-d");
                      $select_steps = "SELECT * FROM steps WHERE date = '$current_date'";
                      $query_steps = mysqli_query($con, $select_steps);
                      if (mysqli_num_rows($query_steps) != 0) {
                        $get_steps = mysqli_fetch_assoc($query_steps);
                        $total_steps_today = $get_steps["step_count"];
                        $average_speed = $get_steps["average_speed"];
                      } else {
                        $total_steps_today = 0;
                        $average_speed = 0;
                      }
                      ?>
                      <small class="text-xxs font-weight-bolder"><span class='text-success'><?= $total_steps_today . "</span> steps today at average speed <span class='text-success'>" . $average_speed . "</span> steps per second" ?></small>
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                    <i class="ni ni-ambulance text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Nutrition Logged</p>
                    <h5 class="font-weight-bolder">
                      <?php
                      // get the total number of nutrition logged
                      $select_nutrition_logs = "SELECT * FROM nutrition_logs WHERE user_id='$user_id'";
                      $query_nutrition_logs = mysqli_query($con, $select_nutrition_logs);
                      $total_nutrition_logs = mysqli_num_rows($query_nutrition_logs);
                      echo $total_nutrition_logs;
                      ?>
                    </h5>
                    <p class="mb-0">
                      <span class="text-success text-sm font-weight-bolder">&nbsp;</span>
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-lg-7 mb-lg-0 mb-4">
          <div class="card z-index-2" style='height: 400px;'>
            <div class="card-header pb-0 p-3 d-flex justify-content-between">
              <h6 class="mb-0">AI Advices</h6>
              <form action="" method="post">
                <!-- Make a post request to self and get AI advice -->
                <button type="submit" class="btn btn-primary">Request AI Advice</button>
              </form>
            </div>
            <div class="card-body p-3">
              <ul class="list-group">
                <?php
                $select_advice = "SELECT * FROM advice WHERE user_id='$user_id'";
                $query_advice = mysqli_query($con, $select_advice);
                while ($get_advice = mysqli_fetch_assoc($query_advice)) :
                ?>
                  <li class="list-group-item border-0 d-flex justify-content-between ps-0 border-radius-lg">
                    <div class="d-flex align-items-center">
                      <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                        <i class="ni ni-satisfied text-white opacity-10"></i>
                      </div>
                      <div class="d-flex flex-column">
                        <h6 class="mb-1 text-dark text-sm"><?= truncateString($get_advice["message"]) ?></h6>
                      </div>
                    </div>
                    <div class="d-flex">
                      <form action="" method="post">
                        <input type="hidden" name="advice_id" value="<?= $get_advice["id"] ?>">
                        <button type='submit' class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
                      </form>
                    </div>
                  </li>
                <?php
                endwhile;
                ?>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="card card-carousel overflow-hidden h-100 p-0">
            <div id="carouselExampleCaptions" class="carousel slide h-100" data-bs-ride="carousel">
              <div class="carousel-inner border-radius-lg h-100">
                <div class="carousel-item h-100 active" style="background-image: url('assets/img/carousel-2.jpg');
      background-size: cover;">
                  <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                    <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                      <i class="ni ni-bulb-61 text-dark opacity-10"></i>
                    </div>
                    <h5 class="text-white mb-1">Push Your Limits</h5>
                    <p>Every rep is a step toward becoming the best version of yourself—keep pushing, and watch yourself grow stronger!</p>
                  </div>
                </div>
                <div class="carousel-item h-100" style="background-image: url('assets/img/carousel-3.jpg');
      background-size: cover;">
                  <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                    <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                      <i class="ni ni-trophy text-dark opacity-10"></i>
                    </div>
                    <h5 class="text-white mb-1">Embrace the Run</h5>
                    <p>Each stride takes you closer to your goals—run with purpose, and let your progress inspire you.</p>
                  </div>
                </div>
                <div class="carousel-item h-100" style="background-image: url('assets/img/carousel-4.jpg');
      background-size: cover;">
                  <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                    <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                      <i class="ni ni-bulb-61 text-dark opacity-10"></i>
                    </div>
                    <h5 class="text-white mb-1">Strength in Every Lift</h5>
                    <p>With each lift, you're building power and resilience—stay focused, and feel yourself get stronger with every rep.</p>
                  </div>
                </div>
                <div class="carousel-item h-100" style="background-image: url('assets/img/carousel-5.jpg');
      background-size: cover;">
                  <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                    <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                      <i class="ni ni-bulb-61 text-dark opacity-10"></i>
                    </div>
                    <h5 class="text-white mb-1">Conquer the Ropes</h5>
                    <p>Every wave of the ropes tests your endurance—keep swinging, and watch your strength and stamina soar.</p>
                  </div>
                </div>
              </div>
              <button class="carousel-control-prev w-5 me-3" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next w-5 me-3" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
        </div>
      </div>
      <?php
      include_once "included/footer.php";
      ?>
    </div>
  </main>
  <?php
  include_once "included/scripts.php";
  ?>
</body>

</html>
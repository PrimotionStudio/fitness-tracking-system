<?php
require_once "required/session.php";
require_once "required/sql.php";
const PAGE_TITLE = "BMI Calculator - Fitness Tracking System";
require_once "required/validate.php";

require_once "func/bmi-calculator.php";
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
      <div class="row">
        <div class="col-md-4 col-sm-12 mx-auto">

          <div class="card">
            <div class="card-header pb-0">
              <h4 class="font-weight-bolder">BMI Calculator</h4>
              <small>Your weight and height would be updated on your profile</small>
            </div>
            <div class="card-body">
              <form role="form" action='' method='post'>
                <div class="mb-3">
                  <input type="text" name='weight' class="form-control form-control-lg" placeholder='Weight (kg)' required>
                </div>
                <div class="mb-3">
                  <input type="text" name='height' class="form-control form-control-lg" placeholder='Height (m)' required>
                </div>
                <div class="text-center">
                  <button type="Submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Calculate</button>
                </div>
              </form>
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
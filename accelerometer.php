<?php
require_once "required/session.php";
require_once "required/sql.php";
const PAGE_TITLE = "Accelerometer - Fitness Tracking System";
require_once "required/validate.php";
include_once "included/head.php";

?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
    .symbol {
        font-family: 'Arial';
        font-weight: bold;
    }
</style>

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
            <!-- Button to start and stop the accelerometer -->
            <div class="text-center my-3">
                <button id="toggleButton" class="btn btn-dark btn-lg">Start Accelerometer</button>
            </div>

            <!-- Display real-time accelerometer data -->
            <div class="card">
                <div class="row text-center">
                    <div class="col-md-3">
                        <h5>X-Axis: <span id="xValue">0</span></h5>
                    </div>
                    <div class="col-md-3">
                        <h5>Y-Axis: <span id="yValue">0</span></h5>
                    </div>
                    <div class="col-md-3">
                        <h5>Z-Axis: <span id="zValue">0</span></h5>
                    </div>
                    <div class="col-md-3">
                        <h5>Steps: <span id="stepCount">0</span></h5>
                    </div>
                </div>
                <div class="row text-center mt-3">
                    <div class="col-md-3">
                        <h5 class="symbol">α (alpha): <span id="alphaValue">0</span></h5>
                    </div>
                    <div class="col-md-3">
                        <h5 class="symbol">β (beta): <span id="betaValue">0</span></h5>
                    </div>
                    <div class="col-md-3">
                        <h5 class="symbol">γ (gamma): <span id="gammaValue">0</span></h5>
                    </div>
                    <div class="col-md-3">
                        <h5>Speed: <span id="speedValue">0</span> m/s</h5>
                    </div>
                </div>
            </div>
            <!-- Chart container -->
            <div class="row mt-2 mx-0 px-0">
                <div class="col-12 card">
                    <canvas id="accelerometerChart"></canvas>
                </div>
            </div>
        </div>

        <?php
        include_once "included/footer.php";
        ?>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"></script>
    <script src="accelerometer.js"></script>
    <?php
    include_once "included/scripts.php";
    ?>
</body>

</html>
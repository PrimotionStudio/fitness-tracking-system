<?php
require_once "required/session.php";
require_once "required/sql.php";
const PAGE_TITLE = "Goals - Fitness Tracking System";
require_once "required/validate.php";

require_once "func/add_goals.php";
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
                <div class="col-md-7 col-sm-12">

                </div>
                <div class="col-md-5 col-sm-12">
                    <div class="card shadow">
                        <nav class=" pt-3">
                            <div class="nav nav-tabs px-3" id="nav-tab" role="tablist">
                                <button class="nav-link active font-weight-bolder" id="create-goal-tab" data-bs-toggle="tab" data-bs-target="#create-goal" type="button" role="tab" aria-controls="create-goal" aria-selected="true">Create New Goal</button>
                                <button class="nav-link font-weight-bolder" id="update-goal-tab" data-bs-toggle="tab" data-bs-target="#update-goal" type="button" role="tab" aria-controls="update-goal" aria-selected="false">Update Current Goal</button>
                            </div>
                        </nav>
                        <div class="card-body tab-content" id="nav-tabContent">
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="tab-pane fade show active" id="create-goal" role="tabpanel" aria-labelledby="create-goal-tab">
                                <div class="form-group">
                                    <label for="goalType">Goal Type</label>
                                    <select name="goalType" id="goalType" class="form-control">
                                        <option value="Weight Loss">Weight Loss Goal (kg)</option>
                                        <option value="Workout">Workout Goal</option>
                                        <option value="Distance">Distance Goal (Running or Walking) (km)</option>
                                        <option value="Calories Burned">Calories Burned Goal (kcal)</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="targetValue">Target value</label>
                                    <label><small>Example: If your goal is to complete 20 workout in a month, then 20 is the target value</small></label>
                                    <input type="number" name='targetValue' class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="goalStart">Start Date</label>
                                    <input type="date" class="form-control" id="goalStart" name="goal
                                     Start" required readonly>
                                    <script>
                                        document.addEventListener("DOMContentLoaded", function() {
                                            var today = new Date().toISOString().split('T')[0];
                                            document.getElementById('goalStart').value = today;
                                        });
                                    </script>
                                </div>
                                <div class="form-group">
                                    <label for="goalEnd">End Date</label>
                                    <input type="date" class="form-control" id="goalEnd" name="goalEnd" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Create Goal</button>
                            </form>
                            <form action="" method="post" class="tab-pane fade" id="update-goal" role="tabpanel" aria-labelledby="update-goal-tab">

                                <div class="form-group">
                                    <label for="targetValue">Current Value (?/)</label>
                                    <label><small>How close have you come to meeting your target value</small></label>
                                    <input type="number" name='currentValue' class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary">Update Goal</button>
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
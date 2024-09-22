<?php
require_once "required/session.php";
require_once "required/sql.php";
const PAGE_TITLE = "Goals - Fitness Tracking System";
require_once "required/validate.php";

require_once "func/goals.php";
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

                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h4 class="font-weight-bolder">Logged Activity Metrics</h4>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table
                                    class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Status
                                            </th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Goal Type
                                            </th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Target Value
                                            </th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Start Date
                                            </th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                End Date
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $select_goals = "SELECT * FROM goals WHERE user_id='$user_id'";
                                        $query_goals = mysqli_query($con, $select_goals);
                                        $goal_id = 0;
                                        while ($get_goals = mysqli_fetch_assoc($query_goals)) :
                                            $goal_id = $get_goals["id"];
                                        ?>
                                            <tr>

                                                <td
                                                    class="align-middle text-center text-sm">

                                                    <?php
                                                    if ($get_goals["status"] == 'Completed') :
                                                    ?>
                                                        <span
                                                            class="badge badge-sm bg-gradient-success">Completed</span>
                                                    <?php
                                                    elseif ($get_goals["status"] == 'In Progress') :
                                                    ?>
                                                        <span
                                                            class="badge badge-sm bg-gradient-warning">In Progress</span>
                                                    <?php
                                                    elseif ($get_goals["status"] == 'Failed') :
                                                    ?>
                                                        <span
                                                            class="badge badge-sm bg-gradient-danger">Failed</span>
                                                    <?php
                                                    else :
                                                    ?>
                                                        <span
                                                            class="badge badge-sm bg-gradient-gray">Undefined</span>
                                                    <?php
                                                    endif;
                                                    ?>
                                                </td>
                                                <td
                                                    class="align-middle text-center">
                                                    <span
                                                        class="text-secondary text-xs font-weight-bold"><?= $get_goals["goal_type"] ?></span>
                                                </td>
                                                <td
                                                    class="align-middle text-center">
                                                    <abbr
                                                        class="text-sm font-weight-bold mb-0"
                                                        title="<?php
                                                                switch ($get_goals['goal_type']) {
                                                                    case 'Weight Loss':
                                                                        echo "To loose " . number_format($get_goals['target_value'], 2) . "kg in about " . approximateTimeDifference(date('Y-m-d', strtotime($get_goals['start_date'])), date('Y-m-d', strtotime($get_goals["end_date"])));
                                                                        $unit = 'kg';
                                                                        break;
                                                                    case 'Workout':
                                                                        echo "To workout " . number_format($get_goals['target_value'], 2) . " time(s) within " . approximateTimeDifference(date('Y-m-d', strtotime($get_goals['start_date'])), date('Y-m-d', strtotime($get_goals["end_date"])));
                                                                        $unit = 'time(s)';
                                                                        break;
                                                                    case 'Distance':
                                                                        echo "To walk/run over " . number_format($get_goals['target_value'], 2) . "km in about " . approximateTimeDifference(date('Y-m-d', strtotime($get_goals['start_date'])), date('Y-m-d', strtotime($get_goals["end_date"])));
                                                                        $unit = 'time(s)';
                                                                        $unit = 'km';
                                                                        break;
                                                                    case 'Calories Burned':
                                                                        echo "To burn " . number_format($get_goals['target_value'], 2) . "kcal calories within " . approximateTimeDifference(date('Y-m-d', strtotime($get_goals['start_date'])), date('Y-m-d', strtotime($get_goals["end_date"])));
                                                                        $unit = 'kcal';
                                                                        break;
                                                                    default:
                                                                        $unit = '';
                                                                        break;
                                                                }
                                                                ?>">
                                                        <?= ucfirst(number_format($get_goals['target_value'])) . " " . $unit ?>
                                                    </abbr>
                                                </td>
                                                <td
                                                    class="align-middle text-center">
                                                    <span
                                                        class="text-secondary text-sm font-weight-bold"><?= date("d/m/y", strtotime($get_goals["start_date"])) ?></span>
                                                </td>
                                                <td
                                                    class="align-middle text-center">
                                                    <span
                                                        class="text-secondary text-sm font-weight-bold"><?= date("d/m/y", strtotime($get_goals["end_date"])) ?></span>
                                                </td>
                                            </tr>
                                        <?php
                                        endwhile;
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
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
                                    <label>Do you honestly think you've achieved your Goal?</label>
                                    <input type="hidden" name="goal_id" value="<?= $goal_id ?>">
                                    <button type="submit" class="btn btn-primary">Achieved Goal</button>
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
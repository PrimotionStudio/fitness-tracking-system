<?php
require_once "required/session.php";
require_once "required/sql.php";
const PAGE_TITLE = "Activities - Fitness Tracking System";
require_once "required/validate.php";

require_once "func/activities.php";
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
                <div class="col-md-8 col-sm-12">
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
                                                Date
                                            </th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Activity
                                            </th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Intensity
                                            </th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Weight
                                            </th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Duration
                                            </th>
                                            <th
                                                class="text-center text-uppercase text-danger text-xxs font-weight-bolder opacity-7">
                                                Calories Burned
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $select_activity_metrics = "SELECT * FROM activity_metrics WHERE user_id='$user_id'";
                                        $query_activity_metrics = mysqli_query($con, $select_activity_metrics);
                                        while ($get_activity_metrics = mysqli_fetch_assoc($query_activity_metrics)) :
                                        ?>
                                            <tr>
                                                <td
                                                    class="align-middle text-center">
                                                    <span
                                                        class="text-secondary text-xs font-weight-bold"><?= date("d/m/y", strtotime($get_activity_metrics["datetime"])) ?></span>
                                                </td>
                                                <td
                                                    class="align-middle text-center">
                                                    <p
                                                        class="text-sm font-weight-bold mb-0">
                                                        <?= ucfirst($get_activity_metrics['workout_type']) ?>
                                                    </p>
                                                </td>
                                                <td
                                                    class="align-middle text-center text-sm">

                                                    <?php
                                                    if ($get_activity_metrics["intensity"] == 1.0) :
                                                    ?>
                                                        <span
                                                            class="badge badge-sm bg-gradient-success">Low</span>
                                                    <?php
                                                    elseif ($get_activity_metrics["intensity"] == 1.25) :
                                                    ?>
                                                        <span
                                                            class="badge badge-sm bg-gradient-warning">Moderate</span>
                                                    <?php
                                                    elseif ($get_activity_metrics["intensity"] == 1.5) :
                                                    ?>
                                                        <span
                                                            class="badge badge-sm bg-gradient-danger">High</span>
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
                                                        class="text-secondary text-sm font-weight-bold"><?= $get_activity_metrics["weight"] ?> (kg)</span>
                                                </td>
                                                <td
                                                    class="align-middle text-center">
                                                    <span
                                                        class="text-secondary text-sm font-weight-bold"><?= $get_activity_metrics["duration"] ?> mins (<?= number_format(floatval($get_activity_metrics["duration"]) / 60, 2) ?> hrs)</span>
                                                </td>
                                                <td
                                                    class="align-middle text-end">
                                                    <span
                                                        class="text-secondary text-sm font-weight-bold"><?= $get_activity_metrics["calories_burned"] ?> kcal</span>
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
                <div class="col-md-4 col-sm-12">

                    <div class="card">
                        <div class="card-header pb-0">
                            <h4 class="font-weight-bolder">Log Activity</h4>
                        </div>
                        <div class="card-body">
                            <form role="form" action='' method='post'>
                                <div class="mb-3">
                                    <select name="workout" class="form-control form-control-lg" required>
                                        <option value="">---Workout Type---</option>
                                        <option value="8.0">Running</option>
                                        <option value="3.5">Walking</option>
                                        <option value="6.0">Cycling</option>
                                        <option value="6.0">Swimming</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <select name="intensity" class="form-control form-control-lg" required>
                                        <option value="">--- Intensity of Workout---</option>
                                        <option value="1.0">Low</option>
                                        <option value="1.25">Moderate</option>
                                        <option value="1.5">High</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <input type="number" name="duration" class="form-control form-control-lg" placeholder="Duration (minutes)">
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-lg btn-primary btn-lg p-3 w-100 mt-4 mb-0">Calculate Calories Burned and Save</button>
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
<?php
require_once "required/session.php";
require_once "required/sql.php";
const PAGE_TITLE = "Nutrition - Fitness Tracking System";
require_once "required/validate.php";

require_once "func/nutrition.php";
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
                            <h4 class="font-weight-bolder">Logged Activities</h4>
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
                                                Distance/Extent
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
                                        <tr>
                                            <td>
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">23/04/18</span>
                                            </td>
                                            <td>
                                                <p
                                                    class="text-xs font-weight-bold mb-0">
                                                    Manager
                                                </p>
                                            </td>
                                            <td
                                                class="align-middle text-center text-sm">
                                                <span
                                                    class="badge badge-sm bg-gradient-success">Online</span>
                                            </td>
                                            <td
                                                class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">23/04/18</span>
                                            </td>
                                            <td class="align-middle">
                                                <a
                                                    href="javascript:;"
                                                    class="text-secondary font-weight-bold text-xs"
                                                    data-toggle="tooltip"
                                                    data-original-title="Edit user">
                                                    Edit
                                                </a>
                                            </td>
                                        </tr>
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
                                    <select name="workout" class="form-control form-control-lg">
                                        <option value="walking">Walking</option>
                                        <option value="running">Running</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <input type="number" name="steps" class='form-control form-control-lg' placeholder='Number of steps taken'>
                                </div>
                                <div class="mb-3">
                                    <input type="number" name='distance' class="form-control form-control-lg" placeholder="Distance (km)">
                                </div>
                                <div class="mb-3">
                                    <input type="number" name="duration" class="form-control form-control-lg" placeholder="Duration (hours)">
                                </div>
                                <div class="mb-3">
                                    <input type="number" name="heartrate" class="form-control form-control-lg" placeholder="Heart-Rate (bps)">
                                </div>
                                <div class="text-center">
                                    <button type="button" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Sign in</button>
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
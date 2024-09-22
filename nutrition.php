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
                            <h4 class="font-weight-bolder">Logged Nutrition</h4>
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
                                                Meal Name
                                            </th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Calories
                                            </th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Protein
                                            </th>
                                            <th
                                                class="text-center text-uppercase text-xxs font-weight-bolder opacity-7">
                                                Carborhydrate
                                            </th>
                                            <th
                                                class="text-center text-uppercase text-xxs font-weight-bolder opacity-7">
                                                Fats
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $select_nutrition_logs = "SELECT * FROM nutrition_logs WHERE user_id='$user_id'";
                                        $query_nutrition_logs = mysqli_query($con, $select_nutrition_logs);
                                        while ($get_nutrition_logs = mysqli_fetch_assoc($query_nutrition_logs)) :
                                        ?>
                                            <tr>
                                                <td>
                                                    <span
                                                        class="text-secondary text-xs font-weight-bold"><?= date('d/m/Y - h:i A', strtotime($get_nutrition_logs["datetime"])) ?></span>
                                                </td>
                                                <td>
                                                    <p
                                                        class="text-xs text-center font-weight-bold mb-0">
                                                        <?= ucfirst($get_nutrition_logs["food_name"]) ?>
                                                    </p>
                                                </td>
                                                <td
                                                    class="align-middle text-center text-sm">
                                                    <?= $get_nutrition_logs["calories"] ?> kcal
                                                </td>
                                                <td
                                                    class="align-middle text-center">
                                                    <?= $get_nutrition_logs["protein"] ?> g
                                                </td>
                                                <td
                                                    class="align-middle text-center">
                                                    <?= $get_nutrition_logs["carbohydrate"] ?> g
                                                </td>
                                                <td
                                                    class="align-middle text-center">
                                                    <?= $get_nutrition_logs["fats"] ?> g
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
                            <h4 class="font-weight-bolder">Log Nutrition</h4>
                        </div>
                        <div class="card-body">
                            <form role="form" action='' method='post'>
                                <div class="mb-3">
                                    <input type="text" name='food_name' class="form-control form-control-lg" placeholder='Name of Meal' required>
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-6">
                                            <input type="number" step="any" name="calories" class='form-control form-control-lg' placeholder='Calories (kcal)' required>
                                        </div>
                                        <div class="col-6">
                                            <input type="number" step="any" name="protein" class='form-control form-control-lg' placeholder='Protein (g)' required>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-6">
                                            <input type="number" step="any" name="carbohydrate" class='form-control form-control-lg' placeholder='Carbohydrate (g)' required>
                                        </div>
                                        <div class="col-6">
                                            <input type="number" step="any" name="fats" class='form-control form-control-lg' placeholder='Fats' required>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="Submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Log Nutrition</button>
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

<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\Weather $model */
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;


?>


<section class="vh-100" style="background-color: #4B515D;">
    <div class="container py-5 h-100">

        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-8 col-lg-6 col-xl-4">

                <div class="card" style="color: #4B515D; border-radius: 35px;">
                    <div class="card-body p-4">

                        <div class="d-flex">
                            <h6 class="flex-grow-1"><?php print_r(  $model->timezone) ?></h6>
                            <h6><?php print_r(date("h:i:sa")) ?></h6>
                        </div>
                        <div>
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-weather/ilu1.webp"
                                 width="100px">
                        </div>
                        <div class="d-flex flex-column text-center mt-5 mb-4">
                            <h6 class="display-4 mb-0 font-weight-bold" style="color: #1C2331;"> <?php print_r($model->temp) ?>°C </h6>
                            <span class="small" style="color: #868B94"><?php  print_r(  $model->weatherDescription) ?></span>
                        </div>



                    </div>
                </div>

            </div>
        </div>

    </div>
</section>
<?php







































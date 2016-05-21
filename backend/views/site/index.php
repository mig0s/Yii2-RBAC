<?php

use yii\helpers\Html;
use common\models\PermissionHelpers;

/**
 * @var yii\web\View $this
 */

$this->title = 'Admin Yii 2 Start';

if (!Yii::$app->user->isGuest){

    $is_admin = PermissionHelpers::requireMinimumRole('Admin');

}

?>

<div class="site-index">

    <div class="jumbotron">

        <h1>Welcome to Admin!</h1>

        <p class="lead">

            Now you can manage users, roles, and more with
            our easy tools.

        </p>

        <p>

            <?php

            if (!Yii::$app->user->isGuest && $is_admin) {

                echo Html::a('Manage Users', ['user/index'], ['class' => 'btn btn-lg btn-success']);

            }

            ?>

        </p>

    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">

                <h2>Users</h2>

                <p>

                    This is the place to manage users.  You can edit status and roles from here.
                    The UI is easy to use and intuitive, just click the link below to get started.

                </p>

                <p>

                    <?php

                    if (!Yii::$app->user->isGuest && $is_admin) {

                        echo Html::a('Manage Users', ['user/index'], ['class' => 'btn btn-default']);

                    }

                    ?>

                </p>

            </div>
            <div class="col-lg-4">

                <h2>Roles</h2>

                <p>

                    This is where you manage Roles.  You can decide who is admin and who is not.  You can
                    add a new role if you like, just click the link below to get started.

                </p>

                <p>

                    <?php

                    if (!Yii::$app->user->isGuest && $is_admin) {

                        echo Html::a('Manage Roles', ['role/index'], ['class' => 'btn btn-default']);

                    }

                    ?>

                </p>

            </div>
            <div class="col-lg-4">

                <h2>Profiles</h2>

                <p>

                    Need to review Profiles?  This is the place to get it done.
                    These are easy to manage via UI. Just click the link below to manage profiles.

                </p>

                <p>

                    <?php

                    if (!Yii::$app->user->isGuest && $is_admin) {

                        echo Html::a('Manage Profiles', ['profile/index'], ['class' => 'btn btn-default']);

                    }

                    ?>

                </p>

            </div>
        </div>

        <div class="row">
            <div class="col-lg-4">

                <h2>User Types</h2>

                <p>

                    This is the place to manage user types.  You can edit user
                    types from here. The UI is easy to use and intuitive, just
                    click the link  below to get started.

                </p>

                <p>

                    <?php

                    if (!Yii::$app->user->isGuest && $is_admin) {

                        echo Html::a('Manage User Types', ['user-type/index'], ['class' => 'btn btn-default']);

                    }

                    ?>

                </p>

            </div>
            <div class="col-lg-4">

                <h2>Statuses</h2>

                <p>

                    This is where you manage Statuses.  You can add or delete.
                    You can add a new status if you like, just click the link
                    below to get started.

                </p>

                <p>

                    <?php

                    if (!Yii::$app->user->isGuest && $is_admin) {

                        echo Html::a('Manage Statuses', ['status/index'], ['class' => 'btn btn-default']);

                    }

                    ?>

                </p>

            </div>
            <div class="col-lg-4">

                <h2>Placeholder</h2>

                <p>

                    Need to review Profiles?  This is the place to get it done.
                    These are easy to manage via UI.  Just click the link below
                    to manage profiles.

                </p>

                <p>

                    <?php

                    if (!Yii::$app->user->isGuest && $is_admin) {

                        echo Html::a('Manage Profiles', ['profile/index'], ['class' => 'btn btn-default']);

                    }

                    ?>

                </p>

            </div>
        </div>
    </div>
</div>
<?php

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\models\PermissionHelpers;
use backend\assets\FontAwesomeAsset;

/**
 * @var \yii\web\View $this
 * @var string $content
 */

AppAsset::register($this);
FontAwesomeAsset::register($this);

?>

<?php $this->beginPage() ?>

    <!DOCTYPE html>

    <html lang="<?= Yii::$app->language ?>">

    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>

        <meta name="viewport"
              content="width=device-width,
initial-scale=1">

        <?= Html::csrfMetaTags() ?>

        <title><?= Html::encode($this->title) ?></title>

        <?php $this->head() ?>

    </head>

    <body>
    <?php $this->beginBody() ?>

    <div class="wrap">


        <?php

        if (!Yii::$app->user->isGuest){

            $is_admin = PermissionHelpers::requireMinimumRole('Admin');

            NavBar::begin([

                'brandLabel' => 'Yii 2 Build <i class="fa fa-plug"></i> Admin',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);

        } else {

            NavBar::begin([

                'brandLabel' => 'Yii 2 Build <i class="fa fa-plug"></i>',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);



            $menuItems = [
                ['label' => 'Home', 'url' => ['site/index']],
            ];
        }

        if (!Yii::$app->user->isGuest && $is_admin) {

            $menuItems[] = [
                'label' => 'Users', 'items' => [
                    ['label' => 'Users', 'url' => ['user/index']],
                    ['label' => 'Profiles', 'url' => ['profile/index']],
//                  ['label' => 'Something else here', 'url' => ['#']],
                ],
            ];
            $menuItems[] = [
                'label' => 'RBAC', 'items' => [
                    ['label' => 'Roles', 'url' => ['role/index']],
                    ['label' => 'User Types', 'url' => ['user-type/index']],
                    ['label' => 'Statuses', 'url' => ['status/index']],
                ],
            ];
//          $menuItems[] = [
//              'label' => 'Content', 'items' => [
//                    ['label' => 'Content', 'url' => ['content/index']],
//                    ['label' => 'Status Messages', 'url' => ['status-message/index']],
//                    ['label' => 'FAQ', 'url' => ['faq/index']],
//                    ['label' => 'FAQ Category', 'url' => ['faq-category/index']],
//                ],
//          ];
//          $menuItems[] = [
//              'label' => 'Support', 'items' => [
//                  ['label' => 'Support Requests', 'url' => ['content/index']],
//                  ['label' => 'Status Messages', 'url' => ['status-message/index']],
//                  ['label' => 'FAQ', 'url' => ['faq/index']],
//                  ['label' => 'FAQ Categories', 'url' => ['faq-category/index']],
//              ],
//          ];
        }

        if (Yii::$app->user->isGuest) {

            $menuItems[] = ['label' => 'Login', 'url' => ['site/login']];

        } else {

            $menuItems[] = ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                'url' => ['/site/logout'],
                'linkOptions' => ['data-method' => 'post']
            ];

        }

        echo Nav::widget([

            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => $menuItems,

        ]);

        NavBar::end();

        ?>


        <div class="container">

            <?= Breadcrumbs::widget([

                'links' => isset($this->params['breadcrumbs']) ?
                    $this->params['breadcrumbs'] : [],

            ])?>

            <?= $content ?>

        </div>
    </div>

    <footer class="footer">

        <div class="container">

            <p class="pull-left">&copy; Yii 2 Build <?= date('Y') ?></p>

            <p class="pull-right"><?= Yii::powered() ?></p>

        </div>

    </footer>

    <?php $this->endBody() ?>

    </body>
    </html>

<?php $this->endPage() ?>
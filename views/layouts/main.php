<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
//SEGUE LA FUNZIONE PER DETERMINARE IL PERCORSO DELLA HOMEPAGE E APPLICARE UNA DETERMINATA CLASSE
 $actualRoute = Yii::$app->controller->getRoute();
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>

    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

</head>
<body>
<?php $this->beginBody() ?>


<header class="header">
  <div class="site-brand container">
    <h1>
      <a href="<?php echo Yii::$app->homeUrl;?>">
      </a>
      <img src="images/9gag.png" alt="<?php echo Yii::$app->name;  ?>">
    </h1>

  </div>



<div class="site-container">
  <?php

  NavBar::begin(['options' => ['class' => 'navbar']]

  );

  echo Nav::widget([
      'options' => ['class' => 'nav nav-justified'],
      'items' => [
          ['label' => 'La Home', 'url' => ['/site/index'], 'options' => ['class' => 'nav-item']],
          ['label' => 'About', 'url' => ['/site/about'], 'options' => ['class' => 'nav-item'] ],
          ['label' => 'Contact', 'url' => ['/site/contact'], 'options' => ['class' => 'nav-item']],
          Yii::$app->user->isGuest ? (
              ['label' => 'Login', 'url' => ['/site/login'], 'options' => ['class' => 'nav-item']]
          ) : (
              '<li>'
              . Html::beginForm(['/site/logout'], 'post')
              . Html::submitButton(
                  'Logout (' . Yii::$app->user->identity->username . ')',
                  ['class' => 'btn btn-link logout']
              )
              . Html::endForm()
              . '</li>'
          )
      ],
  ]);

  NavBar::end();
  ?>
</div>

</header>

    <!-- LE ISTRUZIONI PER CAPIRE SE SIAMO IN UNA DETERMINATA PAGINA-->

    <?php  if($actualRoute=='site/index'): ?>
      <div class="fluid-container">
      <?php else: ?>
    <div class="container">
    <?php endif; ?>
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>
<!--<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>-->
<?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage() ?>

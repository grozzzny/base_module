<? $this->title = Yii::t('gr', 'Edit');?>

<?= $this->render('_menu', ['current_model' => $current_model]) ?>

<?= $this->render('_submenu', ['current_model' => $current_model]) ?>

<?= $this->render($current_model::SLUG.'/_form', ['current_model' => $current_model]) ?>

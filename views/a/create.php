<? $this->title = Yii::t('gr', 'Create');?>

<?= $this->render('_menu', ['current_model' => $current_model]) ?>

<?= $this->render($current_model::SLUG.'/_form', ['current_model' => $current_model]) ?>
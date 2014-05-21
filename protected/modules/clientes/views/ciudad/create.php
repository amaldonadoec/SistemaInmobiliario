<?php
/** @var CiudadController $this */
/** @var Ciudad $model */
$this->menu=array(
    //array('label' => Yii::t('AweCrud.app', 'List') . ' ' . Ciudad::label(2), 'icon' => 'list', 'url' => array('index')),
    array('label' => "<div>" . CHtml::image(Yii::app()->baseUrl . "/images/topbar/administrar.png") . "</div>" .  Yii::t('AweCrud.app', 'Manage'), 'url' => array('admin')),
    array('label' => "<div>" . CHtml::image(Yii::app()->baseUrl . "/images/topbar/nuevo.png") . "</div>" .  Yii::t('AweCrud.app', 'Create'), 'itemOptions'=>array('class'=>'active')),
);
?>
<fieldset>
    <legend><?php echo Yii::t('AweCrud.app', 'Create') . ' ' . Ciudad::label(); ?></legend>
    <?php echo $this->renderPartial('_form', array('model' => $model)); ?>
</fieldset>
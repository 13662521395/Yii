<?php  
use yii\helpers\Html;  
use yii\helpers\Url;
use yii\widgets\LinkPager;  
use yii\widgets\ActiveForm;

  
$this->title = 'country';  
$this->params['breadcrumbs'][] = $this->title;  
?> 
<div class="box">
    <div class="box-title c"><h1><i class="fa fa-table"></i>Country</h1></div><!--box-title end-->
    <div class="box-content">
     <div class="box-search">
     

     <div class="country-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <table class="table">
    <tr>
        <th><?= $form->field($searchModel, 'code') ?></th>
        <th><?= $form->field($searchModel, 'name') ?></th>
        <th><?= $form->field($searchModel, 'population') ?></th>
        <th> <?= $form->field($searchModel, 'chinesename') ?></th>
    </tr>
   
    </table>
 
    

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<div class="box-table">
<p>
    <?= Html::a('新建国家', ['update','id' => ""], ['class' => 'btn btn-success']) ?>
</p>
<table class="table">
    <thead>
        <tr>
            <th class="check"><input id="j-checkall" class="input-check" type="checkbox"></th>
            <th class="list-id">序号</th>
            <th><?php echo $model->getAttributeLabel('code');?></th>
            <th><?php echo $model->getAttributeLabel('name');?></th>
            <th><?php echo $model->getAttributeLabel('population');?></th>
            <th><?php echo $model->getAttributeLabel('chinesename');?></th>
    
        </tr>
    </thead>
    <tbody>
<?php

$index = 1;
 foreach($countrys as $v){ ?>
                    <tr>
                        <td class="check check-item"><input class="input-check" type="checkbox" value="<?php echo Html::encode($v->code); ?>"></td>
                        <td><span class="num num-1"><?php echo $index ?></span></td>
                        <td><?php echo $v->code; ?></td>
                        <td><?php echo $v->name; ?></td>
                        <td><?php echo $v->population; ?></td>
                        <td><?php echo $v->chinesename; ?></a></td>
                        <td >
                            
                            <a href= "<?= Url::to([ 'update', 'id'=>$v->code]); ?>" >编辑 </a >
                            <?= Html::a('删除', ['delete', 'id' => $v->code], [
                                'class'=>'text',
                                'data' => [
                                    'confirm' => 'Are you sure you want to delete this item?',
                                    'method' => 'post',
                                ],
                            ]) ?>
                            
                        </td >                     
                    </tr>
<?php $index++; } ?>
                </tbody>
            </table>
        </div><!--box-table end-->
        
        <?= LinkPager::widget(['pagination' => $pagination]) ?> 
    </div><!--box-content end-->
</div><!--box end-->
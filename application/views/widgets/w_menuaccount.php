<div class="row tab-v3">
    <h3>Личный Кабинет</h3> 
    
<ul class="nav nav-pills nav-stacked">
<?foreach ($menu as $name => $menu):?>
<?if(in_array($select, $menu)):?>
<li class="active"><?=Html::anchor('account/'. $menu[0], $name, array())?></li>
<?else:?>
<li><?=Html::anchor('account/'. $menu[0], $name)?></li>
<?endif?>
<?endforeach?>



</ul>
    <br />
   <?=Html::anchor('logout', 'Выход',array(
    'class' => 'btn btn-warning',
))?>

</div>
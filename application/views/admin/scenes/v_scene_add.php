<?if($errors):?>
<?foreach ($errors as $error):?>
<div class="error"><?=$error?></div>
<?endforeach?>
<?endif?>

<h2>Вернуться в <?=HTML::anchor('admin/scenes/list/'.$place->id, $place->title)?></h2>
     
<div class="TTWForm-container">
       <?=Form::open('admin/scenes/add/'.$id, array(
           'enctype' => 'multipart/form-data',
           'class' => 'TTWForm ui-sortable-disabled',
           'style' => 'width: 700px'));?>
       
           
           
          <div id="field1-container" class="field f_100">
                <?=Form::label('title', 'Название')?>
               <?=Form::input('title', $data['title'], array('size' => 100, 'required' => 'required'))?>
          </div>
           
           
           
           
          <div id="field8-container" class="field f_100">
             
              
              <h2>Площадка: <?=$place->title?></h2>
              <?=Form::hidden('place_id', $place->id)?>

          </div>
           
           
          <div id="form-submit" class="field f_100 clearfix submit">
              <?=Form::submit('submit', 'Сохранить')?>
          </div>
     <?=Form::close()?>
</div>
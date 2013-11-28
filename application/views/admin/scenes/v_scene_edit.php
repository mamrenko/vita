<?if($errors):?>
<?foreach ($errors as $error):?>
<div class="error"><?=$error?></div>
<?endforeach?>
<?endif?>
<h2><?=$scene->place->title?></h2>
<h2>Вернуться на <?=html::anchor('admin/scenes/list/'. $scene->place->id, $scene->place->title)?></h2>

<div class="TTWForm-container">
       <?=Form::open('admin/scenes/edit/'.$id, array(
           'enctype' => 'multipart/form-data',
           'class' => 'TTWForm ui-sortable-disabled',
           'style' => 'width: 700px'));?>
       
           
           
          <div id="field1-container" class="field f_100">
                <?=Form::label('title', 'Название')?>
               <?=Form::input('title', $data['title'], array('size' => 100, 'required' => 'required'))?>
          </div>
           
           
           
           
          <div id="field8-container" class="field f_100">
              <?=Form::label('pl', 'Площадка')?>
              <br />
              <h2><?=$scene->place->title?></h2>
              <?=Form::hidden('place_id', $scene->place->id)?>

          </div>
           
     <div id="field33-container" class="field f_100 ui-resizable-disabled ui-state-disabled">
                    <?=HTML::image('media/uploads/scenes/'.'small_'.$scene->image)?>
            <br/>
              
                     <?=Form::label('image', 'Загрузить изображение:')?>
                     <?=Form::file('image', array('id' => 'multi'))?>
            </div>
           
          <div id="form-submit" class="field f_100 clearfix submit">
              <?=Form::submit('submit', 'Сохранить')?>
          </div>
     <?=Form::close()?>
</div>

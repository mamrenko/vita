<?if($errors):?>
<?foreach ($errors as $error):?>
<div class="error"><?=$error?></div>
<?endforeach?>
<?endif?>

<h1><?=$playbill->title?></h1>
<h2>Вернуться на <?=html::anchor('admin/playplaces/list/'. $playbill->place_id, $playbill->place->title)?></h2>

<div class="TTWForm-container">
       <?=Form::open('admin/playplaces/add/'.$id, array('class' => 'TTWForm ui-sortable-disabled', 'style' => 'width: 700px'));?>
       
           
           
          <div id="field1-container" class="field f_100">
                <?=Form::label('title', 'Название')?>
               <?=Form::input('title', $data['title'], array('size' => 100, 'required' => 'required'))?>
          </div>
           
           
          <div id="field3-container" class="field f_100">
                <?=Form::label('description', 'Описание')?>
              <?=Form::textarea('description', $data['description'], array('cols' => 20, 'rows' => 5, 'id' => 'editor', 'required' => 'required'))?>
           <script type="text/javascript">
                    CKEDITOR.replace( 'editor' );
               </script>
          </div>
           
           
          <div id="field4-container" class="field f_100">
                <?=Form::label('meta_keywords', 'Ключевые слова для Сео оптимизации')?>
               <?=Form::input('meta_keywords', $data['meta_keywords'], array('size' => 100, 'required' => 'required'))?>
          </div>
           
           
          <div id="field5-container" class="field f_100">
               <?=Form::label('meta_description', 'Описание страницы')?>
               <?=Form::input('meta_description', $data['meta_description'], array('size' => 100, 'required' => 'required'))?>
               
          </div>
           
           
          <div id="field6-container" class="field f_100">
               <?=Form::label('start', 'Начало мероприятия')?>
              <br />
              <?=Form::select('start', $start, $data['start'],array())?>
              
               
          </div>
           
           
          <div id="field8-container" class="field f_100">
              <?=Form::label('pl', 'Площадка')?>
              <br />
              <h2><?=$playbill->place->title?></h2>
              <?=Form::hidden('place_id', $playbill->place->id)?>

          </div>
           
           
          <div id="form-submit" class="field f_100 clearfix submit">
              <?=Form::submit('submit', 'Сохранить')?>
          </div>
     <?=Form::close()?>
</div>
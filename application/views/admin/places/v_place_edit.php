<?if($errors):?>
<?foreach ($errors as $error):?>
<div class="error"><?=$error?></div>
<?endforeach?>
<?endif?>


  <div class="TTWForm-container">
      
      <?=Form::open('admin/places/edit/'. $id, array('class' => 'TTWForm ui-sortable-disabled', 'style' => 'width: 700px'));?>
    
           
           
          <div id="field1-container" class="field f_100 ui-resizable-disabled ui-state-disabled">
               <?=Form::label('title', 'Название')?>
               <?=Form::input('title', $data['title'], array('size' => 100))?>
          </div>
           
           
          <div id="field2-container" class="field f_100 ui-resizable-disabled ui-state-disabled">
              <?=Form::label('adress', 'Адрес площадки')?>
               <?=Form::input('adress', $data['adress'], array('size' => 100))?>
          </div>
           
           
          <div id="field3-container" class="field f_100 ui-resizable-disabled ui-state-disabled">
               <?=Form::label('description', 'Описание')?>
              <?=Form::textarea('description', $data['description'], array('cols' => 20, 'rows' => 5, 'id' => 'editor'))?>
              
                <script type="text/javascript">
                    CKEDITOR.replace( 'editor' );
               </script>
          </div>
           
           
          <div id="form-submit" class="field f_100 clearfix submit">
              <?=Form::submit('submit', 'Сохранить')?>
          </div>
   <?=Form::close()?>
</div> 

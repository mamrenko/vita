<br/>
<?if($errors):?>
<?foreach ($errors as $error):?>
<div class="error"><?=$error?></div>
<?endforeach?>
<?endif?>


  <div class="TTWForm-container">
      
      <?=Form::open('admin/news/edit/'. $id, array('class' => 'TTWForm ui-sortable-disabled', 'style' => 'width: 400px'));?>
    
           
           
          <div id="field1-container" class="field f_100 ui-resizable-disabled ui-state-disabled">
               <?=Form::label('title', 'Название')?>
               <?=Form::input('title', $data['title'], array('size' => 100))?>
          </div>
           
           
          <div id="field2-container" class="field f_100 ui-resizable-disabled ui-state-disabled">
              <?=Form::label('date', 'Дата')?>
               <?=Form::input('date', $data['date'], array('size' => 100))?>
          </div>
           
           
          <div id="field3-container" class="field f_100 ui-resizable-disabled ui-state-disabled">
               <?=Form::label('content', 'Основной текст')?>
              <?=Form::textarea('content', $data['content'], array('cols' => 20, 'rows' => 5))?>
               
          </div>
           
           
          <div id="form-submit" class="field f_100 clearfix submit">
              <?=Form::submit('submit', 'Сохранить')?>
          </div>
   <?=Form::close()?>
</div> 
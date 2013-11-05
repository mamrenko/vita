<?if($errors):?>
<?foreach ($errors as $error):?>
<div class="error"><?=$error?></div>
<?endforeach?>
<?endif?>


  <div class="TTWForm-container">
      
      <?=Form::open('admin/areas/edit/'. $id, array('
          class' => 'TTWForm ui-sortable-disabled',
          'style' => 'width: 700px'));?>
    
           
           
          <div id="field1-container" class="field f_100 ui-resizable-disabled ui-state-disabled">
               <?=Form::label('title', 'Название')?>
               <?=Form::input('title', $data['title'], array('size' => 100))?>
          </div>
           
           
          <div id="form-submit" class="field f_100 clearfix submit">
              <?=Form::submit('submit', 'Сохранить')?>
          </div>
   <?=Form::close()?>
</div> 

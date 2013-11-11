<?if($errors):?>
<?foreach ($errors as $error):?>
<div class="error"><?=$error?></div>
<?endforeach?>
<?endif?>
<br />
<p>
  
      <?=HTML::anchor('admin/starts', HTML::image('media/images/goback.png'))?>
      <?=HTML::anchor('admin/starts', 'Вернуться')?>
</p>

  <div class="TTWForm-container">
      
      <?=Form::open('admin/starts/add', array('
          class' => 'TTWForm ui-sortable-disabled',
          'style' => 'width: 700px'));?>
    
           
           
          <div id="field1-container" class="field f_100 ui-resizable-disabled ui-state-disabled">
               <?=Form::label('start', 'Начало Мероприятий Такого Вида 11:30')?>
               <?=Form::input('start', $data['start'], array('size' => 100))?>
          </div>
           
           
          <div id="form-submit" class="field f_100 clearfix submit">
              <?=Form::submit('submit', 'Сохранить')?>
          </div>
   <?=Form::close()?>
</div> 


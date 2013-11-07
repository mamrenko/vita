<?if($errors):?>
<?foreach ($errors as $error):?>
<div class="error"><?=$error?></div>
<?endforeach?>
<?endif?>
 <br />
<p>
  
      <?=HTML::anchor('admin/playbill/edit/'.$playbill->id, HTML::image('media/images/goback.png'))?>
      <?=HTML::anchor('admin/playbill/edit/'.$playbill->id, 'Вернуться')?>
</p>

 <h2><?=$playbill->title?></h2>
 <h2><?=$playbill->scene->title?></h2>
 <h2><?=$playbill->place->title?></h2>
 
 
 <div class="TTWForm-container">
      
      <?=Form::open('admin/events/add/'.$playbill->id, array(
          'class' => 'TTWForm ui-sortable-disabled',
          'style' => 'width: 700px'));?>
    
           
           <div id="field2-container" class="field f_100 ui-resizable-disabled ui-state-disabled">
            
             
              <?=Form::label('day', 'Дата')?>:
              <br/><?=Form::input('day', $data['day'], array('size' => 20, 'id' => 'datepicker' ))?>
          </div>
     
          <div id="field6-container" class="field f_100">
              <?=Form::label('cat', 'Выбрать Категории')?>: 
              <br />
              <?=Form::label('cat', 'Категории')?>: <br/><br/><?=Form::select('cat[]', $cats, $data['cat'], array('multiple' => 'multiple', 'size' => 10))?><br/><br/>
              
               
          </div>
           
           
          <div id="field2-container" class="field f_100 ui-resizable-disabled ui-state-disabled">
              <?=Form::label('status', 'Показывать на главной')?>:
              <br/><br/><?=Form::checkbox('status', 1, (bool) $data['status'])?> Активен
          </div>
      
            <div id="field8-container" class="field f_100">
              
              <?=Form::hidden('playbill_id', $playbill->id)?>
            </div>
           <div id="field9-container" class="field f_100">
              
              <?=Form::hidden('place_id', $playbill->place_id)?>
            </div>
           <div id="field10-container" class="field f_100">
              
              <?=Form::hidden('scene_id', $playbill->scene_id)?>
            </div>
          
           
           
          <div id="form-submit" class="field f_100 clearfix submit">
              <?=Form::submit('submit', 'Сохранить')?>
          </div>
   <?=Form::close()?>
   

</div> 

 <?if(count($events) > 0):?> 
<table id="tfhover" class="tftable" border="1">
<tr>
  
    
    <th>Дата</th>
    <th>На Главной</th>
    
</tr> 
 <?foreach ($events as $event):?>
<tr>
    <td>
          <?=$event->day?>
    </td>


    
    <td>
       <?=$event->status?>
    </td>
     
</tr>
   <? endforeach; ?> 

</table>
<?else:?>
   
         <?endif?>
<br />
<br />
<?if($errors):?>
<?foreach ($errors as $error):?>
<div class="error"><?=$error?></div>
<?endforeach?>
<?endif?>
  <br />
<p>
  
      <?=HTML::anchor('admin/playbill/list/'.$playbill->place_id, HTML::image('media/images/goback.png'))?>
      <?=HTML::anchor('admin/playbill/list/'.$playbill->place_id, 'Вернуться')?>
</p>
 <h2><?=$playbill->title?></h2>
 <h2><?=$playbill->place->title?></h2>
  <div class="TTWForm-container">
      
      <?=Form::open('admin/costs/add/'.$id, array(
          'class' => 'TTWForm ui-sortable-disabled',
          'style' => 'width: 700px'));?>
    
           
           
          <div id="field6-container" class="field f_100">
               <?=Form::label('sector', 'Сектора')?>
              <br />
              <?=Form::select('sector', $aarea, $data['sector'],array())?>
              
               
          </div>
           
           
          <div id="field2-container" class="field f_100 ui-resizable-disabled ui-state-disabled">
              <?=Form::label('price', 'Цена')?>
               <?=Form::input('price', $data['price'], array('size' => 100))?>
          </div>
      
            <div id="field8-container" class="field f_100">
              
              <?=Form::hidden(' playbill_id', $playbill->id)?>
            </div>
           
          
           
           
          <div id="form-submit" class="field f_100 clearfix submit">
              <?=Form::submit('submit', 'Сохранить')?>
          </div>
   <?=Form::close()?>
       
    <h2>
       
    </h2>
    <h2>
    
    </h2>


</div> 
 
<?if(count($costs) > 0):?> 
<table id="tfhover" class="tftable" border="1">
<tr>
  
    
    <th>Сектор</th>
    <th>Цены</th>
    
</tr> 
 <?foreach ($costs as $cost):?>
<tr>
    <td>
          <?=$cost->area->title?>
    </td>


    
    <td>
       <?=$cost->price?>
    </td>
     
</tr>
   <? endforeach; ?> 

</table>
<?else:?>
   
         <?endif?>
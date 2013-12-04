<div class="row">
    <div class="col-md-6">
        <div class="portlet">



<div class="portlet-header">
    
   <?if($errors):?>

<?foreach ($errors as $error):?>
<ul class="portlet-tools pull-right">
								
                  <li>
                      <span style="font-size: 18px"><span class="label label-primary"><?=$error?></span>
                        </span>
		  </li>
		</ul>
<?endforeach?>
<?endif?> 
    
    
    
<?if(count($costs) > 0):?> 
 
<p>
   
      <?=HTML::anchor('admin/playbill/edit/'.$playbill->id, '<button class="btn btn-info" type="button"><i class="fa fa-reply"></i>  Вернуться</button>')?>
</p>
<?else:?>
   
      <?=HTML::anchor('admin/playbill/list/'.$playbill->place_id, '<button class="btn btn-info" type="button"><i class="fa fa-reply"></i>  Вернуться</button>')?>
         <?endif?>
  <h3>Добавление цен</h3>
 <h3><?=$playbill->title?></h3>
 <h3><?=$playbill->place->title?></h3>
 </div>
<div class="portlet-content">
  
      
      <?=Form::open('admin/costs/add/'.$id, array(
          'id' => 'validate-basic',
           'class' => 'form parsley-form',
           'data-validate' => 'parsley',
          ));?>
    
           
           
  
    
    
          <div class="form-group"> 
               <?=Form::label('sector', 'Сектора')?>
              <br />
              <?=Form::select('sector', $aarea, $data['sector'],array(
                  
                  'class' => 'form-control select2-input',
                  'data-required' => 'true',
                
                  
              ))?>
              
               
          </div>
           
           
          <div class="form-group"> 
              <?=Form::label('price', 'Цена')?>
               <?=Form::input('price', $data['price'], array(
                   'placeholder' => 'Минимум 4 символа, максимум 25',
                   'class' => 'form-control',
                   'data-required' => 'true',
                   'data-minlength' => '4',
                   'data-maxlength' => '25',
                   ))?>
          </div>
      
           <div class="form-group"> 
              
              <?=Form::hidden(' playbill_id', $playbill->id)?>
            </div>
           
          
           
           
          <div class="form-group">
                    
                      <?=Form::button('submit', 'Сохранить', array(
                          'type' => 'submit',
                          'class' => 'btn btn-primary',
                          ));?>
                    
                  </div>
   <?=Form::close()?>
   

</div> 
       </div>
</div>
    
 
<?if(count($costs) > 0):?> 
    <div class="col-md-6">
    <div class="portlet">
        <div class="portlet-header">
            <h3>Список цен</h3>
            <h3><?=$playbill->title?></h3>
            <h3><?=$playbill->place->title?></h3>
            
        </div>
        <div class="portlet-content">
<table class="table table-bordered table-highlight">
    <thead>
    <tr>


        <th>Сектор</th>
        <th>Цены</th>

    </tr> 
    </thead>
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
        </div></div>
        </div>
<?else:?>
   
         <?endif?>
 
    </div>

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
  <br />
<p>
  
      
      <?=HTML::anchor('admin/playbill/edit/'.$playbill->id, '<button class="btn btn-info" type="button"><i class="fa fa-reply"></i>  Вернуться</button>')?>
</p>
 <h2><?=$playbill->title?></h2>
 <h2><?=$playbill->place->title?></h2>
 </div>
  <div class="portlet-content">
      
      <?=Form::open('admin/costs/edit/'.$id, array(
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
     </div>
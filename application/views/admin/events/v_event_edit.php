<div class="row">
    <div class="col-md-7">
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
<span class="">
  
      
      <?=HTML::anchor('admin/events/', '<button class="btn btn-info" type="button"><i class="fa fa-reply"></i>  На список событий</button>')?>
</span>

 <h2><?=$playbill->title?> | <?=$playbill->scene->title?> | <?=$playbill->place->title?></h2>
 
 
 </div>
 <div class="portlet-content">
      
      <?=Form::open('admin/events/edit/'.$event->id, array(
          'id' => 'validate-basic',
           'class' => 'form parsley-form',
           'data-validate' => 'parsley',
          ));?>
    
           <div class="row">
         <div class="col-md-4">
     <h4>Выберите дату</h4>
                            <div id="dp-ex-3"
                                 class="input-group date" 
                                 data-auto-close="true" 
                                
                                 data-date-format="dd-mm-yyyy" 
                                 data-date-autoclose="true"
                                 >
                                <?=Form::input('day', $data['day'], array(
                                    'class' => 'form-control',
                                    'type' => 'text',
                                    'data-required' => 'true',
                                    
                                    
                  ))?>
                               
				<span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                            </div>
                            <span class="help-block">dd-mm-yyyy</span>
     
 
     
     </div>
         </div>
          
     <div class="row">
         <div class="col-md-8">
         <div class="form-group"> 
                  <?=Form::label('cat', 'Категории')?>:
              
             
               
              <?=Form::select('cat[]', $cats, $data['cat'], array(
           
                  'id' => 'e1',
                  'class' => 'form-control',
                   'multiple',
                  
                  ))?>
           
               
                  
                  
          </div>
         </div>
     </div>
           
          <div class="form-group">
              <?=Form::label('status', 'Показывать на главной')?>:
              <br/><br/><?=Form::checkbox('status', 1, (bool) $data['status'])?> Активен
          </div>
      
            <div class="form-group">
              
              <?=Form::hidden('playbill_id', $playbill->id)?>
            </div>
           <div class="form-group">
              
              <?=Form::hidden('place_id', $playbill->place_id)?>
            </div>
           <div class="form-group">
              
              <?=Form::hidden('scene_id', $playbill->scene_id)?>
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

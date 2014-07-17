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
 
<p>
  
      <?=HTML::anchor('admin/playbill/edit/'.$playbill->id.'#list', '<button class="btn btn-info" type="button"><i class="fa fa-reply"></i> Вернуться </button>')?>
     
</p>

 <h2><?=$playbill->title?> | <?=$playbill->scene->title?> | <?=$playbill->place->title?></h2>
 
 
 </div>
 <div class="portlet-content">
      
      <?=Form::open('admin/events/add/'.$playbill->id, array(
          'id' => 'validate-basic',
           'class' => 'form parsley-form',
           'data-validate' => 'parsley',
          ));?>
    
           
           
     <div class="row">
         <div class="col-md-4">
     <h4>Выберите дату, когда брали билеты</h4>
                                 <div id="dp-ex-3"
                                 class="input-group date" 
                                 data-auto-close="true" 
                                 data-date=<?=date('d-m-Y');?>
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
             <div class="form-group">
                  <?=Form::label('scene_id', 'Сцена')?>:
               <br />
               <?=Form::select('scene_id', 
                  $scene, $data['scene_id'],
                  array(
                     'class' => 'form-control select2-input', 
                  ))?>
                                 
                                 
             </div>
             <div class="form-group"> 
                         <?=Form::label('start', 'Начало мероприятия')?>
                        <br />
                        
                        
                         
                      
                        <?=Form::select('start', $start,'19:00',array(
                            'class' => 'form-control select2-input',
                          
                        )
                           , $data['start']     )?>

                        
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
                    
                      <?=Form::button('submit', 'Сохранить', array(
                          'type' => 'submit',
                          'class' => 'btn btn-primary',
                          ));?>
                    
                  </div>
   <?=Form::close()?>
      

</div> </div> </div> 
    

 <?if(count($events) > 0):?> 

    <div class="col-md-5">
        <div class="portlet">
            <div class="portlet-header">
                <h3>Список событий</h3>
            </div>
            <div class="portlet-content">
<table  id="placetb" class="table table-bordered table-highlight">
    <thead>
        
<tr>
  
    
    <th>Дата</th>
    <th>На Главной</th>
    <th>Жанры </th>
    
</tr>
    </thead>
 <?foreach ($events as $event):?>
<tr>
    <td>
          <?=date('d-m-Y',strtotime($event->day));?>
    </td>


    
    <td>
       
       <?if($event->status > 0):?> 
На Главной
<?else:?>
    Не показано на главной
         <?endif?>
     
    </td>
    <td>
        <?$categories = $event->categories->find_all();?> 
        <?foreach($categories as $cat):?>
         <p><?=$cat->title?></p>
         <?endforeach;?>
        
        
    </td>
</tr>
   <? endforeach; ?> 

</table>
<?else:?>
   
         <?endif?>
</div>
    </div>
    </div>
    </div>
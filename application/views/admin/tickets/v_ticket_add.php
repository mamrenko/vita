
<div class="row">
    <div class="col-md-3">
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
  
      <?=HTML::anchor('admin/tickets/list/'.$event->id, '<button class="btn btn-info" type="button"><i class="fa fa-reply"></i> Вернуться</button>')?>
      
</p>
 Билеты на событие
 <?=$event->playbill->place->title?> | 
 <?=$event->playbill->title?> | 
        <?=$event->playbill->starts->start?> |
  <?=$event->playbill->scene->title?> |
    <?=date('d-m-Y',strtotime($event->day));?>
</div>
  <div class="portlet-content">
      
      <?=Form::open('admin/tickets/add/'.$event->id, array(
           'id' => 'validate-basic',
           'class' => 'form parsley-form',
           'data-validate' => 'parsley',
          ));?>
      
                      
               <div class="form-group"> 
               
               <?=Form::label('sector', 'Сектор')?>:
                 <?=Form::select('sector', 
                  $sect, $data['sector'],
                  array(
                     'class' => 'form-control select2-input', 
                  ))?>
              

             </select>
               </div>
                    
               <div class="form-group"> 
               
               <?=Form::label('row', 'Ряд')?>:
              
                <?=Form::select('row', 
                  $rws, $data['row'],
                  array(
                     'class' => 'form-control select2-input', 
                  ))?>
               </div>
                    
           
    
           
               <div class="form-group"> 
               
               <?=Form::label('seat', 'Место')?>:
               <?=Form::select('seat', 
                  $rws, $data['seat'],
                  array(
                     'class' => 'form-control select2-input', 
                  ))?>
               </div>
                
                      
    
          <div class="form-group">
               <?=Form::label('cost', 'Цена Билета')?>
               <?=Form::input('cost', $data['cost'], array(
                   'type' =>'number',
                   'placeholder' => 'Минимум 4 -1000, максимум 6 - 100000',
                   'class' => 'form-control',
                   'data-required' => 'true',
                   'data-minlength' => '4',
                   'data-maxlength' => '6',
                   //'min' => '4',
                   //'max' => '6',
                  
                   ))?>
          </div>
           
            <div class="form-group">
              
              <?=Form::hidden('event_id', $event->id)?>
            </div>
          
          <div class="form-group">
                    
                      <?=Form::button('submit', 'Сохранить', array(
                          'type' => 'submit',
                          'class' => 'btn btn-primary',
                          ));?>
                    
                  </div>
   <?=Form::close()?>
</div> 
</div> </div> 

    <div class="col-md-6">
        <div class="portlet">
            <div class="portlet-header">
                Билеты на событие
 <?=$event->playbill->place->title?> | 
 <?=$event->playbill->title?> | 
        <?=$event->playbill->starts->start?> |
  <?=$event->playbill->scene->title?> |
    <?=date('d-m-Y',strtotime($event->day));?>
            </div>
            <div class="portlet-content">
                <?$tickets = $event->tickets->find_all();?> 
                <?if(count($tickets)> 0):?>
                <table id="placetb" class="table table-bordered table-highlightab">
                    <thead>
                        <tr>
                            <td>
                               Сектор 
                            </td>
                            <td>
                                Ряд
                            </td>
                            <td>
                                Место
                            </td>
                            <td>
                                Цена
                            </td>
                        </tr>
                        
                    </thead>
                    
                       <?foreach($tickets as $ticket):?> 
                    <tr>
                       
                            <td>
                               <?=$ticket->sector?> 
                            </td>
                            <td>
                               <?=$ticket->row?> 
                            </td>
                            <td>
                               <?=$ticket->seat?> 
                            </td>
                            <td>
                               <?=$ticket->cost?> 
                            </td>
                           
                        </tr>
                    
                     <?endforeach;?>
                    
                </table>
                <?else:?>
                
                <ul class="portlet-tools pull-left">
								
                <li>
                        <span class="label label-primary">Нет Билетов</span>
                </li>
                </ul>
                <?endif?>
                
                
            </div>
             </div>
         </div>
     </div>


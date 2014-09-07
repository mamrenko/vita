  <div class="row">
      <div class="col-md-4">
          <p>
  
      <?=HTML::anchor('admin/orders/orders/'.$taketicket->order->id, '<button class="btn btn-info" type="button"><i class="fa fa-reply"></i> Вернуться на заказ  '.$taketicket->customer->name.' </button>')?> 
         </p>
          <p>
  <?=HTML::anchor('admin/orders', '<button class="btn btn-success" type="button"><i class="fa fa-reply"></i> Вернуться на список покупателей </button>')?>
      
</p>
<p>
   
    
</p>
      <div class="portlet">
          <div class="portlet-header">
	<h3>
		<i class="fa fa-reorder"></i>
                Было заказано:
	</h3>
					
						</div>
          <div class="portlet-content">
              
              <ul class="icons-list">
	   <li>
           <i class="icon-li fa fa-cloud"></i>
           Площадка: <strong><?=$taketicket->order->place?> </strong>   
             </li>
            <li>
                <i class="icon-li fa fa-tasks"></i>
                Мероприятие:  <strong>
          <?=$taketicket->order->playbill?> 
                </strong>
           </li>
       <li>
                  <i class="icon-li fa fa-eye"></i>
                  Дата:   <strong><?=date('d-m-Y', strtotime($taketicket->order->dt))?>,  начало в  <?=$taketicket->order->tm?></strong>
              </li>
            <li>
                 <i class="icon-li fa fa-bell"></i>
                 Количество билетов: <strong><?=$taketicket->order->amt?> </strong>   
            </li>
               <li>
                  <i class="icon-li fa fa-heart"></i>
                      Качество билетов: <strong><?=$taketicket->order->cost?> </strong>   
                </li>
              </ul>

          </div>
      
      </div>
 

<div class="portlet">
          <div class="portlet-header">
	<h3>
		<i class="fa fa-reorder"></i>
                Кто Заказывал
	</h3>
					
						</div>
              <div class="portlet-content">
                  <ul>
                      <li>
                          <?=$taketicket->customer->name ?>
                      </li>
                      <li>
                          <?=$taketicket->customer->adress ?>
                      </li>
                       <li>
                          <?=$taketicket->customer->email ?>
                      </li>
                      <li>
                          <?=$taketicket->customer->phone ?>
                      </li>                      
                  </ul>
                  
                  
              </div>
          
      </div>
 </div>
      <?if(count($college_arr) >0 ):?>
      <div class="col-md-8">
         
          <div class="portlet">
          <div class="portlet-header">
              <?if($errors):?>
<?foreach ($errors as $error):?>
              <dl>
								
                  <dt>
                      <span style="font-size: 18px"><span class="label label-primary"><?=$error?></span>
                        </span>
		  </dt>
		</dl>
<?endforeach?>
<?endif?>
              
	<h3>
		<i class="fa fa-reorder"></i>
                У кого билеты брали и какие
	</h3>
					
						</div>
              <div class="portlet-content">
                  
                   <?=Form::open('admin/orders/ticket_edit/'.$taketicket->id, array(
         'id' => 'validate-basic',
           'class' => 'form parsley-form',
           'data-validate' => 'parsley',
          ));?>
   
           <div class="form-group"> 
                  <?=Form::label('college', 'Коллеги у которых брали билеты')?>:
              
             
               
              <?=Form::select('college[]', $college_arr, $data['college'], array(
           
                  'id' => 'colleges',
                  'class' => 'form-control',
                   'multiple',
                  'data-required' => 'true',
                  
                  ))?>
           
               
                  
                  
          </div>
                  
                   <div class="row">
         <div class="col-md-4 ">
     <h4>Выберите дату, когда брали билеты</h4>
    
     <div id="dp-ex-4" class="input-group date"
          data-auto-close="true"
          data-date="<?=date('d-m-Y');?>" 
          data-date-format="dd-mm-yyyy"
          data-date-autoclose="true">
                                <?=Form::input('dmy', $data['dmy'], array(
                                    'class' => 'form-control',
                                    'type' => 'text',
                                    'data-required' => 'true',
                                   
                                    
                  ))?>
								<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            </div>
                            <span class="help-block">dd-mm-yyyy</span>
                        </div>
          </div>                   
                               
				
                            </div>
                            
     
                      
        
         
         </div>
           
           <div class="form-group">
               <?=Form::label('comment', 'Дополнение, Комментарии Какие билеты и почем')?>
               <?=Form::textarea('comment', $data['comment'], array(
                   'type' =>'text',
                   'placeholder' => 'Минимум 10 букв, максимум 600',
                   'class' => 'form-control',
                   'data-required' => 'true',
                   'data-minlength' => '10',
                   'data-maxlength' => '600',
                   ))?>
          </div>
           <?=Form::hidden('customer_id', $taketicket->customer->id)?>
            <?=Form::hidden('order_id', $taketicket->order->id)?>
           
               <div class="form-group">
                    
                      <?=Form::button('submit', 'Сохранить', array(
                          'type' => 'submit',
                          'class' => 'btn btn-primary',
                          ));?>
                    
                  </div>
   <?=Form::close()?> 
                  
              </div>
          
      </div>
      
  </div><?else:?>
      <div class="col-md-8">
          
          <p>Нужно добавить сначала того, у кого билеты брали</p>
          <?=HTML::anchor('admin/colleges', '<button class="btn btn-info" type="button"><i class="fa fa-reply"></i> Добавить Коллегу </button>')?>
      </div>
      <?
endif;?>
       </div>



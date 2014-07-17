  <div class="row">
      <div class="col-md-4">
          <p>
  
      <?=HTML::anchor('admin/orders/orders/'.$order->custom_id, '<button class="btn btn-info" type="button"><i class="fa fa-reply"></i> Вернуться на заказ  '.$customer->name.' </button>')?> 
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
           Площадка: <strong><?=$order->place?> </strong>   
             </li>
            <li>
                <i class="icon-li fa fa-tasks"></i>
                Мероприятие:  <strong>
          <?=$order->playbill?> 
                </strong>
           </li>
       <li>
                  <i class="icon-li fa fa-eye"></i>
                  Дата:   <strong><?=date('d-m-Y', strtotime($order->dt))?>,  начало в  <?=$order->tm?></strong>
              </li>
            <li>
                 <i class="icon-li fa fa-bell"></i>
                 Количество билетов: <strong><?=$order->amt?> </strong>   
            </li>
               <li>
                  <i class="icon-li fa fa-heart"></i>
                      Качество билетов: <strong><?=$order->cost?> </strong>   
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
                          <?=$customer->name ?>
                      </li>
                      <li>
                          <?=$customer->adress ?>
                      </li>
                       <li>
                          <?=$customer->email ?>
                      </li>
                      <li>
                          <?=$customer->phone ?>
                      </li>                      
                  </ul>
                  
                  
              </div>
          
      </div>
 </div>
      <div class="col-md-8">
          
          <div class="portlet">
          <div class="portlet-header">
	<h3>
		<i class="fa fa-reorder"></i>
                У кого билеты брали и какие
	</h3>
					
						</div>
              <div class="portlet-content">
                  
                   <?=Form::open('admin/orders/ticket_add', array(
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
                  
                  ))?>
           
               
                  
                  
          </div>
                  
                   <div class="row">
         <div class="col-md-4 ">
     <h4>Выберите дату, когда брали билеты</h4>
     <div id="sanbox">
      <div class="input-group date">
             <?=Form::input('day', $data['day'], array(
                                    'class' => 'form-control',
                                    'type' => 'text',
                                     'data-required' => 'true',
                                    
                                    
                  ))?>
    
    
    
    
    <span class="input-group-addon">
        <i class="glyphicon glyphicon-th"></i>
    </span>
    </div>
          </div>                   
                               
				
                            </div>
                            
     
                      
        
         
         </div>
           
           <div class="form-group">
               <?=Form::label('addition', 'Дополнение, Комментарии')?>
               <?=Form::textarea('addition', $data['addition'], array(
                   'type' =>'text',
                   'placeholder' => 'Минимум 3 буквы, максимум 255',
                   'class' => 'form-control',
                   'data-required' => 'true',
                   'data-minlength' => '3',
                   'data-maxlength' => '150',
                   ))?>
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


<div class="row">
    
    <div class="col-md-9">


 <div class="portlet">
            <div class="portlet-header">


 <p>
  
      <?=HTML::anchor('admin/bookings', '<button class="btn btn-success " type="button"><i class="fa fa-reply"></i>  Вернуться на список покупателей</button>')?>
      
</p>
</div>

     <div class="portlet-content">
         <h2>Заказ зарегистрированного Покупателя</h2>
         <table class="table table-bordered table-highlight"> 
             <thead>
                 <tr>
                     <th>
                          Имя  
                        </th>
                        <th>
                            Емейл
                        </th>
                        <th>
                          Телефон
                        </th>
                        <th>
                             Адрес
                        </th>
                        <th>
                             Дата Заказа
                        </th>
                       
                         
                 </tr>
             </thead>
             <tbody>
                 <tr>
                     <td>
                         <h4><?=$customer->user->username?></h4>
                     </td>
                      <td>
                          <h4><?=$customer->user->email?></h4>
                     </td>
                      <td>
                          <h4><?=$customer->user->phonenumber?></h4>
                     </td>
                      <td>
                          <h4><?=$customer->seladr?></h4>
                     </td>
                      <td>
                          <h4><?=date('d-m-Y H:i:s', strtotime($customer->actdt))?></h4>
                     </td>
                     
                 </tr>
                 
             </tbody>
             
         </table>
       
         <br>
         <?if(count($orders) >0 ):?>
       <table id="checktb" class="table table-striped table-bordered table-hover table-checkable">
             <thead>
                 <tr>
                   <th class="checkbox-column">
				<input type="checkbox" class="icheck-input" />
			</th>
                        <th>
                         Взяли или нет
                     </th>
                     <th>
                         Площадка
                     </th>

                     <th>
                         Мероприятие
                     </th>
                     <th>
                         Сцена
                     </th>
                     <th>
                         Дата, время
                     </th>
                     <th>
                         Количество билетов
                     </th>
                      
                     <th>
                         Ценовая Категория
                     </th>
                      <th>
                            
                            Какие билеты
                        </th>
                     
                     
                 </tr>
             </thead>
             <tbody>
                 
                 <?foreach ($orders as $order):?>

                 <tr>
                    <td class="checkbox-column">
				<input type="checkbox" class="icheck-input" />
			</td>
                        <td>
                          <span class="label label-primary">Если взял билеты - Отметить флажок</span>
                     </td>
                        <td>
                            
                            <?=$order->place?>
                        </td>
                         
                     </td>
                      <td>
                         <?=$order->playbill?>
                     </td>
                     <td>
                         <?=$order->scene?>
                     </td>
                      <td>
                          
                         <?=date('d-m-Y', strtotime($order->dt))?> Начало в <?=$order->tm?>
                     </td>
                     <td>
                         <?=$order->amt?>
                     </td>
                     <td>
                         <?=$order->cost?>
                     </td>
                     <td>
                           <?=HTML::anchor('admin/orders/ticket/'.$order->id, '<button class="btn btn-success" type="button"><i class="fa fa-dollar"></i> Какие билеты</button>')?>
                     </td>
                    
                 </tr>
                 <?
endforeach;?>
             </tbody>
             
             
         </table>
      <?else:?>
         <p>У этого нет ничего заказанного</p>
         <?
endif;?>
         
     </div>
</div>
    </div></div>



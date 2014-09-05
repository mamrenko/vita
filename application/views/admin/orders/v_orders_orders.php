<div class="row">
    
    <div class="col-md-9">


 <div class="portlet">
            <div class="portlet-header">


 <p>
  
      <?=HTML::anchor('admin/orders', '<button class="btn btn-success " type="button"><i class="fa fa-reply"></i>  Вернуться на список покупателей</button>')?>
      
</p>
</div>

     <div class="portlet-content">
         <h2>Заказ Незарегистрированного Покупателя</h2>
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
                         <h4><?=$customer->name?></h4>
                     </td>
                      <td>
                          <h4><?=$customer->email?></h4>
                     </td>
                      <td>
                          <h4><?=$customer->phone?></h4>
                     </td>
                      <td>
                          <h4><?=$customer->adress?></h4>
                     </td>
                      <td>
                          <h4><?=date('d-m-Y H:i:s', strtotime($customer->dt))?></h4>
                     </td>
                     
                 </tr>
                 
             </tbody>
             
         </table>
       
         <br>
         <?if(count($orders) >0 ):?>
       <table id="checktb" class="table table-striped table-bordered table-hover table-checkable">
             <thead>
                 <tr>
                  
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
                     <td><?;?>
                         
                         <?if($order->taketicket != ''):?>
                         <p><?=$order->taketicket->comment?></p>
                         <?$barygs = $order->taketicket->associates->find_all()->as_array();?>
                         <?  foreach ($barygs as $baryg):?>
                         <p>Брали у <?=$baryg->name?></p>
                         <p><?=$baryg->phone?></p>
                         <p><?=date('d-m-Y',  strtotime($order->taketicket->dmy))?></p>
                         <?  endforeach;?>
                         
                         <?=HTML::anchor('admin/orders/edit_ticket/'.$order->id, '<button class="btn btn-warning" type="button"><i class="fa fa-dollar"></i>  Изменить информацию</button>')?>
                         <?  else :?>
                           <?=HTML::anchor('admin/orders/tickets/'.$order->id, '<button class="btn btn-success" type="button"><i class="fa fa-dollar"></i> Какие билеты</button>')?>
                         <? 
endif;?>
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


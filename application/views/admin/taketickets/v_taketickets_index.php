<div class="row">
    <div class="col-md-11">
    <?if (count($taketickets)>0):?>

<h3>У кого брали и какие билеты</h3>
  <table id="placetb" class="table table-bordered table-highlight">
                <thead>
                    <tr>
                        <th>
                            № Заказа
                        </th>
                        <th>
                          Заказ
                        </th>
                        <th>
                           Клиент
                        </th>
                        <th>
                         У кого и Почем брали
                        </th>
                        <th>
                           Когда
                        </th>
                        <th>
                            Изменить
                        </th>
                        
                        
                    </tr>
                    
                    
                    
                </thead>
                <tbody>
                   
                
                

      <?foreach($taketickets as $teke):?>
                     <tr> <?if($teke->customer_id == 0):?>
                         <td>
                            
                             <?=$teke->orderuser_id?>
                         </td>
                         
                         <td>
                             <p><?=$teke->booking->place?>  - <?=$teke->booking->scene?></p> 
                             <p>
                                 <?=$teke->booking->playbill?> на 
 <?=date('d-m-Y',strtotime($teke->booking->dt))?> в <?=$teke->booking->tm?>
                             </p>
                             <p>  Количество Билетов: <?=$teke->booking->amt?></p>
                         </td>
                         <td>
                             <p>Зарегистрированный :</p>
                             <p><?=$teke->orderuser->user->username?></p>
                             <p><?=$teke->orderuser->user->phonenumber?></p>
                             <p><?=$teke->orderuser->user->email?></p>
                            
                            <p><?=$teke->orderuser->seladr?></p>
                         </td>
                         <td>У кого:
                            <?$bars = $teke->associates->find_all()->as_array();?>
                              <?foreach($bars as $bar):?>
                            <p> <strong><?=$bar->name?></strong></p>
                             <p><strong><?=$bar->phone?></strong></p>
                               <p><strong><?=$bar->adress?></strong></p>
                             <? endforeach;?>
                       <?=$teke->comment?>
                            
                          
                         </td>

                         <td>
                               <?=date('d-m-Y',strtotime($teke->dmy))?>  
                         </td>   
                         <td>
                             <p>
                                 <?=HTML::anchor('admin/bookings/ticket_edit/'.$teke->id, 
                                       '<button class="btn btn-warning" type="button">
                                           <i class="fa fa-dollar"></i>  Изменить информацию</button>')?>
                             </p> 
                             <p>
                                 <?=HTML::anchor('admin/bookings/ticket_delete/'.$teke->id, 
                                       '<button class="btn btn-danger" type="button">
                                           <i class="fa fa-dollar"></i>  Удалить</button>')?>
                             </p>
                              
                             
                         </td>                          <?else :?>
                         
                             
                            <td> 
                             
                             <?=$teke->customer_id?>
                             
                            
                         </td>
                        
                        <td>
                            <p>
          <?=$teke->order->place?> - <?=$teke->order->scene?>
                        </p>
                            <p> <?=$teke->order->playbill?> на 
 <?=date('d-m-Y',strtotime($teke->order->dt))?> в <?=$teke->order->tm?>
                            </p>
                            <p>Количество Билетов: <?=$teke->order->amt?> </p> 
                        </td>
                        
                      
                        <td>
                            <p><?=$teke->customer->name?></p>
                            <p><?=$teke->customer->phone?></p>
                             <p><?=$teke->customer->email?></p>
                             <p>Адрес: <?=$teke->customer->adress?></p>
                              <p>Метро: <?=$teke->customer->metro?></p>
                        </td>
                        <td> <p>У кого: </p>
                              <?$bars = $teke->associates->find_all()->as_array();?>
                              <?foreach($bars as $bar):?>
                           <p> <strong><?=$bar->name?></strong></p>
                             <p><strong><?=$bar->phone?></strong></p>
                               <p><strong><?=$bar->adress?></strong></p>
                             <? endforeach;?>
                       <?=$teke->comment?>
                            
                        </td>
                          <td>
                          <p> 
              <?=date('d-m-Y',strtotime($teke->dmy))?>
                            </p>   
                             
                          </td>
                          <td>
                              <p><?=HTML::anchor('admin/orders/ticket_edit/'.$teke->id, 
                                       '<button class="btn btn-warning" type="button">
                                           <i class="fa fa-dollar"></i>  Изменить информацию</button>')?></p>
                                    
                              <p>
                                  <?=HTML::anchor('admin/orders/ticket_delete/'.$teke->id, 
                                       '<button class="btn btn-danger" type="button">
                                          Удалить</button>')?>
                              </p>
                          </td>
                            <?
endif;?>  
                    </tr>
<? endforeach;?>
</tbody>
</table>

<?
else :?>
<p>Пока нет ничего</p>
<?
endif;?>
</div>
</div>
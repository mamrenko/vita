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
                     <tr>
                         <td>
                             <?=$teke->order->id?>
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
                        <td> 
                              <?$bars = $teke->associates->find_all()->as_array();?>
                              <?foreach($bars as $bar):?>
                            <p>У кого: <strong><?=$bar->name?></strong></p>
                             <? endforeach;?>
                       <?=$teke->comment?>
                            
                        </td>
                          <td>
                          <p> 
              <?=date('d-m-Y',strtotime($teke->dmy))?>
                            </p>   
                             
                          </td>
                          <td>
                               <?=HTML::anchor('admin/orders/ticket_edit/'.$teke->id, '<button class="btn btn-warning" type="button"><i class="fa fa-dollar"></i>  Изменить информацию</button>')?>
                          </td>
                            
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
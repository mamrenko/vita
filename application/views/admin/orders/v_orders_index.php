
    <div class="row">
       
        
        <div class="col-md-10">
               <h3>Незарегистированные покупатели</h3>
           <table id="placetb" class="table table-bordered table-highlight">
                <thead>
                    <tr>
                        
                        <th>
                            Номер Заказа
                        </th>
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
                        <th>
                            Заказ
                        </th>
                        
                    </tr>
                    
                    
                    
                </thead>
                <tbody>
                    <?foreach($customers as $customer):?>
                    <tr>
                       
                        <td>
                            <?=$customer->order->id?>
                        </td>
                        <td>
                            <?=HTML::anchor('admin/orders/orders/'.$customer->id,$customer->name)?>
                            
                        </td>
                        <td>
                              <?=$customer->email?>
                            
                        </td>
                        <td>
                              <?=$customer->phone?>
                        </td>
                        <td>
                              <?=$customer->adress?>
                        </td>
                        <td>
                              <?=date('d-m-Y H:i:s', strtotime($customer->dt))?>
                        </td>
                        <td>
                             <?if ($customer->order->taketicket != ''):?>

 <?=HTML::anchor('admin/orders/orders/'.$customer->id, '<button class="btn btn-success" type="button"><i class="fa fa-thumbs-o-up"></i> Заказ № '.$customer->order->id .'</button>')?>


                            
                            <?else :?>

 <?=HTML::anchor('admin/orders/orders/'.$customer->id, '<button class="btn btn-danger" type="button"><i class="fa fa-thumbs-o-down"></i> Заказ № '.$customer->order->id .'</button>')?>


                            <?endif;?>
                        </td>
                    </tr>
                    <?
endforeach;?>
                    
                    
                </tbody>
                
                
                
            </table>
        </div>
        
        
        
    </div>
    
    
    
    
    

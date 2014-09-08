
<div class="row">
       
        
        <div class="col-md-9">
               <h3>Здесь заказы от зарегистрировавнных пользователей</h3>
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
                    <?foreach($orderusers as $customer):?>
                    
                    <tr>
                        <td>
                            <?=$customer->id?>
                        </td>
                        <td>
                            <?=HTML::anchor('admin/bookings/orders/'.$customer->id,$customer->user->username)?>
                            
                        </td>
                        <td>
                             
                           <?=$customer->user->email?>  
                            
                        </td>
                        <td>
                             <?=$customer->user->phonenumber?>  
                        </td>
                        <td>
                            <?=$customer->seladr?>
                        </td>
                        <td>
                              <?=date('d-m-Y H:i:s', strtotime($customer->actdt))?>
                        </td>
                        <td>
                             <?=HTML::anchor('admin/bookings/orders/'.$customer->id, '<button class="btn btn-success" type="button"><i class="fa fa-dollar"></i> Заказ</button>')?>
                        </td>
                    </tr>
                    <?
endforeach;?>
                    
                    
                </tbody>
                
                
                
            </table>
        </div>
        
        
        
    </div>

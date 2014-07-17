
    <div class="row">
       
        
        <div class="col-md-9">
               <h3>Заказы от Незарегистированных покупателей</h3>
           <table id="placetb" class="table table-bordered table-highlight">
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
                        <th>
                            Заказ
                        </th>
                        
                    </tr>
                    
                    
                    
                </thead>
                <tbody>
                    <?foreach($customers as $customer):?>
                    <tr>
                        <td>
                            <?=HTML::anchor('admin/bayers/orders/'.$customer->id,$customer->name)?>
                            
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
                             <?=HTML::anchor('admin/bayers/orders/'.$customer->id, '<button class="btn btn-success" type="button"><i class="fa fa-dollar"></i> Заказ</button>')?>
                        </td>
                    </tr>
                    <?
endforeach;?>
                    
                    
                </tbody>
                
                
                
            </table>
        </div>
        
        
        
    </div>
    
    
    
    
    

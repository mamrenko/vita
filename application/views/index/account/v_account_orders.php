<div class="row">
    <div class="col-md-12">
   
<h3>
Список всех заказов
</h3>

      <?if(count($orders) > 0):?>  
     
        <table id="accountorders" class="table table-bordered" data-provide="datatable" >
            <thead>
            <th data-sortable="true" data-direction="asc">
                Номер заказа
            </th>
            <th data-sortable="true" data-direction="asc">
                Адрес доставки
            </th>
            <th data-sortable="true" data-direction="asc">
                Дата заказа
            </th>
            <th>
                Заказ
            </th>
            </thead>
        
            <tbody>
               
       <?
foreach ($orders as $order):?>     
             <tr>
                 <td>
                      Заказ № <?=$order->id?>
                 </td>
                 <td>
                     <?=$order->seladr?>
                 </td>
                 <td>
                     <?=date('d-m-Y', strtotime($order->actdt))?>
                 </td>
                 <td>
                   <?=HTML::anchor('account/order/'.$order->id, '<button type="button" class="btn btn-success">Посмотреть заказ</button>')?>  
                         
                    
                 </td>
          
      </tr> 
 <?
endforeach;?>
            </tbody>
  </table>  
        <?else:?>
        <p>Пока заказов нет</p>
        <?
endif;?>
</div>
</div>
</div>

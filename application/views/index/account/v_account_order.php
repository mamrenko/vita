<div class="row">
    <div class="col-md-12">
        <h3>Заказ <?=$id?> от  <?=date('d-m-Y', strtotime($order->actdt))?></h3>
        <p> <?=HTML::anchor('account/orders', '<button type="button" class="btn btn-info">Вернуться на список заказов</button>')?> 
            </p>
        <table class="table table-bordered table-hover">
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
        
       Дата | Время
    </th>
    <th>
       Кол-во билетов
        
    </th>
    <th>
        Категория Билетов
    </th>
        </tr>
        </thead>
        
        <tbody>
             <?
foreach ($bookings as $order):?>
            <tr>
                <td>
                    <?= $order->place?>
                </td>
                <td>
                   <?= $order->playbill?> 
                </td>
                <td>
                   <?= $order->scene?>
                </td>
                
                <td>
                  
  <?=date('d-m-Y', strtotime($order->dt)); ?> в <?= $order->tm?>
                </td>
                <td>
                    <?= $order->amt?>
                </td>
                <td>
                     <?= $order->cost?>
                </td>
            </tr>
            
           <? endforeach;?>  
            
        </tbody>
        
    </table>
        
        
        
    </div>
    
    
    
    
</div>

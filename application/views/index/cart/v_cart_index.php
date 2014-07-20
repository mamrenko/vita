<div class="row">

<h2 class="text-primary"><i class="fa fa-shopping-cart fa-2x"></i>  Корзина покупателя</h2>



   <?  if ($orders != NULL) :?>   
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
        
       Дата | Время
    </th>
    <th>
       Кол-во билетов
        
    </th>
    <th>
        Цена
        
    </th>
    
    
    <th>
       Удалить
    </th>
        </tr>
    </thead>
    <tbody>  <?
foreach ($orders as $order):?>
        <tr>
           
            <td>
                <?=HTML::anchor('places/place/'.$order->playbill->place->id, $order->playbill->place->title)?>
            </td>
            <td>
               


                <?=HTML::anchor('event/one/'.$order->playbill->id, $order->playbill->title)  ?> 
            </td>
            <td>
               
              
        <?=date('d',strtotime($order->day))?>
                        
                <?$month = (date('m',strtotime($order->day))); ?>
                
                
                   
                    <? switch ($month) {
case 1:
    echo "января";
    break;
case 2:
    echo "февраля";
    break;
case 3:
    echo "марта";
    break;
case 4:
    echo "апреля";
    break;
case 5:
    echo "мая";
    break;
case 6:
    echo "июня";
    break;
case 7:
    echo "июля";
    break;
case 8:
    echo "августа";
    break;
case 9:
    echo "сентября";
    break;
case 10:
    echo "октября";
    break;
case 11:
    echo "ноября";
    break;
case 12:
    echo "декабря";
    break;
default:
    echo "????";
}
   ?>                 
       <?=date('Y ',strtotime($order->day));?>           
                    <p><?$den = (date('N',strtotime($order->day)));?> 
                     <? switch ($den) {
case 1:
    echo "Понедельник";
    break;
case 2:
    echo "Вторник";
    break;
case 3:
    echo "Среда";
    break;
case 4:
    echo "Четверг";
    break;
case 5:
    echo "Пятница";
    break;
case 6:
    echo "Суббота";
    break;
case 7:
    echo "Воскресенье";
    break;
default:
    echo "????";
}
  ?>                  
      в <?=$order->start?>
     
            </td>
            <td>
              
             
                 <?=$amt_s[$order->id]?>
             

               <?=Form::open('cart/edit/'.$order->id, array(
                  
                   
       ));?>
                
            
                
               <?=HTML::anchor('cart/edit/'. $order->id, '')?>
                 <input type = "text" 
                          id="amy"
                          name ="amt"
                          class="form-control bfh-number" 
                          value="'. $amt_s[$order->id]. '"
                          data-min="1"
                          data-max="25">
               
               <!---  <form id ="amt" action="cart/edit/id=<?//=$order->id?>" method="post">
                   <input type = "text" 
                          id='amy'
                          name ="amt"
                          class="form-control bfh-number" 
                          value="<?//=$amt_s[$order->id]?>"
                          data-min="1"
                          data-max="25">
                   <input name="hidval" id ="hidval" type="hidden" value="<?//=$order->id?>" />
                  
                   
               </form> 
                
               --!>
                   
               <?=Form::close()?>
                
               
               <!---
               <div class="bfh-slider"
                    data-name="slider3"
                   data-value="<?//=$amt_s[$order->id]?>"
                    
                    data-min="1" 
                    data-max="25">
                </div>
                --->
               
                   
        
                   
               
            </td>
            <td>
                 <?=$cost_s[$order->id]?>
              
            </td>
            
            <td class="text-center">
                
                    
                <?=HTML::anchor('cart/del/'.$order->id, '<i class="glyphicon glyphicon-trash fa-1x"></i>')?>
               
            </td>
            
        
                          
        </tr>
        <? endforeach;?> 
        
    
    </tbody>
</table>

<div id="feedback"></div>
<div class="cont"></div>
          <?=HTML::anchor('/', '<button class="btn btn-info" id ="btnGet" ><i class="fa fa-arrow-circle-left"></i>  Продолжить заказы</button>', array(
              //'id' =>'',
          ))?>



 <?=HTML::anchor('cart/order', '<button class="btn btn-success" id ="btnGet" >Оформить Заказ</button>', array(
              //'id' =>'',
          ))?>



       <?else:?>

<p>В корзине нет товаров</p>

<?
endif;?>

</div>



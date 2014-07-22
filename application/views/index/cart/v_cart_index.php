<div class="row">

<h2 class="text-primary"><i class="fa fa-shopping-cart fa-2x"></i>  Корзина покупателя</h2>



   <?  if ($orders != NULL) :?>  
<div class="table-responsive">
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
              
             
                 <?//=$amt_s[$order->id]?>
             

               
            
                <form>
              
                 <input type = "text" 
                          id="<?=$order->id?>"
                          name ="<?=$order->id?>"
                          class="form-control bfh-number" 
                          value="<?= $amt_s[$order->id]?> '"
                          data-min="1"
                          data-max="25">
                 </form> 
                
                <script>
    
    $(function(){
    //$('#<?//=$order->id?>').css({'border': '3px solid red'});
     //var $amt = $('#<?//=$order->id?>').val();
     $('#<?=$order->id?>').change(function(){
    var $amt = $('#<?=$order->id?>').val();
    var id =$(this).attr('id');
    //console.log(id);
   // var $hidval = $('#hidval').val();
////   // alert($amt);
    $.post('cart/edit',{input: $amt, id: id},function(data){
    // $('#feedback').text(data);
     
    
  });
  });

    });
    
    </script>     
            </td>
            <td>
                <?$costs = ORM::factory('cost')
                        ->where('playbill_id', '=', $order->playbill->id)
                      ->find_all();?>
                      
             <select id="cost<?=$order->id?>" class="form-control" >
                  <option selected value=" <?=$cost_s[$order->id]?>"> <?=$cost_s[$order->id]?></option>
                 <?
                                  foreach ($costs as $cos):?>
<option value="<?=$cos->area->title?> <?=$cos->price?> рублей"><?=$cos->area->title?> <?=$cos->price?> рублей</option>

<?endforeach;?>

</select>
               
    <script>
    
    $(function(){
     $('#cost<?=$order->id?>').css({'border': '3px solid green'});
    //alert($('#cost<?=$order->id?>').val()) ;
    //alert($('#cost<?=$order->id?>').attr('id'));
     
     $('#cost<?=$order->id?>').change(function(){
    var $cost = $('#cost<?=$order->id?>').val();
    var id_cost =$('#cost<?=$order->id?>').attr('id');
    alert($('#cost<?=$order->id?>').val()) ;
    alert($('#cost<?=$order->id?>').attr('id'));
   //$.post('cart/edit_cost',{cost: $cost, id_cost: id_cost},function(data){
  // $('#feedback').text(data);
     
    
  //});
  });

    });
    
    </script>
  
  
  <? // endforeach;?>

              <?=$cost_s[$order->id]?>
                 
              
            </td>
            
            <td class="text-center">
                
                    
                <?=HTML::anchor('cart/del/'.$order->id, '<i class="glyphicon glyphicon-trash fa-1x"></i>')?>
               
            </td>
            
        
                          
        </tr>
        <? endforeach;?> 
        
    
    </tbody>
</table>
</div>
<div id="feedback"></div>
<div class="cont">
    
    
    
</div>

    
   
    
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



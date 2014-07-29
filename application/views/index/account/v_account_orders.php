<div class="row">
    <div class="col-md-9">
   
<h3>
Список всех заказов
</h3>

        
     
        

        
        <div class="panel-group" id="accordion">
            
       <?
foreach ($orders as $order):?>     
            
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$order->id?>">
          Заказ № <?=$order->id?> на адрес: <?=$order->seladr?>
        </a>
      </h4>
    </div>
    <div id="collapse<?=$order->id?>" class="panel-collapse collapse">
      <div class="panel-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
 <?
endforeach;?>
  
</div>
</div>
</div>

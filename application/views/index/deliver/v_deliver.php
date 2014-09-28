<h1>Доставка</h1>
<ol class="breadcrumb">
    <li><a href="<?=URL::base();?>">Главная</a></li>
  
  <li class="active">Доставка</li>
</ol>







<div class="row">
    
    <div class="col-md-6">
        
        <div class="panel panel-success">
        <div class="panel-heading">
          <h3 class="panel-title"><i class="fa fa-truck"></i> Курьерская Доставка по Москве</h3>
        </div>
        <div class="panel-body">
              <p>По Москве БЕСПЛАТНО при заказе от 5 тыс. рублей</p>
        </div>
      </div> 
        
        
        
    </div>
    
    <div class="col-md-6">
        <div class="panel panel-success">
            <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-truck"></i> Курьерская Доставка по Подмосковью(Ближайшее до 60 км)</h3>
            </div>
            <div class="panel-body">
                        <p>Оплата Дополнительно 800 рублей.</p>
            </div>
     </div>
        
        
    </div>
</div>


<div class="row hidden-xs">
    <div class="col-md-12 ">
        <h3>Лучшие события</h3>
    <div id="owl-pay">
        
         <?foreach($carouselevents as $carousel):?>
        <div class="item">
            <div class="thumbnail "> 
         
                <p><?=HTML::anchor('event/'.$carousel->playbill->id,$carousel->playbill->title)?></p>
  <a href="event/<?=$carousel->playbill->id?>">   
              
                <img 
                    src="media/uploads/playplaces/<?=$carousel->playbill->image?>" 
                    alt="<?=$carousel->playbill->title?>"
                    class="img-responsive">
            
            </a>
  
  <div class=" caption">
      
      <p>
           <?=HTML::anchor('event/'.$carousel->playbill->id, 'Подробнее', array(
                         'class' => 'btn btn-success',
                        'role' => 'button',
                    ));?>
          
          
        </p>
      
  </div>
  

</div> 
            
            
            
           

              
              
        </div>
   
    
        <?endforeach;?>
     
    </div>



		

      </div>
    </div>

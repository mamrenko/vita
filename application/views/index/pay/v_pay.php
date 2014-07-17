 

<h1>Оплата</h1>
<ol class="breadcrumb">
    <li><a href="<?=URL::base();?>">Главная</a></li>
  
  <li class="active">Способы Оплаты</li>
</ol>


<div class="row">
    
    <div class="col-md-4">
        
        
        <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title"><i class="fa fa-rub"></i> Оплата наличными</h3>
        </div>
        <div class="panel-body">
              <p>Осуществляется при получении билетов.</p>
               <p> Выписывается приходный кассовый ордер.</p>
        </div>
      </div>

        
        
      
        
    </div>
   

    <div class="col-md-4">
       
        <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title"><i class="fa fa-exchange"></i>  Оплата электронными деньгами</h3>
        </div>
        <div class="panel-body">
                        <p>Яндекс Кошелек</p>
                        <p>Qiwi  Переводы</p>
        </div>
      </div>
        
        
        
        
           
       </div> 
        <div class="col-md-4">
            
            <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title"><i class="fa fa-credit-card"></i>   Оплата банковскими картами</h3>
        </div>
        <div class="panel-body">
                       <p>Оплачиваются билеты заранее, затем привозятся курьером.</p>
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
         
  <p><?=$carousel->playbill->title?></p>
  <a href="event/one/<?=$carousel->playbill->id?>">   
              
                <img 
                    src="media/uploads/playplaces/<?=$carousel->playbill->image?>" 
                    alt="<?=$carousel->playbill->title?>"
                    class="img-responsive">
            
            </a>
  
  <div class=" caption">
      
      <p>
           <?=HTML::anchor('event/one/'.$carousel->playbill->id, 'Подробнее', array(
                         'class' => 'btn btn-primary',
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

    
    



<? if(count($carousels) <3):?>
<div class="row hidden-xs">
    <div class="col-md-12 ">

    <div id="owl-demo">
     <div class="item"><img src="media/uploads/carousels/custom.jpg" alt="Аплодисменты - заказ билетов"></div>
    <div class="item"><img src="media/uploads/carousels/custom2.jpg" alt="Аплодисменты - заказ билетов"></div>
    <div class="item"><img src="media/uploads/carousels/custom3.jpg" alt="Аплодисменты - заказ билетов"></div>
    <div class="item"><img src="media/uploads/carousels/custom4.jpg" alt="Аплодисменты - заказ билетов"></div>
    
     
    </div>


      </div>
    </div>
<?else:?>


<div class="row hidden-xs">
    <div class="col-md-12 ">

    <div id="owl-demo">
        
         <?foreach($carousels as $carousel):?>
        <div class="item">
            <a href="<?=$carousel->link?>"><img src="media/uploads/carousels/<?=$carousel->image?>" alt="<?=$carousel->title?>"></a>
        </div>
   
    
        <?endforeach;?>
     
    </div>


      </div>
    </div>

<? endif; ?>

    
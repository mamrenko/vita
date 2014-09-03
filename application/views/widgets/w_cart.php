


       
       <?if($carts >0):?>
       <a href="<?=URL::base()?>cart">
   <button type="button" class="btn btn-success">
   
     
   В корзине &nbsp; <i class="fa fa-shopping-cart"></i>
 &nbsp; <?=$carts?> шт.

        </button>
</a>
     <?else:?>
    <a href="<?=URL::base()?>cart">
    <button type="button" class="btn btn-info">
       
         
       Корзина &nbsp;<i class="fa fa-shopping-cart"></i>

        </button>
</a>
   <? endif;?>

            
   
   
          
         
              
   



<blockquote>


       
       <?if($carts >0):?>
       <a href="<?=URL::base()?>cart">
   <button type="button" class="btn btn-success">
    <i class="fa fa-shopping-cart fa-2x"></i>
    <p>В корзине <?=$carts?> шт.</p>

        </button>
</a>
     <?else:?>
    <a href="<?=URL::base()?>cart">
    <button type="button" class="btn btn-info">
        <i class="fa fa-shopping-cart fa-2x"></i>
        <p>Корзина  </p> 
        </button>
</a>
   <? endif;?>

            
   
   
          
         
              
   

</blockquote>

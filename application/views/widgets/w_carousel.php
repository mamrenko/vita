<? if(count($carousels) <3):?>

<div class="row hidden-xs">
      <div class="col-md-12 ">
    <div class="carousel slide" id="theCarousel" data-interval="900">
       <ol class="carousel-indicators">
          
              <li data-target="#theCarousel" data-slide-to="0" class="active"></li>
              <li data-target="#theCarousel" data-slide-to="1"></li>
              <li data-target="#theCarousel" data-slide-to="2"></li>
              <li data-target="#theCarousel" data-slide-to="3"></li>
              
             
            </ol>
        
        <div class="carousel-inner">
       
            <div class="item active">
                <img src="media/uploads/carousels/custom.jpg" alt="1"
                 class="img-responsive"/>
                
            </div>
             <div class="item">
                 <img src="media/uploads/carousels/custom2.jpg" alt="3" class="img-responsive"/>
                 
             </div>
             <div class="item">
                 <img src="media/uploads/carousels/custom3.jpg" alt="2" class="img-responsive"/>
                 
             </div>
             <div class="item">
                 <img src="media/uploads/carousels/custom4.jpg" alt="4" class="img-responsive"/>
                
             </div>
            </div>
        <a href="#theCarousel" class="carousel-control left" data-slide="prev"><span class="icon-prev"></span></a>
            <a href="#theCarousel" class="carousel-control right" data-slide="next"><span class="icon-next"></span></a>
        </div>
    </div> 
 </div>
<?else:?>


<div class="row hidden-xs">
      <div class="col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
    <div class="carousel slide" id="theCarousel" data-interval="2000">
       <ol class="carousel-indicators">
          
           <li data-target="#theCarousel" data-slide-to="0" class="active"></li>
             <? $i = 1;
          
   while ($i <= count($carousels)) {?>
              
              <li data-target="#theCarousel" data-slide-to="<?=$i++;?>"></li>
         <?    }
   ?>

        
          
               
            </ol>
        
        <div class="carousel-inner">
       
            <div class="item active">
                <img src="media/uploads/carousels/custom.jpg" alt="www.aplodismenty.ru"
                 class="img-responsive"/>
                <div class="carousel-caption">
                   
                </div>
            </div>
             
            <?foreach($carousels as $carousel):?>
             <div class="item">
                
                 <img src="media/uploads/carousels/<?=$carousel->image?>"
                      alt="<?=$carousel->title?>"
                 class="img-responsive"/>
                 
                 
                 <div class="carousel-caption">
                    <h4><?=$carousel->title?></h4>
                    <p><?=$carousel->description?></p>
                </div>
             </div>
             <?endforeach;?>
             
             
            </div>
        <a href="#theCarousel" class="carousel-control left" data-slide="prev"><span class="icon-prev"></span></a>
        <a href="#theCarousel" class="carousel-control right" data-slide="next"><span class="icon-next"></span></a>
        </div>
    </div> 
 </div>

<?endif;?>
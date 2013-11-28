
   <div class="panel panel-success">
                <div class="panel-heading">
                    <h2 class="panel-title">
                   Меню
                    </h2>
                </div>
                <div class="panel-body">
                    <ul>
                            <?foreach($categories as $cat):?>

                               <li><?=$cat->title?></li>
                           <? endforeach; ?>
                    </ul>     
  
                    
               </div>
                
        </div>
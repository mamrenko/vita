
   <div class="tab-v3">
                
                
                    <ul class="nav nav-pills nav-stacked">
                            <?foreach($categories as $cat):?>

                        <li><?=HTML::anchor('#', $cat->title)?></li>
                           <? endforeach; ?>
                    </ul>     
  
             
        </div>
<br />

   <div class="tab-v3">
                
                
                    <ul class="nav nav-pills nav-stacked">
                            <?foreach( $events as $cats):?>
  <?$categories =$cats->categories         
           ->group_by('id')
           ->order_by('title')
           ->limit(5)
           ->find_all()
          
          ;?>
                         <?foreach( $categories as $cater):?>
                        <li><?=HTML::anchor('#', $cater->title);?></li>
                        <? endforeach; ?>
                           <? endforeach; ?>
                    </ul>     
  
             
        </div>
<br />

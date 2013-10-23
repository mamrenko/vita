

<div id='cssmenu'>
<ul>
        <?foreach($menu as $name => $menu ):?>
             <?if(in_array($select, $menu)):?>
        <li class='active'> <?=HTML::anchor('admin/'.$menu[0], $name)?> 
           
        </li>
        <?  else:?>
        <li>
            <?=HTML::anchor('admin/'.$menu[0], $name)?> 
        </li>
        
            <?endif;?>
        <?endforeach?>
       
       
              
            
    </ul>
</div>
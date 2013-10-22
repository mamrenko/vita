
<div id='adminmenu'>
    <ul>
        <?foreach($menu as $name => $menu ):?>
        <?if(in_array($select, $menu)):?>
        <li> <?=HTML::anchor('admin/'.$menu[0], $name, array('class' => 'select',
            ))?> </li>
        <?  else:?>
        <li> <?=HTML::anchor('admin/'.$menu[0], $name)?> </li>
        <?endif;?>
        <?endforeach?>
       
        <li class='last'><a href="<?=URL::base()?>"><span>На сайт</span></a></li>
              
            
    </ul>
</div>
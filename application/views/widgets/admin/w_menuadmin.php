

        <?foreach($menu as $name => $menu ):?>
        <?if(in_array($select, $menu)):?>
        <li> <?=HTML::anchor('admin/'.$menu[0], $name, array('class' => 'select',
            ))?> </li>
        <?  else:?>
        <li> <?=HTML::anchor('admin/'.$menu[0], $name)?> </li>
        <?endif;?>
        <?endforeach?>
       
        <li><a href="<?=URL::base()?>"><i class="fa fa-home"></i>На сайт</a></li>
              
    
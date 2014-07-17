<?if(!$auth->logged_in('login')):?>
      <li><a href="<?=URL::base()?>login">Вход / Регистрация</a></li> 
      <?else:?>
      <li><a><?=$user->email?> <i class="fa fa-smile-o"></i></a></li> 
      
    <?if ($auth->logged_in('admin')):?>
      <li><?=html::anchor('admin', 'Панель администратора')?></li>
       <li class="devider"></li>   
    <?else:?>
      <li><?=html::anchor('account', 'Личный кабинет')?></li>
       <li class="devider"></li>   
    <?endif?>
    
      <li><?=html::anchor('logout', 'Выйти')?></li>
      <? endif; ?>

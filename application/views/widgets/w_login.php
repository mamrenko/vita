<?if(!$auth->logged_in('login')):?>
    <a href="<?=URL::base()?>login">
        
        <button type="button" class="btn btn-primary">Вход / Регистрация</button>

        
    
    </a>
      <?else:?>

     
          
          
<p> <?=$user->email?> <i class="fa fa-smile-o"></i></p>
      
    <?if ($auth->logged_in('admin')):?>
     <?=html::anchor('admin', '<button type="button" class="btn btn-primary">Панель администратора</button>')?>
     <?=html::anchor('account', '<button type="button" class="btn btn-primary">Личный кабинет</button>')?>
    <?else:?>
      <?=html::anchor('account', '<button type="button" class="btn btn-primary">Личный кабинет</button>')?>
      
    <?endif?>
    
      <?=html::anchor('logout', '<button type="button" class="btn btn-warning">Выйти</button>')?>
      <? endif; ?>

<?if(!$auth->logged_in('login')):?>
    <a href="<?=URL::base()?>login">
        <div class="btn-group nav">
          <button type="button" class="btn btn-primary">
Вход &nbsp; <i class="fa fa-arrow-down"></i></button>
          <button type="button" class="btn btn-success">Регистрация &nbsp;<i class="fa fa-smile-o"></i>
</button>

        </div>
    
    </a>
      <?else:?>

     
          
          
<p> <?=$user->email?> <i class="fa fa-smile-o"></i></p>
      
    <?if ($auth->logged_in('admin')):?>

     <?=html::anchor('admin', '<button type="button" class="btn btn-primary"> 
 Панель администратора <i class="fa fa-cogs"></i></button>')?>
     <?=html::anchor('account', '<button type="button" class="btn btn-primary">Личный кабинет <i class="fa fa-user"></i>
</button>')?>
    <?else:?>
      <?=html::anchor('account', '<button type="button" class="btn btn-primary">Личный кабинет <i class="fa fa-user"></i>
</button>')?>
      
    <?endif?>
    
      <?=html::anchor('logout', '<button type="button" class="btn btn-warning">Выйти <i class="fa fa-arrow-up"></i>
</button>')?>
      <? endif; ?>

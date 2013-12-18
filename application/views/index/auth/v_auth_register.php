<!--=== Breadcrumbs ===-->
<div class="breadcrumbs margin-bottom-40">
    <div class="container">
        <h1 class="pull-left">Регистрация Нового Пользователя</h1>
        <ul class="pull-right breadcrumb">
            <li><a href="<?=URL::base()?>">Главная</a></li>
            
            <li class="active">Регистрация</li>
        </ul>
    </div><!--/container-->
</div><!--/breadcrumbs-->
<!--=== End Breadcrumbs ===-->

<div class="row">
    
   

<div class="col-md-6">
  
<?if($errors):?>
<?foreach ($errors as $error):?>
  <p><span class="label label-danger"><?=$error?></span></p>
<?endforeach?>
<?endif?>
                    <div class="bg-light"><!-- You can delete "bg-light" class. It is just to make background color -->
                        <h4><i class="icon-align-justify"></i> Регистрация Нового Пользователя </h4>
                          <?=Form::open('register', array(
                             'id' => 'validate-basic',
                              'class' => 'form parsley-form',
                              'data-validate' => 'parsley',
                             ));?>
                         <div class="form-group">
               <?=Form::label('username', 'Ваше Имя')?>
               <?=Form::input('username', $data['username'], array(
                   'type' =>'text',
                   'placeholder' => 'Введите Ваше Имя Минимум 3 символа',
                   'class' => 'form-control',
                   'data-required' => 'true',
                   'data-minlength' => '3',
                   'data-maxlength' => '150',
                   ))?>
                             
          </div>
                        
                         <div class="form-group">
               <?=Form::label('phonenumber', 'Ваш Телефон')?>
               <?=Form::input('phonenumber', $data['phonenumber'], array(
                   'data-type' =>'phone',
                   'placeholder' => '(XXX) XXXX XXX',
                   'class' => 'form-control',
                   'data-required' => 'true',
                   
                   ))?>
                      </div>
                        
                        <div class="form-group">
               <?=Form::label('Email', 'Ваш Email')?>
               <?=Form::input('email', $data['email'], array(
                   'type' =>'email',
                   'placeholder' => 'Введите свой Емейл',
                   'class' => 'form-control',
                   'data-required' => 'true',
                   'data-minlength' => '3',
                   'data-maxlength' => '150',
                   ))?>
                      </div>
                        
                        
                        <div class="form-group">
                     <?=Form::label('password', 'Пароль')?>
                      <?=Form::password('password', $data['password'], array(
                   'type' =>'password',
                   'placeholder' => 'Введите пароль из восьми символов',
                   'class' => 'form-control',
                   'data-required' => 'true',
                   'data-minlength' => '4',
                   'data-maxlength' => '8',
                   ))?>
                        </div>
                         <div class="form-group">
                     <?=Form::label('password_confirm', 'Повторить Пароль')?>
                      <?=Form::password('password_confirm', $data['password_confirm'], array(
                   'type' =>'password',
                   'placeholder' => 'Повторите пароль из восьми символов',
                   'class' => 'form-control',
                   'data-required' => 'true',
                   'data-minlength' => '4',
                   'data-maxlength' => '8',
                   ))?>
                        </div>
                        <div class="form-group">
                    
                      <?=Form::button('submit', 'Зарегистрироваться!', array(
                          'type' => 'submit',
                          'class' => 'btn btn-primary',
                          ));?>
                    
                  </div>
                           <?=Form::close()?>      
                    </div>
  
  
  
  
    </div>
    <div class="col-md-6">
        <div class="bg-light"><!-- You can delete "bg-light" class. It is just to make background color -->
                        <h4><i class="icon-user"></i>  Войти на сайт</h4>
        <p>
            <a href="<?=URL::base()?>login"><button class="btn btn-success" type="button">Войти</button></a>
       </p>
        </div>
        
    </div>
</div>
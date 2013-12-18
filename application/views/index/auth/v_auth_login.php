<!--=== Breadcrumbs ===-->
<div class="breadcrumbs margin-bottom-40">
    <div class="container">
        <h1 class="pull-left">Вход на сайт</h1>
        
    </div><!--/container-->
</div><!--/breadcrumbs-->
<!--=== End Breadcrumbs ===-->


<div class="row">
    
    <div class="col-md-6 ">
        
        
<?if($errors):?>
<?foreach ($errors as $error):?>
        <p><span class="label label-danger"><?=$error?></span></p>

<?endforeach?>
<?endif?>
         <div class="bg-light"><!-- You can delete "bg-light" class. It is just to make background color -->
                        <h4><i class="glyphicon glyphicon-user"></i>  Вход</h4>
                         <?=Form::open('login', array(
                             'id' => 'validate-basic',
                             'class' => 'form parsley-form',
                              'data-validate' => 'parsley',
                             ));?>
                         <div class="form-group">
               <?=Form::label('Емейл', ' Ваш емейл')?>
                           
               <?=Form::input('email', $data['email'], array(
                   'type' =>'email',
                   'placeholder' => 'введите свой емейл',
                   'class' => 'form-control',
                   'data-required' => 'true',
                   'data-minlength' => '3',
                   'data-maxlength' => '150',
                   ))?>
                      </div>
                        
                       
                        <div class="form-group">
                      <?=Form::input('password', $data['password'], array(
                   'type' =>'password',
                   'placeholder' => 'Введите пароль',
                   'class' => 'form-control',
                   'data-required' => 'true',
                   'data-minlength' => '8',
                   'data-maxlength' => '8',
                   ))?>
                        </div>
                        <div class="form-group">
                           <?=Form::checkbox('remember')?> 
                            <p>Запомнить</p>
                                 
                        </div>
                        <div class="form-group">
                    
                      <?=Form::button('submit', 'Войти', array(
                          'type' => 'submit',
                          'class' => 'btn btn-success',
                          ));?>
                    
                  </div>
                           <?=Form::close()?>
     
 
                    </div>
    </div>

    
    <div class="col-md-6">
        <div class="bg-light"><!-- You can delete "bg-light" class. It is just to make background color -->
                        <h4><i class="icon-user"></i>  Зарегистрироваться</h4>
        <p>
            <a href="<?=URL::base()?>register"><button class="btn btn-success" type="button">Зарегистрироваться</button></a>
       </p>
        </div>
        
    </div>
    
    
    
    
    
    
</div>

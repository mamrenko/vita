<br />
<div class="breadcrumbs">
    <div class="container">
<h3 class="pull-right">
Настройка регистрационных данных
</h3>
</div></div>

<div class="row">
    
   

<div class="col-md-6 col-md-offset-2">
  <br/>
<?if($errors):?>
<?foreach ($errors as $error):?>
  <p><span class="label label-danger"><?=$error?></span></p>
<?endforeach?>
<?endif?>
                    <div class="bg-light"><!-- You can delete "bg-light" class. It is just to make background color -->
                        <h4><i class="icon-align-justify"></i> Изменение Регистрационных Данных </h4>
                          <?=Form::open('account/profile', array(
                             'id' => 'validate-basic',
                              'class' => 'form parsley-form',
                              'data-validate' => 'parsley',
                             ));?>
                         <div class="form-group">
               <?=Form::label('username', 'Ваше Имя')?>
               <?=Form::input('username', $user->username, array(
                   'type' =>'text',
                   'placeholder' => 'Введите Ваше Имя',
                   'class' => 'form-control',
                   'data-required' => 'true',
                   'data-minlength' => '3',
                   'data-maxlength' => '150',
                   ))?>
                             
          </div>
                        
                         <div class="form-group">
               <?=Form::label('phonenumber', 'Ваш Телефон')?>
               <?=Form::input('phonenumber', $user->phonenumber, array(
                   'data-type' => 'phone',
                   'placeholder' => '(XXX) XXXX XXX',
                   'class' => 'form-control',
                   'parsley-type' => 'phone',
                   //'id' => 'parsley-phone',
                  'data-required' => 'true',
                   ))?>
                      </div>
                        
                        <div class="form-group">
               <?=Form::label('Email', 'Ваш Email')?>
               <?=Form::input('email', $user->email, array(
                   'type' =>'email',
                   'placeholder' => 'Введите свой Емейл',
                   'class' => 'form-control',
                   'data-required' => 'true',
                   'data-minlength' => '3',
                   'data-maxlength' => '150',
                   ))?>
                      </div>
                        
                        
                        
                         
                        <div class="form-group">
                    
                      <?=Form::button('submit', 'Изменить Данные', array(
                          'type' => 'submit',
                          'class' => 'btn btn-primary',
                          ));?>
                    
                  </div>
                           <?=Form::close()?>      
                    </div>
    </div>
</div>



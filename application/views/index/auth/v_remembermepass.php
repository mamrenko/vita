<!--=== Breadcrumbs ===-->
<div class="breadcrumbs margin-bottom-40">
    <div class="container">
        <h1 class="pull-left">Восстанавливаем пароль</h1>
        
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
        
        <?if(isset($pass)):?>
        
     <div class="alert alert-success" role="alert">
         <p>Ваш емейл <?=$email?> отправлено письмо с восстановлением пароля</p>
         <p><?=$message?></p>  
     
     </div>
        <?
else :?>
      
    <div class="alert alert-danger" role="alert"> <p><?=$message?></p>  </div>
          
         <?=Form::open('remembermepass', array(
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
                    
                      <?=Form::button('submit', 'Восстановить', array(
                          'type' => 'submit',
                          'class' => 'btn btn-success',
                          ));?>
                    
                  </div>
                           <?=Form::close()?>
         <?
                endif;?>
    </div>
    
    <div class="col-md-6 ">
        
       
        
    </div>
    
</div>



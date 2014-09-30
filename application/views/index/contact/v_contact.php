 <script type="text/javascript">
        $(function () {
            $("#TextBoxDate").mask("99/99/9999");
            $("#TextBoxPhone").mask("(999) 999-9999");
        });
    </script>  

<h1>Наши Контакты</h1>
<ol class="breadcrumb">
    <li><a href="<?=URL::base();?>">Главная</a></li>
  
  <li class="active">Контакты</li>
</ol>



<!--=== Content Part ===-->
    

    <div class="row margin-bottom-30">
        <div class="col-md-9 mb-margin-bottom-30">
            
      <?if(isset($emails)):?>
<div class="jumbotron">
  <h1>Спасибо за сообщение</h1>
  
  <p><a href="../." class="btn btn-primary btn-lg" role="button">На Главную страницу</a></p>
 
</div>



<?else :?>      
            
         <?if($errors):?>
<?foreach ($errors as $error):?>
        <div class="alert alert-danger" role="alert">
  <span class="glyphicon glyphicon-repeat"></span>  
    
    <?=$error?></div>
              
<?endforeach?>
<?endif?>
            
            
            
           <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-tasks"></i> Для связи с нами заполните форму ниже.</h3>
                    <span class="label label-success"> Все поля обязательны для заполнения.</span>
                </div>
                <div class="panel-body">

            
          <?=Form::open('contact/', array(
                'id' => 'contactFor',
                'class' => 'form parsley-form',
                'data-validate' => 'parsley',
          ));?>
                <div class="form-group">
                <label for="name">Имя <i class="fa fa-check-square"></i></label>
                <div class="row margin-bottom-20">
                    <div class="col-md-7 col-md-offset-0">
                     
                        
               <?=Form::input('name', $data['name'], array(
                   'class' => 'form-control',
                   'type' => 'text',
                   'data-required' => 'true',
                   'data-minlength' => '3',
                   'data-maxlength' => '150',
                    'placeholder' => 'Введите свое имя',
                   ))?>   
                      
                        </div>
                    </div> 
                
                </div>
                <div class="form-group"> 
                <label>Email <i class="fa fa-check-square"></i></label>
                <div class="row margin-bottom-20">
                    <div class="col-md-7 col-md-offset-0">
                        
                    <?=Form::input('email', $data['email'], array( 
                    'class' => 'form-control',
                    'type' => 'email',
                    'data-required' => 'true',
                    'placeholder' => 'Введите свой емейл',
                   ))?>  
                     
                        </div>
                    </div>                
                </div>
                
                    <div class="form-group">
                         <label> Телефон <i class="fa fa-check-square"></i></label>
                          <div class="row margin-bottom-20">
                          <div class="col-md-5 col-md-offset-0">
                     <?=Form::input('phone', $data['phone'], array(
                    'type' => 'text',
                    'name' => 'phone',
                    'id' => 'phone',
                   'class' => 'form-control',
                   'data-required' => 'true',
                   'data-minlength' => '3',
                   'data-maxlength' => '500',
                    'placeholder' => 'Введите номер телефона',
                   ))?>  
                        
                        </div>
                    </div> 
                    </div>
                    
                        <div class="form-group">
                            <label>Сообщение <i class="fa fa-check-square"></i></label>
                             Можно отправить 300 символов: <span id="numCharactersLeft">300</span>
                           <div class="row margin-bottom-20">
                          <div class="col-md-11 col-md-offset-0">
                     <?=Form::textarea('text', $data['text'], array(
                   'type' => 'text',
                   'id' => 'Comments',
                   'class' => 'form-control',
                   'data-required' => 'true',
                   //'data-minlength' => '3',
                   //'data-maxlength' => '20',
                    'maxlength' => '300',    
                    'placeholder' => 'Введите сообщение',
                   ))?>  
                        
                        </div>
                    </div>                
                </div> 
                    
                   
    <?=Form::input('intime', date('Y-m-d H:i:s'), 
        array(
    'type' => 'hidden'))?>
                   
                   
                    <div class="form-group"> 
                        
                        <p><?=$captchaimg?></p>
                      
                         <p> 


<i class="fa fa-refresh  fa-2x" onclick="reload()" style="cursor:pointer; vertical-align: super;" title="Обновить код"></i>

                     </p>
                        <script>
                            function reload(){
id=Math.floor(Math.random()*1000000);
$("img.captcha").attr("src","/vita/captcha/default?id="+id);
}

                            </script>
                        <p>Введите код указанный на рисунке:</p>
                        
                       
                        <?=Form::input('captcha', '',array(
                            'type' => 'text',
                           'data-required' => 'true',
                        ))?>
                        
                        <p><span class="label label-danger"><?=$error_captcha?></span></p> 
                    </div> 
                    
                <div class="form-group text-center">
                    
                  
                      <?=Form::button('submit', 'Отправить!', array(
                          'type' => 'submit',
                          'class' => 'btn btn-primary',
                          ));?>
                </div>
            <?=FORM::close();?>
                </div>
           </div>
           <?endif;?>

        </div><!--/col-md-9-->
        
        <div class="col-md-3">
            <!-- Contacts -->
            
    <div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Контакты</h3>
  </div>
  <div class="panel-body">
      <p><i class="fa fa-envelope-o"></i>  Юридический Адрес: </p>
      <p>Москва, ул. 8 марта, 12</p>
      <p><i class="fa fa-envelope"></i>  5097703@aplodismenty.ru</p>
      <p><i class="fa fa-phone"></i>  +7 495 5097703</p>
      <p><i class="fa fa-phone"></i>  +7 905 5892848</p>
      <p><i class="fa fa-skype"></i>  aplodis</p>
      <a href="<?=URL::base();?>"><i class="fa fa-globe"></i>  http://www.aplodismenty.ru</a>
      
  </div>
</div>

            
    <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Часы Работы</h3>
        </div>
        <div class="panel-body">
            <p><i class="fa fa-power-off"></i>   Понедельник - Воскресенье:</p>
            <p>10.00 до 22.00</p>


        </div>
   </div>   
            
            
            <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Почему МЫ?</h3>
        </div>
        <div class="panel-body">
            <p><i class="fa fa-thumbs-o-up"></i>  Заказ билетов в день спектакля</p>
            <p><i class="fa fa-thumbs-o-up"></i>  Большой выбор лучших мест</p>
            <p><i class="fa fa-thumbs-o-up"></i>  Быстрая Доставка</p>

        </div>
   </div>   
            
       
        </div><!--/col-md-3-->
    </div><!--/row-->        

    
    <h2>Площадки</h2>  
    
   
    
    <div class="flexslider">
        
  <ul class="slides">
     <?foreach ($events as $event):?>
            
            <li>
                       <?=HTML::anchor('place/'.$event->playbill->place->id,
                        HTML::image('media/uploads/places/small_'.$event->playbill->place->image, array(
                            'class' => 'img-thumbnail'
                        )));?>
                
            </li> 
            
             <?endforeach;?>
  </ul>
</div>
    
    <!--/flexslider-->
    <!-- End Our Clients -->


 

    
   






      
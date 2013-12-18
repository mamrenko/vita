



<!--=== Breadcrumbs ===-->
<div class="breadcrumbs margin-bottom-40">
    <div class="container">
        <h1>Наши Контакты</h1>
        <ul class="breadcrumb">
            <li><a href=".">Главная</a></li>
 
            <li class="active">Контакты</li>
        </ul>
    </div>
</div><!--/breadcrumbs-->
<!--=== End Breadcrumbs ===-->


<!--=== Content Part ===-->
<div class="container">     
    <div class="row margin-bottom-30">
        <div class="col-md-9 mb-margin-bottom-30">
           <div class="panel panel-blue margin-bottom-40">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="icon-tasks"></i> Для связи с нами заполните форму ниже.</h3>
                    <span class="label label-success"> Все поля обязательны для заполнения.</span>
                </div>
                <div class="panel-body">

            
          <?=Form::open('contact/', array(
                'id' => 'contactFor',
                'class' => 'form parsley-form',
                'data-validate' => 'parsley',
          ));?>

                <label>Имя <span class="color-red">*</span></label>
                <div class="row margin-bottom-20">
                    <div class="col-md-7 col-md-offset-0">
                        <div class="form-group">
                        
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
                
                <label>Email <span class="color-red">*</span></label>
                <div class="row margin-bottom-20">
                    <div class="col-md-7 col-md-offset-0">
                        <div class="form-group">
                             <?=Form::input('email', $data['email'], array( 
                    'class' => 'form-control',
                    'type' => 'email',
                    'data-required' => 'true',
                    'placeholder' => 'Введите свой емейл',
                   ))?>  
                        
                        </div>
                    </div>                
                </div>
                
                <label>Сообщение <span class="color-red">*</span></label>
                <div class="row margin-bottom-20">
                    <div class="col-md-11 col-md-offset-0">
                        <div class="form-group">
                            <?=Form::textarea('text', $data['text'], array(
                    'type' => 'text',
                   'class' => 'form-control',
                   'data-required' => 'true',
                   'data-minlength' => '3',
                   'data-maxlength' => '500',
                    'placeholder' => 'Введите сообщение',
                   ))?>  
                        
                        </div>
                    </div>                
                </div>
                <div class="form-group">
                    
                  
                      <?=Form::button('submit', 'Отправить!', array(
                          'type' => 'submit',
                          'class' => 'btn btn-primary',
                          ));?>
                </div>
            <?=FORM::close();?>
                </div>
           </div>
        </div><!--/col-md-9-->
        
        <div class="col-md-3">
            <!-- Contacts -->
            <div class="headline"><h2>Контакты</h2></div>
            <ul class="list-unstyled who margin-bottom-30">
                <li><i class="icon-home"></i>Юридический Адрес: Москва, ул. 8 марта, 12</a></li>
                <li><i class="icon-envelope-alt"></i>5097703@aplodismenty.ru</a></li>
                <li><i class="icon-phone-sign"></i>+7 495 5097703</a></li>
                <li><i class="icon-phone-sign"></i>+7 905 5892848</a></li>
                <li><i class="icon-skype"></i>aplodis</a></li>
                <li><a href="."><i class="icon-globe"></i>http://www.aplodismenty.ru</a></li>
            </ul>

            <!-- Business Hours -->
            <div class="headline"><h2>Часы Работы</h2></div>
            <ul class="list-unstyled margin-bottom-30">
                <li><strong>Понедельник - Воскресенье:</strong> </li>
                <li>10.00 до 22.00</li>
                
            </ul>

            <!-- Why we are? -->
            <div class="headline"><h2>Почему МЫ?</h2></div>
            <p>Преимущества работы с нами.</p>
            <ul class="list-unstyled">
                <li><i class="icon-ok color-green"></i> Заказ билетов в день спектакля</li>
                <li><i class="icon-ok color-green"></i> Большой выбор лучших мест</li>
                <li><i class="icon-ok color-green"></i> Быстрая Доставка</li>
            </ul>
        </div><!--/col-md-3-->
    </div><!--/row-->        

    <!-- Our Clients -->
    <div id="clients-flexslider" class="flexslider home clients">
        <div class="headline"><h2>Площадки</h2></div>    
        <ul class="slides">
            <?foreach ($places as $place):?>
                        
            <li>
                <a href="#">
                    <img src="media/uploads/places/small_<?=$place->image?>" alt="" /> 
                    
                </a>
            </li>
          <?endforeach?>
        </ul>
    </div><!--/flexslider-->
    <!-- End Our Clients -->
</div><!--/container-->     
<!--=== End Content Part ===-->
<div class="modal" id="sentDialog" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a href="#" class="close" data-dismiss="modal">&times;</a>
                <h3>Спасибо за Сообщение!</h3>
                
            </div>
            <div class="modal-body">
                <p>В ближайшее время с Вами свяжемся</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>    
</div>
<script>
var $sentDialog = $("#sentDialog");

  $("#contactForm").on("submit", function () {
    $sentDialog.modal('show');
    return false;
  });

   </script> 
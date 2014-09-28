<div class="row">
    <div class="col-md-3 text-center">
        
          <?=HTML::anchor('cart', '<button class="btn btn-info" type="button"><i class="fa fa-reply"></i>  Изменить Заказ</button>')?>
        
    </div>
    
    <div class="col-md-5 ">
        
    <h3 class="text-info">Заказ без регистрации<small> Вы заказываете: </small></h3>
    
 
   
    </div>
    <div class="col-md-4 text-center">
    <?=HTML::anchor('login', '<button class="btn btn-primary" id ="btnGet" >Войти или зарегистироваться</button>', array(
              //'id' =>'',
          ))?>
   </div>
</div>

<div class="row">
    
    <?  if ($orders != NULL) :?>   
<table class="table table-bordered table-hover">
    <thead>
        <tr>
    <th>
       Площадка
        
    </th> 
    <th>
        Мероприятие
       
    </th>
    <th>
        Сцена
    </th>
     <th>
        
       Дата | Время
    </th>
    <th>
       Кол-во билетов
        
    </th>
    <th>
        Цена
        
    </th>
    
    
    
        </tr>
    </thead>
    <tbody>  <?
foreach ($orders as $order):?>
        <tr>
           
            <td>
                <?=HTML::anchor('places/place/'.$order->playbill->place->id, $order->playbill->place->title)?>
            </td>
            <td>
               


                <?=HTML::anchor('event/'.$order->playbill->id, $order->playbill->title)  ?> 
            </td>
            <td>
                 <?=$order->scene->title?>
            </td>
            <td>
               
              
        <?=date('d',strtotime($order->day))?>
                        
                <?$month = (date('m',strtotime($order->day))); ?>
                
                
                   
                    <? switch ($month) {
case 1:
    echo "января";
    break;
case 2:
    echo "февраля";
    break;
case 3:
    echo "марта";
    break;
case 4:
    echo "апреля";
    break;
case 5:
    echo "мая";
    break;
case 6:
    echo "июня";
    break;
case 7:
    echo "июля";
    break;
case 8:
    echo "августа";
    break;
case 9:
    echo "сентября";
    break;
case 10:
    echo "октября";
    break;
case 11:
    echo "ноября";
    break;
case 12:
    echo "декабря";
    break;
default:
    echo "????";
}
   ?>                 
       <?=date('Y ',strtotime($order->day));?>           
                    <p><?$den = (date('N',strtotime($order->day)));?> 
                     <? switch ($den) {
case 1:
    echo "Понедельник";
    break;
case 2:
    echo "Вторник";
    break;
case 3:
    echo "Среда";
    break;
case 4:
    echo "Четверг";
    break;
case 5:
    echo "Пятница";
    break;
case 6:
    echo "Суббота";
    break;
case 7:
    echo "Воскресенье";
    break;
default:
    echo "????";
}
  ?>                  
      в <?=$order->start?>
     
            </td>
            <td>
              
                
             
                 <?=$amt_s[$order->id]?>
               
            </td>
            <td>
                 <?=$cost_s[$order->id]?>
              
            </td>
            
           
            
        
                          
        </tr>
        <? endforeach;?> 
        
    
    </tbody>
</table>
</div>
    <?
    endif;?>
    
     
         <?if($errors):?>
<div class="row">
<?foreach ($errors as $error):?>
        <div class="alert alert-danger" role="alert">
  <span class="glyphicon glyphicon-repeat"></span>  
    
    <?=$error?></div>
              
<?endforeach?>
    </div>
<?endif?>
<div class="row">
    <blockquote>
  <p>Для оформления заказа заполните форму:</p>
  
</blockquote>
    
</div>
<div class="row">
    <div class='col-md-8 col-md-offset-2'>
    <div class="panel panel-info">
       
    
        
        
        
        
        <div class="panel-heading"><i class="fa fa-user fa-2x"></i> &nbsp; Контактная информация</div>
  <div class="panel-body">
  
       
       <?=Form::open('cart/orders/', array(
            'enctype' => 'multipart/form-data',
            //'id' =>'validateform',
           'data-validate' => 'parsley',
           'class' => 'form-horizontal',
           'role' => 'form',
           ));?>
       
      
      
      
  <div class="form-group">
    <?=Form::label('email', 'Электронная почта', array(
        'class' =>'col-sm-3 control-label',
        
        
        
    ))?><i class="fa fa-asterisk"></i>
    <div class="col-sm-9">
           <?=Form::input('email', $data['email'], array(
                   'class' => 'form-control',
                   'type' => 'email',
                   'placeholder' => 'Ваш Емейл',
                  'data-required' => 'true',
                   ))?>
    
    </div>
  </div>
    
      <div class="form-group">
    <?=Form::label('name', 'Ваше имя', array(
        'class' =>'col-sm-3 control-label',
        
        
        
    ))?><i class="fa fa-asterisk"></i>
    <div class="col-sm-9">
           <?=Form::input('name', $data['name'], array(
                   'class' => 'form-control',
                   'type' => 'text',
                   'placeholder' => 'Ваше имя',
                 'data-required' => 'true',
                   ))?>
    
    </div>
  </div>
     
    
      <div class="form-group">
    <?=Form::label('phone', 'Ваш телефон', array(
         'class' =>'col-sm-3 control-label',
        
        
        
    ))?><i class="fa fa-asterisk"></i>
    <div class="col-sm-9">
           <?=Form::input('phone', $data['phone'], array(
               'type' => "text",
                'class' => 'form-control bfh-phone',
                'data-format' => "+7 (ddd) ddd-dddd",
                'data-required' => 'true',
                  'data-parsley-minlength' => '8',
                  'data-parsley-maxlength' => '8',
                   'placeholder' => 'Ваш телефон',
                   //'id' => 'phone',
                   ))?>
    
    </div>
    
  </div>
    
      
      
      
      <div class="form-group">
    <?=Form::label('adress', 'Адрес Доставки', array(
        'class' =>'col-sm-3 control-label',
        
        
        
    ))?><i class="fa fa-asterisk"></i>
    <div class="col-sm-9">
           <?=Form::textarea('adress', $data['adress'], array(
                   'class' => 'form-control',
                   'type' => 'text',
                    'rows' =>2,
                   'placeholder' => 'Адрес Доставки  в Москве',
                   'data-required' => 'true',
                   ))?>
    
    </div>
  </div>
    <div class="form-group"> 
      
              <?=Form::label('metro', 'Выбор метро', array(
                   'class' =>'col-sm-3 control-label',
              ))?>
          <div class="col-sm-5">
              <?=Form::select('metro', $gets, $data['metro'], array(
           
                 
                  'class' => 'form-control',
                   
                  
                  ))?>
</div>
          </div>   
  
 <div class="well">
      
     <i class="fa fa-asterisk"></i> 
      <div class="form-group">
             
          <?=Form::checkbox('status', 1, (bool) $data['status'],array(
              'data-required' => 'true',
          ))?>
          
          Я принимаю   <button class="btn btn-primary" data-toggle="modal" data-target="#oferts">
  условия договора-оферты
</button>   
         продажи и возврата заказанных билетов
           
         
         
         
         <div class="modal fade" id="oferts" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Оферта</h4>
      </div>
      <div class="modal-body">
       

         
          
          <p>Условия предоставления услуг (оферта)</p> 


       <h2>Уважаемый Клиент!</h2>
       <p>Использование сервиса АГЕНТСТВА возможно только на условиях Оферты. </p>
       <p>Если Вы не принимаете в полном объеме условия Оферты, использование сервиса АГЕНТСТВА не допускается. Изложенный ниже текст Оферты является официальным публичным предложением заключить договор об оказании услуг в соответствии с п.2 ст.437 ГК РФ. Договор считается заключенным и приобретает силу с момента совершения Вами действий, предусмотренных в Оферте и означающих Ваше безоговорочное присоединение ко всем условиям Оферты без каких-либо изъятий или ограничений.</p>

       <p>Компания aplodismenty.ru, в лице сервера www.aplodismenty.ru, 
           публикует настоящий договор, являющийся публичным договором-офертой 
           в адрес как физических, так и юридических лиц (в дальнейшем КЛИЕНТ) о нижеследующем:
           </p>

1. Предмет договора оферты.
1.1. Предоставление КЛИЕНТУ услуг по бронированию, оформлению заказов, доставке, продаже билетов на театральные и концертные мероприятия, порядке и на условиях, предусмотренных данным договором и в соответствии с действующими тарифами Компании aplodismenty.ru.
1.2. Права и Обязанности сторон.
2. Момент заключения договора.
2.1. Текст данного Договора является публичной офертой (в соответствии со статьей 435 и частью 2 статьи 437 Гражданского кодекса РФ).
2.2. Акцепт оферты - получение или оплата заказанных услуг в порядке, определяемым Тарифами Компании aplodismenty.ru и условиями оплаты услуг.
2.3. Факт ЗАКАЗА услуг КЛИЕНТОМ у Компании aplodismenty.ru, является безоговорочным принятием данного Договора, т.е. КЛИЕНТ, заказавший билеты, либо воспользовавшийся услугами Компании aplodismenty.ru, рассматривается как лицо, вступившее с Компанией aplodismenty.ru в договорные отношения.
3. Права и обязанности сторон.
3.1. Компания aplodismenty.ru обязуется:
3.1.1. С момента заключения настоящего Договора предоставлять Клиенту Услуги, в соответствии с их перечнем и требованиями качества, определенными в настоящем Договоре.
3.1.2. Извещать КЛИЕНТА о внесенных изменениях и дополнениях относительно театрально-зрелищных мероприятий, которым с Клиентом установлены договорные отношения.
3.1.3. Не разглашать любую частную информацию Клиента и не предоставлять доступ к этой информации третьим лицам, за исключением случаев, предусмотренных законодательством.
3.1.4. Предоставить КЛИЕНТАМ возможность получения бесплатных телефонных консультаций по телефонам, указанным на сервере www.aplodismenty.ru . Объем консультаций ограничивается конкретными вопросами, связанными с предоставлением Услуг.
3.1.5. Выполнять взятые на себя обязанности по предоставлению Услуг КЛИЕНТУ. Компания aplodismenty.ru оставляет за собой право невыполнения Услуг в случае возникновения форс-мажорных ситуаций.
3.2. aplodismenty.ru имеет право:
3.2.1. Изменять настоящий Договор и Тарифы на услуги в одностороннем порядке, помещая их на сервере по адресу: (http://www.aplodismenty.ru) не менее чем за 10 (десять) дней, до начала их действия.
3.2.2. Имеет право отказать в заключение договора на предоставление Услуг, уведомив об этом КЛИЕНТА.
3.3. КЛИЕНТ обязуется:
3.3.1. До момента заключения Договора ознакомиться с содержанием Договора Оферты, условиями договора и тарифами, предлагаемыми КЛИЕНТОМ на сервере www.aplodismenty.ru.
3.3.2. Своевременно оплачивать Услуги, оказанные Компанией aplodismenty.ru КЛИЕНТУ.
4. Финансовые взаимоотношения.
4.1. Услуги КЛИЕНТУ оказываются на основании Тарифов и Условиях Компании aplodismenty.ru
4.2. Проданные билеты на театрально-зрелищные мероприятия возвращаются в соответствии с утвержденным порядком:
4.2.1. Внимание! Обмен и возврат билетов по желанию клиента не производится.
4.2.2. Возврат стоимости билетов осуществляется только в случае отмены, замены или переноса Мероприятий, возврат осуществляется организатором мероприятия, если иное не предусмотрено договором. При осуществлении возврата билетов на отмененные мероприятия производится возврат номинальной стоимости возвращаемого билета, стоимость услуги бронирования и стоимость доставки не возвращается. Возврат осуществляется в месте и сроки, установленные организатором мероприятия.
5.Отказ от предоставления гарантий.
5.1. Компания aplodismenty.ru делает все возможное, чтобы обеспечить качественное предоставление услуг КЛИЕНТУ. Советы и информация, даваемые КЛИЕНТУ, не могут рассматриваться как гарантии.
5.2 Стороны освобождаются от ответственности за неисполнение или ненадлежащее исполнение обязательств по Договору на время действия непреодолимой силы. Под непреодолимой силой понимаются чрезвычайные и непреодолимые при данных условиях обстоятельства, препятствующие исполнению своих обязательств СТОРОНАМИ по настоящему Договору. К ним относятся стихийные явления (землетрясения, наводнения и т.п.), обстоятельства общественной жизни (военные действия, чрезвычайные положения, крупнейшие забастовки, эпидемии и т. п.), запретительные меры государственных органов (запрещение перевозок, валютные ограничения, международные санкции запрета на торговлю и т.п.). В течение этого времени стороны не имеют взаимных претензий, и каждая из сторон принимает на себя свой риск последствия форс - мажорных обстоятельств.
6. Срок действия, порядок изменения условий и расторжения договора.
6.1. Стороны признают, что исполнение обязательств по настоящему Договору начинается с момента обращения в Компанию aplodismenty.ru или его подписания, и заканчивается при полном исполнении обязательств сторонами.
6.2. Все споры и разногласия, возникающие при исполнении сторонами обязательств по настоящему Договору, решаются путем переговоров. В случае невозможности их устранения, СТОРОНЫ имеют право обратиться за судебной защитой своих интересов.
7. Прочие условия.
7.1. Компания aplodismenty.ru не производит возврат денежных средств КЛИЕНТУ, за не использованные или утерянные КЛИЕНТОМ билеты и за Услуги оказанные КЛИЕНТУ.
<p>Положения:</p>

<p>Билет - это не товар, не услуга и не ценная бумага.</p>
<p>Билет - это подтверждение заключения договора между потребителем и исполнителем.</p>
<p>Приобретая Билет Вы принимаете условия предоставления услуг (оферта).</p>
<p>Если исполнитель свои обязанности выполнил - он не обязан нести 
убытки в виде возврата денежных средств за неиспользованную возможность потребителем посетить мероприятие.</p>
<p> Возврат денежных средств потребителю, 
    при добровольном отказе от договора на услуги, если исполнитель эти услуги оказал, 
    а заказчик ими не воспользовался, не возможен, по условиям договора.

</p>
<p>Пояснение к Закону "О защите прав потребителей" к Статье 32. Право потребителя на отказ от исполнения договора о выполнении работ (оказании услуг).
</p>
<p>Фактически понесенные расходы компании на привлечение, 
    инкассацию торговой выручки, заведение, продвижение, рекламу, распечатку, передачу
    билетной информации, подбор оператором call-центра билетов,
    техническую поддержку серверов, услуг курьерской доставки и т.д. могут составлять
    больше стоимости билета.
</p>
<p>Если Вы не согласны с условиями предоставления услуг (офертой) не совершайте ни каких действий по заказу / покупке / билетов - и пожалуйста, покиньте Наш сайт.   
          
          </p>
          
       ГРАЖДАНСКИЙ КОДЕКС РОССИЙСКОЙ ФЕДЕРАЦИИ

Статья 435. Оферта.
Офертой признается адресованное одному или нескольким конкретным лицам предложение, которое достаточно определенно и выражает намерение лица, сделавшего предложение, считать себя заключившим договор с адресатом, которым будет принято предложение.
Оферта должна содержать существенные условия договора.
Оферта связывает направившее ее лицо с момента ее получения адресатом. Если извещение об отзыве оферты поступило ранее или одновременно с самой офертой, оферта считается не полученной.

Статья 437.
Приглашение делать оферты. Публичная оферта.
Реклама и иные предложения, адресованные неопределенному кругу лиц, рассматриваются как приглашение делать оферты, если иное прямо не указано в предложении.
Содержащее все существенные условия договора предложение, из которого усматривается воля лица, делающего предложение, заключить договор на указанных в предложении условиях с любым, кто отзовется, признается офертой (публичная оферта).
   
     
<p>Наши контакты:</p>

Телефон: +7 (495) 509-77-03

Email: info@aplodismenty.ru
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
        
      </div>
    </div>
  </div>
</div>

       
          </div>
  </div>
    <div class="form-group">
    <div class=" col-sm-9 col-sm-offset-3">
        
        <?=Form::button('submit', 'Заказать', array(
                          'type' => 'submit',
                          'class' => 'btn btn-success btn-lg',
                          ));?>
      
    </div>
  </div>
      <?=Form::close()?>
  
      <p><i class="fa fa-asterisk"></i>  Все поля обязательны для заполнения</p>
  
  </div>
</div>
 </div>   
</div>

<div class="row">
    <div class="col-md-3">
   <?=HTML::anchor('cart', '<button class="btn btn-info" type="button"><i class="fa fa-reply"></i>  Изменить Заказ</button>')?>
</div>

<div class="col-md-8 text-info">
        
    <h3>Вы заказываете:</h3>
    
 
   
    </div>
    </div>

    <?  if ($orders != NULL) :?> 
<div class="row">
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
               


                <?=HTML::anchor('event/one/'.$order->playbill->id, $order->playbill->title)  ?> 
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
   

<div class="row">
    <div class="col-md-8">
        
        <div class="panel panel-default">
  <div class="panel-body">
       <h3 class='text-danger'>Выберите адрес доставки</h3>
         <?=Form::open('cart/order/', array(
            'enctype' => 'multipart/form-data',
           'class' => 'form-horizontal',
           'role' => 'form',
           ));?>
       
<?
foreach ($adresses as $adress):?>
<div class="checkbox">
  <label>
    <input type="checkbox" value="<?=$adress->id?>">
    Доставка на <?=$adress->adress?> | Метро: <?=$adress->metro?>
  </label>
</div>

<? endforeach; ?>
        
         <div class="well">
      
      
      <div class="form-group">
             
          <?=Form::checkbox('status', 1, (bool) $data['status'])?>
          
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
       

          <h2>Публичная оферта о заключении договора услуг</h2>

          <p>1. Общие положения</p>

1.1. Агентство Аплодисменты, далее именуемый «Агент» размещает Публичную Оферту о заключении договора по оказанию услуг по поиску, бронированию билетов для Клиента от его имени и за его счет, за вознаграждение, а также их доставку от своего имени, но за счет клиента. В свою очередь Клиент обязуется возместить Агенту произведенные расходы в полном размере.

1.2.В соответствии со статьей 437 Гражданского Кодекса Российской Федерации (ГК РФ) данный документ является публичной Офертой, и в случае принятия изложенных ниже условий лицо/организация, производящее Акцепт настоящей Оферты, осуществляет оплату в соответствии с условиями настоящего Договора. В соответствии с пунктом 3 статьи 438 ГК РФ, оплата является Акцептом настоящей Оферты, что считается равносильным заключению Договора на условиях, изложенных в Оферте.

1.3. На основании вышеизложенного, внимательно ознакомьтесь с текстом Публичной Оферты, и если вы не согласны с каким-либо пунктом Оферты, Вам предлагается отказаться от заключения настоящего договора.

1.4. В настоящей Оферте, если контекст не требует иного, нижеприведенные термины имеют следующие значения:

«Оферта» – публичное предложение Агента (Публичный договор), адресованное любому лицу/организации имеющему намерение заказать или приобрести либо заказывающее, приобретающее билеты на мероприятия, организованные третьими лицами.

«Агент» – компания, оказывающая услуги по поиску, бронированию и доставке билетов на мероприятия.

«Клиент» – Лицо имеющее намерение заказать или приобрести либо заказывающее, приобретающее билеты на мероприятия, организованные третьими лицами.

«Акцепт» – полное и безоговорочное принятие Клиентом условий Договора.

«Интернет-сайт» – официальный интернет-сайт Агента http://www.aplodismenty.ru, представляющий собой каталог билетов на мероприятия, организованные третьими лицами.

«Билет» - документ, удостоверяющий право Клиента на посещение мероприятия и содержащий всю необходимую информацию о данном мероприятии.

«Заказ» – выбранные Клиентом билеты, при оплате Заказа на Интернет-сайте, с указанием стоимости, включающей в себя вознаграждение агента и стоимость доставки билетов до Клиента.

"Доставка" - непосредственная передача Билета от сотрудника Службы Доставки Клиенту в месте, указанном Клиентом в качестве адреса доставки.

<p>2. Предмет договора</p>

2.1. Агент принимает на себя обязательство по поиску, бронированию, закупке и доставке билетов для Клиента, от его имени и за его счет, за вознаграждение. В свою очередь Клиент обязуется возместить Агенту произведенные расходы в полном размере и выплатить вознаграждение за оказанные услуги. Стоимость билетов, указанная на сайте, включает в себя сумму вознаграждения Агента и стоимость доставки билетов до Клиента, если адрес доставки находится за пределами МКАД.

2.2.Настоящий Договор и приложения к нему являются официальными документами Агента и неотъемлемой частью Оферты. Действующая версия каждого из вышеперечисленных документов размещена на Интернет-сайте по адресу http://www.vip-kassir.ru.

2.3. Вся информация, размещенная на сайте www.aplodismenty.ru несёт ознакомительный характер. При оформлении уточняйте время проведения спектакля или концерта, состав актеров, время и дату мероприятия.

<p>3. Размещение Заказа</p>

3.1.Клиент делает заказ Агенту через Интернет-сайт или любым иным доступным способом.

3.2.При размещении Заказа на Интернет-сайте Клиент обязуется предоставить следующую информацию о себе: фамилия, имя, отчество (на русском языке); фактический адрес доставки; почтовый адрес; адрес электронной почты; контактные телефоны.

3.3.При сборе и обработке персональных данных Клиентов Оператор руководствуется положениями Федерального Закона № 152 ФЗ «О персональных данных» от 27 июля 2006 года.

3.4.Клиент несёт ответственность за содержание и достоверность информации, предоставленной при размещении Заказа.

3.5. Агент обязуется не сообщать данные Клиента, указанные на сайте http://www.aplodismenty.ru/ при оформлении Заказа, лицам, не имеющим отношения к исполнению Заказа.

<p>4. Оплата Заказа</p>

4.1. Оплата заказа может осуществляться безналичным расчетом, либо наличными средствами - курьеру.

4.2. Оплата Клиентом Заказа на Интернет-сайте либо наличными средствами курьеру означает принятие Клиентом условий настоящего Договора. День оплаты Заказа является датой акцепта Оферты Клиентом.

<p>5. Исполнение Заказа</p>

5.1.Срок исполнения Заказа зависит от наличия билетов и времени, необходимого на обработку Заказа. Срок исполнения Заказа в исключительных случаях может быть оговорен с Клиентом индивидуально в зависимости от особенностей заказа.

5.2. Заказ считается исполненным с момента доставки билетов Клиенту либо его представителю. В случае доставки билетов по России услуга считается оказанной при доставки билетов транспортной компанией "ГарантПост" и получении подписи от клиента транспортной компанией "ГарантПост".

5.3. После оформления заказа менеджером, Клиенту, высылается смс уведомление о успешном оплате по банковской карте, а так же смс, о том что заказ оформлен и переходит в стадию доставки.

5.4. В случаи если клиент отказывается получать оплаченные билеты, то получить билеты он может непосредственно у места проведения мероприятия, за 15 минут до его начала. Для этого нужно заблаговременно (но не позже 2 часов до начала мероприятия), предупредить компанию www.vip-kassir.ru по телефону +7(495)506-67-61, в противном случае заказ считается исполненным.

<p>6. Доставка Заказа</p>

6.1. Агент осуществляет доставку билетов Клиенту посредством Курьерской доставки до адреса указанного Клиентом.

6.2. Доставка по Москве в пределах МКАД осуществляется бесплатно. Все расходы на доставку по Москве берет на себя Агент. При доставке по России - Клиент оплачивает расходы на доставку строго по тарифам транспортной компании "ГарантПост".

6.3.Сроки исполнения Доставки Заказа составляют от одного рабочего дня с момента поступления Заказа. Максимальные сроки доставки зависят от сложности заказа Клиента.

<p>7. Правила возврата билетов</p>

7.1. Возврат билетов осуществляется только в кассу организаторов мероприятия.

7.2. Если клиент приобрел дополнительную гарантию возврата, денежные средства за билеты возвращаются в полном объёме. Возврат денежных средств за услугу гарантии не осуществляется.

7.3. Возврат можно осуществить в любой день до даты проведения мероприятия согласно условиям гарантии, в офисе компании www.vip-kassir.ru, заранее предупредив о своём желании менеджера www.vip-kassir.ru по телефону +7(495)506-67-61

<p>
    8. Процедура возврата/отмены денежных средств по банковским картам
</p>

8.1. Для возврата денежных средств на банковскую карту Заказчику необходимо заполнить «Заявление о возврате денежных средств», которое заполняется в офисе Компании по адресу Газетный переулок д 9. Возврат денежных средств будет осуществлен на банковский счет Заказчика, указанный в заявлении, в течение 10 (Десяти) рабочих дней со дня получения «Заявление о возврате денежных средств» Компанией.

8.2. Для возврата денежных средств, зачисленных на расчетный счет Компании ошибочно, посредством платежных систем, Заказчик должен обратиться с письменным заявлением и приложением копии паспорта и чеков/квитанций, подтверждающих ошибочное зачисление. Данное заявление необходимо заполнить в офисе Компании по адресу: Газетный переулок д 9. После получения письменного заявления с приложением копии паспорта и чеков/квитанций, Компания производит возврат в срок до 10 (десяти) рабочих дней со дня получения 3аявления на расчетный счет Заказчика, указанный в заявлении. В этом случае, сумма возврата будет равняться стоимости Заказа. 8.3. Срок рассмотрения Заявления и возврата денежных средств Заказчику начинает исчисляться с момента получения Компанией Заявления и рассчитывается в рабочих днях без учета праздников/выходных дней. Если заявление поступило в компанию после 18.00 рабочего дня или в праздничный/выходной день, моментом получения компанией Заявления считается следующий рабочий день.

При оплате заказа банковской картой (включая ввод номера карты), обработка платежа происходит на сайте системы электронных платежей ASSIST, которая прошла международную сертификацию. Это значит, что Ваши конфиденциальные данные (реквизиты карты, регистрационные данные и др.) не поступают в интернет-магазин, их обработка полностью защищена и никто, в том числе www.vip-kassir.ru , не может получить персональные и банковские данные клиента.

Для защиты информации от несанкционированного доступа на этапе передачи от клиента на сервер системы ASSIST используется протокол SSL 3.0, сертификат сервера ( 1 28 bit) выдан компанией Thawte - признанным центром выдачи цифровых сертификатов. Вы можете проверить подлинность сертификата сервера. При оплате заказа банковской картой возврат денежных средств производится на ту карту, с которой был произведен платеж.»

<p>Наши реквизиты:</p>

Агентство Аплодисменты, 125009, Москва, Газетный переулок, д.9 Телефон +7(495) 506-67-61. 
ИНН 772678330719. 
ОГРИП 312774609501327.
ОКПО 0117695157. 
ОКВЭД 92.32. 
Расчетный счет 40802810900120000232 в ОАО «Банк Москвы».
Кор/счет 30101810500000000219. БИК 044525219.

<p>Наши контакты:</p>

Телефон: +7 (495) 509-77-03

Email: info@aplodismenty.ru

<p>
    Адрес: Москва, ул. 8 март</p>
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
    <div class="text-center">
        
        <?=Form::button('submit', 'Заказать', array(
                          'type' => 'submit',
                          'class' => 'btn btn-success btn-lg',
                          ));?>
      
    </div>
  </div>
        <?=
Form::close()?>
</div></div></div>
    <div class="col-md-4 text-center">
         <blockquote>
        <p>Доставка осуществляется курьером</p> 
        <footer>Доставка заказов бесплатная, если сумма заказа более 5 тысяч рублей</footer>
        </blockquote>
<?=HTML::anchor('account/adress', '<button class="btn btn-info" type="button"><i class="fa fa-reply"></i>  Изменить адрес доставки</button>')?>
</div>
</div>
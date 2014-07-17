
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Ваш Заказ Билетов на сайте Аплодисменты</title>
<!-- Latest compiled and minified CSS -->
<!-- Bootstrap -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

</head>

<body>
    <div class="container">
        <div class="row">
    <h2><i class="fa fa-camera-retro fa-5x"></i>Заказ Билетов на сайте Аплодисменты</h2>
    
    <p><i class="fa fa-paw"></i>Вы заказали:</p>
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
        Категория Билетов
    </th>
        </tr>
        </thead>
        
        <tbody>
             <?
foreach ($myorders as $order):?>
            <tr>
                <td>
                    <?= $order->place?>
                </td>
                <td>
                   <?= $order->playbill?> 
                </td>
                
                <td>
                    <?= $order->dt?> в <?= $order->tm?>
                </td>
                <td>
                    <?= $order->amt?>
                </td>
                <td>
                     <?= $order->cost?>
                </td>
            </tr>
            
           <? endforeach;?>  
            
        </tbody>
        
    </table>
    <div class="bs-callout bs-callout-warning">
    <blockquote>
    
    <p class="bg-success"> Номер Вашего Заказа <?= $сostom_id?></p>
        
    <p class="bg-success">Заказ сделан на адрес: <?=$adress?></p>
    <p class="bg-success">Наш менеджер свяжется с Вами по Указанному телефону: <?=$phone?></p>
    </blockquote>
    </div>
    <div class="bs-callout bs-callout-info">
    
    <blockquote class="blockquote-reverse">
   <p class="bg-primary">Если у Вас имеются какие-либо вопросы, позвоните по телефлну: 8-495-509-77-03</p>
    <p class="bg-primary>Наш сайт www.aplodismenty.ru</p>
    
   <p class="bg-primary>Желаем Вам приятно провести время! </p>
</blockquote>
   
    
    </div>
    </div>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>
</html>



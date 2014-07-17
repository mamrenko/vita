<!DOCTYPE html>
<html>
  <head>
   
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
     <![endif]-->
   
    <title><?=$site_title?> | <?=$page_title?></title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    
 <?foreach($styles as $style) :?>
            <?=HTML::style($style)?>
<?endforeach?>


<?foreach($scripts as $script) :?>
            <?=HTML::script($script)?>
        <?endforeach?>
    <![endif]-->
  </head>
  <body>
      <div id="page">
      <header class="container">
          <div class="row">
              <div class="col-md-8 col-md-offset-4">
              <ul class="nav nav-pills ">
                   <li class="active">
                     <?=$cart?>
                 </li>
                
             <li>
                 <a href="login"><span class="glyphicon glyphicon-arrow-down"></span> Вход / Регистрация
                 </a>
             </li>  

            <li>
                <a href="#"><span class="glyphicon glyphicon-user"></span> Наш Сервис </a>
            </li>   
            <li>
                <a href="#"><span class="glyphicon glyphicon-wrench"></span> Помощь</a>
            </li>  
             
           
              </ul>
                  </div>
          </div>
          <br />
          

          <div class="navbar navbar-default">
                <div class="navbar-header">
                  <button data-target=".navbar-responsive-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                    <a href="<?=URL::base()?>" class="navbar-brand">  <img id="logo-header"  src="<?=
URL::base()?>media/images/logo.png" alt="Агентство Аплодисменты"></a>
                </div>
                <div class="navbar-collapse collapse navbar-responsive-collapse">
                  
                   <form class="navbar-form navbar-right" role="search">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Поиск">
      </div>
      <button type="submit" class="btn btn-default">Искать</button>
    </form>
                  <ul class="nav navbar-nav navbar-right">
                     <?=$topmenu?>  
                    
                  </ul>
                </div><!-- /.nav-collapse -->
              </div>
      </header>
          <section id="body" class="container">
<!--              start block header-->
              <? if (isset($block_header)):?>
              <section id="main" class="col-md-12">
				<?foreach($block_header as $hblock):?>
                            
                        <?=$hblock?>
                    <?endforeach?> 
                </section>
       <?endif?>
        <!--              end block header-->      
              
        
        <? if (isset($block_center)):?>
        <section id="main" class="col-md-7">
				<?foreach($block_center as $cblock):?>
            
                        <?=$cblock?>
            
                    <?endforeach?> 
		</section>
                      <?endif?>
        
              
                 <? if (isset($block_right)):?>
		<section id="sidebar" class="col-md-5">
			<?foreach($block_right as $rblock):?>
                        <?=$rblock?>
                    <?endforeach?>
		</section>
                <?endif?>  
              
              
                  
              
              
          </section><!--      End body-->
          <hr />
          <footer class="container">
              <div class="row servive-block">
                  <div class="col-md-4">
                      <div class="servive-block-in">
                        <div><i class="icon-bullhorn"></i></div>
                        <h4>Ежемесячная Рассылка</h4>
                       
                          <form class="inline">
                          <div class="form-group">
                              <input type="text" class="form-control" placeholder="Email Адрес">  
                              
                          </div>
                          <div class="form-group">
                              <button class="btn btn-success" type="button">Подписаться!</button> 
                              
                          </div>
                          
                      </form>
                       
                      </div>

</div>

                  
                  <div class="col-md-4">
                  <div class="servive-block-in">
  <div>
<i class="icon-comments-alt"></i>
</div>
    <h4>Контакты</h4>
 
  
    <address>
                    Телефон: +7 903 5097703 <br />
                    Телефон: +7 905 5892848<br />
                    Email: <a href="mailto: aplodismenty.ru@gmail.com" class="">aplodismenty.ru@gmail.com</a><br />
                    Skype: aplodis
                  </address>
  
</div>
                  
                  
                  </div>
                  <div class="col-md-4">
                    <div class="servive-block-in">
                        <div><i class="icon-thumbs-up"></i></div>
                    <h4>О нас</h4>
                   
                    <p>Билеты для VIP  клиентов.</p>
                    <p>Все зрелищные мероприятия Москвы.</p>
                    
                  </div>



                  </div>
                  
                 
              </div>
              
          </footer>
   </div><!--      End page-->

  </body>
  
</html>

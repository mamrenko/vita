<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

    <head>
   <title><?=$site_title?> | <?=$page_title?></title>

    <!-- Meta -->
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    
    
    <?foreach($styles as $style) :?>
            <?=HTML::style($style)?>
<?endforeach?>
   

<?foreach($scripts as $script) :?>
            <?=HTML::script($script)?>
        <?endforeach?>
    </head>
    <body>
       
        
    <!--=== Top  ===-->
    <div class="top">
        <div class="container">
           <ul class="loginbar pull-right">
                 
                 <li>
                     <?=$cart?>
                 </li>
                
            
            <li class="devider"></li>   
            <li><a href="page_faq.html">Помощь</a></li>  
            <li class="devider"></li>   
            <?=$login?>
            
            
        </ul>
        </div><!--/container-->
    </div><!--/top-->
    <!--=== End Top  ===-->
    
    
    <!--=== Header ===-->
<div class="header">
    <div class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                   <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?=URL::base()?>">
                    <img id="logo-header" src="<?=URL::base()?>assets/img/logo1-default.png" alt="Logo">
                </a>
            </div>
            
            <div class="collapse navbar-collapse navbar-responsive-collapse">
                <ul class="nav navbar-nav navbar-right">
                    
                     <?=$topmenu?>  
                    
                    
                    
                                        
                    <li class="hidden-sm">
                        <a class="search"><i class="icon-search search-btn"></i></a></li>
                </ul>
                <div class="search-open">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Найти">
                        <span class="input-group-btn">
                            <button class="btn-u" type="button">Искать</button>
                        </span>
                    </div><!-- /input-group -->
                </div>                
            </div><!-- /navbar-collapse -->
        </div>
    </div>
</div><!--/header-->
<!--=== End Header ===-->

<!--=== Content Part  ===-->
<div class="container">
    
     <? if (isset($block_header)):?>
			<div class="col-lg-12" >
                            <br/>
				<?foreach($block_header as $hblock):?>
            
                        <?=$hblock?>
           
                    <?endforeach?>
                            
		 </div>	
       <?endif?>
    
    <? if (isset($block_left)):?>
		<div class="col-lg-3" >
			<?foreach($block_left as $lblock):?>
            
                        <?=$lblock?>
            
                    <?endforeach?>
		</div>
                <?endif?>
    
    
    <? if (isset($block_center)):?>
    <div class="col-lg-9" >
				<?foreach($block_center as $cblock):?>
            
                        <?=$cblock?>
            
                    <?endforeach?> 
		</div>	
                      <?endif?>
     <? if (isset($block_right)):?>
		<div class="col-lg-3" >
			<?foreach($block_right as $rblock):?>
            
                        <?=$rblock?>
            
                    <?endforeach?>
		</div>
                <?endif?>

</div><!--/container-->
<!--=== End Content Part  ===-->
                
<!--=== Footer ===-->
<div class="footer">
    <div class="container">
	 <div class="row">
            <div class="col-md-4 md-margin-bottom-40">
                  

                <!-- Monthly Newsletter -->
                <div class="headline"><h2>Ежемесячная Рассылка</h2></div> 
                <p>Подпишитесь на нашу ежемесячную рассылку и будете в курсе Лучших событий Москвы!</p>
                <form class="footer-subsribe">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Email Адрес">                            
                        <span class="input-group-btn">
                            <button class="btn-u" type="button">Подписаться!</button>
                        </span>
                    </div><!-- /input-group -->                    
                </form>                         
            </div><!--/col-md-4-->  
            <div class="col-md-4 md-margin-bottom-40"><!-- Monthly Newsletter -->
                <div class="headline"><h2>Контакты</h2></div> 
                <address class="md-margin-bottom-40">
                    
                    Телефон: +7 903 5097703 <br />
                    Телефон: +7 905 5892848<br />
                    Email: <a href="mailto: aplodismenty.ru@gmail.com" class="">aplodismenty.ru@gmail.com</a><br />
                    Skype: aplodis
                </address>

            </div>
            

            <div class="col-md-4">
                
                <!-- About -->
                <div class="headline"><h2>О нас</h2></div>  
                <p class="margin-bottom-25 md-margin-bottom-40">
                   
                    Билеты для VIP  клиентов.
                   Все зрелищные мероприятия Москвы.</p>  
                
            </div><!--/col-md-4-->
        </div>
    </div><!--/container-->
</div><!--/footer-->
<!--=== End Footer ===-->


<!--=== Copyright ===-->
<div class="copyright">
    <div class="container">
	    ...
	    ...
    </div><!--/container-->
</div><!--/copyright-->
<!--=== End Copyright ===-->

<!--[if lt IE 9]>
    <script src="assets/js/respond.js"></script>
<![endif]-->
               
  </body> 
</html>
<!DOCTYPE html>
<html lang="en">
  <head>
      <link type="text/plain" rel="author" href="<?=URL::base()?>humans.txt" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$site_title;?> | <?=$page_title?> | <?=$meta_title?></title>
	<meta name="keywords" content="<?=$keywords;?>" />
	
        <meta name="description" content="<?=$meta_description;?>">

        <?foreach($styles as $style) :?>
            <?=HTML::style($style)?>
        <?endforeach?>
	
        
        <?foreach($scripts as $script) :?>
            <?=HTML::script($script)?>
        <?endforeach?>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
      <div id="topleft" class="visible-lg">
          
      </div>
         <div id="topright" class="visible-lg">
          
      </div>
      <div id="page" class="container">
          
                  
                  
                  
              
          <header class="container">
              
              
             <div class="row">
            <div class="col-md-2" style="padding: 5px">
                <a href="<?=URL::base()?>">
                    <img src="<?=URL::base()?>media/images/logo_a.png" alt="Агентство Аплодисменты" class="img-responsive">
                    
                </a> 
                   
                 </div>
                
                     
                 <div class="col-md-3">
                 
                     <p>Заказ и доставка билетов в театр</p>
               
            
            <h2>8-495-509-77-03</h2>
  <p>С 10 до 22 часов</p>
                 </div>
              
                 <div class="col-md-3" style="padding-top: 30px">
                    
                      <?=$cart;?>
             
          </div>
                 <div class="col-md-4" style="padding-top: 30px">
                    
                   <?=$login?>
                     
                     
                 </div>
                 
                      
                  </div>
            
             <div class="row">
                  
              
              
             <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?=URL::base()?>">Агентство  Аплодисменты
    </a>
      
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
       <?=$topmenu?>    
        
          
          
              <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-microphone"></i>
 Жанры <span class="caret"></span></a>
          
           <?=$menu?>   
              </li> 
      </ul>
     <?=$search;?>
      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
 
              </div> 
                 
              
              
          </header>
          <section id="body" class="container" >
              
              
     <? if (isset($block_header)):?>
			<div class="col-md-12" >
                           
				<?foreach($block_header as $hblock):?>
            
                        <?=$hblock?>
           
                    <?endforeach?>
                            
		 </div>	
       <?endif?>
             
              <section id="sidebar" class="col-md-3">
                   <? if (isset($block_left)):?>
		<div class="" >
			<?foreach($block_left as $lblock):?>
            
                        <?=$lblock?>
            
                    <?endforeach?>
		</div>
                <?endif?>
                  
              </section>
              
              <section id="main" class="col-md-9">
                  <? if (isset($block_center)):?>
                   <div class="" >
				<?foreach($block_center as $cblock):?>
            
                        <?=$cblock?>
            
                    <?endforeach?> 
		</div>	
                      <?endif?>
                  
                  
              </section>
             
              
              
          </section>
          <hr />
          <footer class="container">
              <div class="row">
                    <div class="col-md-6">
<?=$downmenu?>
                    </div> 
                    <div class="col-md-2">
                        
                    </div> 
                    <div class="col-md-4">
                      
                        
                        <!-- SmartResponder.ru subscribe form code (begin) -->
<link rel="stylesheet" href="https://imgs.smartresponder.ru/e1bbeb24091b44f1f4048bbc87edacd11278fd23/">
<script type="text/javascript" src="https://imgs.smartresponder.ru/52568378bec6f68117c48f2f786db466014ee5a0/"></script>
<script type="text/javascript">
    _sr(function() {
        _sr('form[name="SR_form_288227_21"]').find('div#sr-preload_').prop('id', 'sr-preload_288227_21');
        _sr('#sr-preload_288227_21').css({'width':parseInt(_sr('form[name="SR_form_288227_21"]').width() + 'px'), 'height':parseInt(_sr('form[name="SR_form_288227_21"]').height()) + 'px', 'line-height':parseInt(_sr('form[name="SR_form_288227_21"]').height()) + 'px'}).show();
        if(_sr('form[name="SR_form_288227_21"]').find('input[name="script_url_288227_21"]').length) {
            _sr.ajax({
                url: _sr('input[name="script_url_288227_21"]').val() + '/' + (typeof document.charset !== 'undefined' ? document.charset : document.characterSet),
                dataType: "script",
                success: function() {
                    _sr('#sr-preload_288227_21').hide();
                }
            });
        }
    });
</script>
<div id="outer_alignment" align="center">
    <form style="width: 300px; border: 1px solid rgb(200, 200, 200); margin-left: ; border-radius: 6px;" class="sr-box" method="post" action="https://smartresponder.ru/subscribe.html" target="_blank" name="SR_form_288227_21">
        <input name="field_name" class="sr-name" type="text">
        <div id="sr-preload_" style="display: none; background-color: #f6f6f6; opacity: 0.5; position: absolute; z-index: 100; text-align: center; font: bold 15px Arial;">Загрузка...</div>
        <ul class="sr-box-list"><li class="sr-288227_21" style="text-align: center; background-color: rgb(248, 249, 250); border: 0px none; border-radius: 6px 6px 0px 0px; height: auto; padding: 3px 0px 20px;"><label style="font-family: arial; color: rgb(0, 0, 0); font-size: 16px; font-weight: bold; background: url('https://imgs.smartresponder.ru/on/482611c44d8af61664781139351780e8d8057ab3/') repeat-x scroll center bottom transparent; width: 100%; text-align: center; box-sizing: border-box; border-radius: 6px 6px 0px 0px; line-height: 25px; height: auto; padding: 15px 25px;" class="">Подписка на рассылку</label><input style="font-family: Arial; color: rgb(0, 0, 0); font-size: 12px; font-style: normal; font-weight: normal; background-color: rgb(255, 255, 255); border: medium none; box-shadow: none;" value="" name="element_header" type="hidden"></li><li class="sr-288227_21" style="background: none repeat scroll 0% 0% rgb(248, 249, 250); text-align: center; border-radius: 0px; height: 45px;"><label class="remove_labels" style="font-weight: normal; font-family: arial; color: rgb(0, 0, 0); font-size: 12px; font-style: normal; display: none;"></label><input value="Вашe имя" style="background-repeat: no-repeat; background-position: 95% 50%; background-image: none; font-weight: normal; font-family: arial; color: rgb(133, 133, 133); font-size: 12px; font-style: normal; border: 1px solid rgb(197, 200, 204); background-color: rgb(231, 233, 236); border-radius: 6px; height: 42px; box-shadow: none; margin-top: 0px;" name="field_name_first" type="text"></li><li class="sr-288227_21" style="background: none repeat scroll 0% 0% rgb(248, 249, 250); text-align: center; border-radius: 0px; height: 45px;">
<label class="remove_labels" style="font-weight: normal; font-family: arial; color: rgb(0, 0, 0); font-size: 12px; font-style: normal; display: none;"></label>
<input value="Ваш email-адрес" style="background-repeat: no-repeat; background-position: 95% 50%; background-image: none; font-weight: normal; font-family: arial; color: rgb(133, 133, 133); font-size: 12px; font-style: normal; border: 1px solid rgb(197, 200, 204); background-color: rgb(231, 233, 236); border-radius: 6px; height: 42px; box-shadow: none; margin-top: 0px;" name="field_email" class="sr-required" type="text">
            </li><li class="sr-288227_21" style="background: none repeat scroll 0% 0% rgb(248, 249, 250); text-align: center; border-radius: 0px 0px 6px 6px; border: 0px none; height: 78px;"><table id="elem_table_subscribe" style="display: inline-table; border-collapse: separate; width: 100%; margin-top: 15px;" border="0" cellpadding="0" cellspacing="0"><tbody><tr><td style="background: url('https://imgs.smartresponder.ru/on/2bf110fe18277b4affc8ff52263349c6c13ed215/') no-repeat scroll left center transparent; width: 3px; height: 47px;" id="elem_left_subscribe" valign="middle"></td><td id="elem_container_subscribe" style="vertical-align: middle;"><input style="font-family: arial; color: rgb(255, 255, 255); font-size: 14px; font-weight: bold; border: 0px solid rgb(240, 240, 240); background: url('https://imgs.smartresponder.ru/on/4620797d010531917de7061ed965366defb7a6c9/') repeat scroll left center transparent; height: 47px; width: 100%; margin: 0px; padding: 0px 34px; box-shadow: none;" name="subscribe" value="Подписаться" type="submit"></td><td style="background: url('https://imgs.smartresponder.ru/on/40ee2206012283b76a16affc350d93b1a7043de0/') no-repeat scroll left center transparent; width: 3px; height: 47px;" id="elem_right_subscribe"></td></tr></tbody></table></li></ul>
        <input name="uid" value="75263" type="hidden">
    <input name="did[]" value="62989" type="hidden"><input name="tid" value="0" type="hidden"><input name="lang" value="ru" type="hidden"><input value="https://imgs.smartresponder.ru/on/dc47aab649ed2857667697cf94fb8cd110e6f38f/288227_21" name="script_url_288227_21" type="hidden"></form>
</div>
<!-- SmartResponder.ru subscribe form code (end) -->
                    </div> 
              </div>
              
              
          </footer>
          
          
      </div>

    
   
  </body>
  
</html>


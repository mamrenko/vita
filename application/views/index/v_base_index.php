<!DOCTYPE html>
<html lang="en">
  <head>
      <link type="text/plain" rel="author" href="<?=URL::base()?>humans.txt" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$site_name;?> | <?=$page_title?></title>
	<meta name="keywords" content="<?=$keywords;?>" />
	<meta name="description" content="<?=$site_description;?>" />
        

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
      <div id="page" class="container">
          
                  
                  
                  
              
          <header class="container">
             <div class="row">
                 <div class="col-md-4">
                     <h3>Агентство Аплодисменты</h3>
                 </div>
                 <div class="col-md-2">
                    
                     <br> 
                      <?=$cart;?>
             
          </div>
                 <div class="col-md-3">
                     <br>
                     
                      <?=$login;?>
                     
                 </div>
                 <div class="col-md-3">
                    
  <h3>8-903-509-77-03</h3>
  <p>С 10 до 22 часов</p>

                     
                     
                 </div>
                      
                  </div>
            
             
              <div class="row">
                  
              
              
             <nav class="navbar navbar-default navbar-static-top" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?=URL::base()?>">Агентство  Аплодисменты</a>
      
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
       <?=$topmenu?>    
        
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
                    <div class="col-md-4">
                       
                    </div> 
                    <div class="col-md-4">
                        
                    </div> 
                    <div class="col-md-4">
                        
                    </div> 
              </div>
              
              
          </footer>
          
          
      </div>

    
   
  </body>
  
</html>


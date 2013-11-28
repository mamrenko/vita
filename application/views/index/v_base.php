<!doctype html>
<html>
<head>
<meta charset="UTF-8">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title><?=$site_title?> | <?=$page_title?></title>
<meta name="keywords" content="" />
<meta name="description" content="" />
 <?foreach($styles as $style) :?>
            <?=HTML::style($style)?>
<?endforeach?>


<?foreach($scripts as $script) :?>
            <?=HTML::script($script)?>
        <?endforeach?>
</head>

<body>
    
<div id="page">
    <header  class="container">
        <div id="menu" class="navbar navbar-default ">
            <div class="navbar-header">
            <button class="btn btn-success navbar-toggle"
                    data-toggle="collapse"
                    data-target=".navbar-collapse"><span class="glyphicon glyphicon-chevron-down"></span>
              
            </button>
            
            <div id="logo">
                <a href=".">
                    <h3><?=$site_name?></h3>
                </a>
           </div>
           </div>
            
            
           
          <form class="navbar-form navbar-right">
            <div class="form-group">
              <input type="text" placeholder="Email" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
          </form>
            
            
            
           
            
        </div>
        
    </header>
    
    
    
    <section id="body"  class="container">
        
        <div class="page-header">
            <div class="row">
          <div class="col-lg-5">
              
            <h1><?=$site_title?></h1>
            <p class="lead"><?=$site_description?></p>
            
             
            
            
          </div>
            
                 <div class="col-lg-7">
                     
                     <div class="navbar-collapse">
               
            <ul class="nav navbar-nav navbar-right">

                         <?=$topmenu?> 
                          <?=$cart?>

            </ul>
            
            </div>
                     
                     
               </div>
            
            </div>
        </div>
      
    	<section id="main" class="col-md-9">
             <? if (isset($block_header)):?>
			
				<?foreach($block_header as $hblock):?>
                            
                        <?=$hblock?>
                    <?endforeach?> 
			
       <?endif?>
            
           <? if (isset($block_center)):?>
			
				<?foreach($block_center as $cblock):?>
                            
                        <?=$cblock?>
                    <?endforeach?> 
			
                      <?endif?>


       </section>
        <section id="sidebar" class="col-md-3">
             <? if (isset($block_right)):?>
		
			<?foreach($block_right as $rblock):?>
                        <?=$rblock?>
                    <?endforeach?>
		
                <?endif?>
        </section>
    </section>
    <hr/>
    <footer  class="container">
    <p class="text-info">
        <?=$author?>
    </p>
    </footer>




</div>
   
</body>
</html>

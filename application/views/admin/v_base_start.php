<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<title><?=$site_name?> | <?=$page_title?></title>
	
        
        <?foreach($styles as $style) :?>
            <?=HTML::style($style)?>
        <?endforeach?>
	
        
        <?foreach ($scripts as $file_script):?>
        <?=html::script($file_script)?>
        <?endforeach?>
</head>

<body>

<div class="wrapper">

	<header class="header">
		 <h2><?=$site_description?></h2>
           
          <?=$menu_admin?>
	</header><!-- .header-->

	<div class="middle">

		<div class="container">
                       <? if (isset($block_center)):?>
			<main class="content">
				<?foreach($block_center as $cblock):?>
                            
                            <h1><?=$page_title?></h1>
                            
                        <?=$cblock?>
                            <?endforeach?> 
			</main><!-- .content -->
                           <?endif?>
		</div><!-- .container-->
                 <? if (isset($block_left)):?>
		<aside class="left-sidebar">
			<?foreach($block_left as $lblock):?>
                        <?=$lblock?>
                    <?endforeach?>
		</aside><!-- .left-sidebar -->
                 <?endif?>
	</div><!-- .middle-->

</div><!-- .wrapper -->

<footer class="footer">
	 <h2>copiright Aplodismenty.ru</h2>
</footer><!-- .footer -->

</body>
</html>
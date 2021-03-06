<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8" />
	<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<title><?=$site_name?> | <?=$page_title?></title>
	
        
        <?foreach($styles as $style) :?>
            <?=HTML::style($style)?>
        <?endforeach?>
	
        
        <?foreach ($scripts as $file_script):?>
        <?=html::script($file_script)?>
        <?endforeach?>
	
</head>

<body>

<div id="wrapper">

	<header id="header">
           
            <h2><?=$site_description?></h2>
           
          <?=$menu_admin?>
           
	</header><!-- #header-->

	<section id="middle">

		<div id="container">
                    
                     <? if (isset($block_center)):?>
			<div id="content">
			<?foreach($block_center as $cblock):?>
                            <h1><?=$page_title?></h1>
                            
                        <?=$cblock?>
                        <?endforeach?> 
			</div><!-- #content-->
                      <?endif?>
                        
                </div><!-- #container-->

                <? if (isset($block_left)):?>
		<aside id="sideLeft">
                    <?foreach($block_left as $lblock):?>
                        <?=$lblock?>
                    <?endforeach?>
		
		</aside><!-- #sideLeft -->
                <?endif?>
                
                
                <? if (isset($block_right)):?>
		<aside id="sideRight">
			<?foreach($block_right as $rblock):?>
                        <?=$rblock?>
                    <?endforeach?>
		</aside><!-- #sideRight -->
                <?endif?>
	</section><!-- #middle-->

</div><!-- #wrapper -->

<footer id="footer">
    <h2>copiright Aplodismenty.ru</h2>
</footer><!-- #footer -->

</body>
</html>
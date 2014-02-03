<!DOCTYPE html>
<html>
  <head>
    <title><?=$site_name?> | <?=$page_title?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    
  <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	
        <?foreach($styles as $style) :?>
            <?=HTML::style($style)?>
        <?endforeach?>
  </head>
  <body>
      <div id="wrapper">
          <header id="header">
 
		<h1 id="site-logo">
			<a href=".">
                            <img src="<?=URL::base()?>canvas/img/logos/logo.png" alt="Site Logo" />

			</a>
		</h1>	

		<a href="javascript:;" data-toggle="collapse" data-target=".top-bar-collapse" id="top-bar-toggle" class="navbar-toggle collapsed">
			<i class="fa fa-cog"></i>
		</a>

		<a href="javascript:;" data-toggle="collapse" data-target=".sidebar-collapse" id="sidebar-toggle" class="navbar-toggle collapsed">
			<i class="fa fa-reorder"></i>
		</a>

	</header> <!-- header -->
          
        <nav id="top-bar" class="collapse top-bar-collapse">
       
                
		<ul class="nav navbar-nav pull-left">
			<li class="">
				<a href="<?=URL::base()?>">
					<i class="fa fa-home"></i> 
					На сайт
				</a>
			</li>
                        <?=$menu_admin?>
                         
			<li class="dropdown">
		    	<a class="dropdown-toggle" data-toggle="dropdown" href="javascript:;">
		        	Dropdown <span class="caret"></span>
		    	</a>

		    	<ul class="dropdown-menu" role="menu">
			        <li><a href="javascript:;"><i class="fa fa-user"></i>&nbsp;&nbsp;Example #1</a></li>
			        <li><a href="javascript:;"><i class="fa fa-calendar"></i>&nbsp;&nbsp;Example #2</a></li>
			        <li class="divider"></li>
			        <li><a href="javascript:;"><i class="fa fa-tasks"></i>&nbsp;&nbsp;Example #3</a></li>
		    	</ul>
		         </li>
		    
		</ul>
 <?=$adminlogin?>
		

	</nav> <!-- /#top-bar -->
        
        
         <div id="sidebar-wrapper" class="collapse sidebar-collapse">
	
		<div id="search">
			<form>
				<input class="form-control input-sm" type="text" name="search" placeholder="Search..." />

				<button type="submit" id="search-btn" class="btn"><i class="fa fa-search"></i></button>
			</form>		
		</div> <!-- #search -->
	
		<nav id="sidebar">
                    <ul id="main-nav" class="open-active">			

				
                    
                     <? if (isset($block_left)):?>
		
			<?foreach($block_left as $lblock):?>
                        <?=$lblock?>
                    <?endforeach?>
		
                 <?endif?>
                    </ul>  
                    
                </nav> <!-- #sidebar -->

                
                
	</div> <!-- /#sidebar-wrapper -->
            <div id="content">    
        <div id="content-header">
            <h1><?=$site_description?></h1>
        </div> <!-- #content-header -->    
        <div id="content-container">
            <? if (isset($block_center)):?>
			
				<?foreach($block_center as $cblock):?>
                           <div class="row">
                               <div class="col-md-6">
                                   <span style="font-size: 20px">
                                   <span class="label label-default">
                             <?=$page_title?>
                                    </span>
                                   </span>
                               </div>
                            </div>
                        <?=$cblock?>
                            <?endforeach?> 
			
                           <?endif?>
            
            
            
        </div> <!-- /#content-container -->            
        
    </div> <!-- #content -->
          
      </div><!--      End wrapper-->
    <footer id="footer">
	<ul class="nav pull-right">
		<li>
			Copyright &copy; 11/2013, Aleksandra Mamrenko.
		</li>
	</ul>
   </footer>
    
<?foreach ($scripts as $file_script):?>
        <?=html::script($file_script)?>
        <?endforeach?> 
      
  </body>
</html>

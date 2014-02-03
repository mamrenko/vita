<ul class="nav navbar-nav pull-right">
			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="javascript:;">
					<i class="fa fa-user"></i>
                                        <?if ($auth->logged_in('admin')):?>
		        	        <?=$user->email?>
                                        <? endif; ?>

		        	<span class="caret"></span>
		    	</a>
                      
		    	<ul class="dropdown-menu" role="menu">
                            <?if ($auth->logged_in('admin')):?>
			        <li>
			        	<a href="./page-profile.html">
			        		<i class="fa fa-user"></i> 
			        		&nbsp;&nbsp;Мой профайл
			        	</a>
			        </li>
			        <li>
			        	<a href="./page-calendar.html">
			        		<i class="fa fa-calendar"></i> 
			        		&nbsp;&nbsp;Мой календарь
			        	</a>
			        </li>
			        <li>
			        	<a href="./page-settings.html">
			        		<i class="fa fa-cogs"></i> 
			        		&nbsp;&nbsp;Настройки
			        	</a>
			        </li>
                                 <? endif; ?>
			        <li class="divider"></li>
			        <li>
                                    <?=html::anchor('logout', '<i class="fa fa-sign-out"></i> &nbsp;&nbsp; Выйти',array(
                                      ''  ,
                                    ))?>
			       
			        </li>
		    	</ul>
		    </li>
		</ul>

<!--<i class="fa fa-sign-out"</i>-->
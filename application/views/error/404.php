<div class="row">
      <div class="col-md-4">
        
        <img src="<?=URL::site('/media/images/404.png', TRUE)?>">
        
    </div>
    <div class="col-md-8">
        
<h1><strong>404 Ошибка:</strong> Страница не найдена</h1>

<p>Запрашиваемая страница <?php echo HTML::anchor($requested_page, $requested_page) ?> не найдена.</p>
 
<p>Страница либо не существующая, перемещена или удалена.
Убедитесь, что адрес верен.</p>
 

 
<p><a href="<?php echo URL::site('/', true) ?>">Если вы хотите пойти на главную страницу вместо этого, нажмите здесь.</a>
</p>
</div>
  
</div>
<div class="row">
    
    <div class="well">
    <h1>Новости</h1>
</div>
<?foreach ($all_news as $news):?>
    
  
  <h2><?=HTML::anchor('news/get/' . $news->id, $news->title)?></h2>
   <?=date('d-m-Y',strtotime($news->day));?>
 <?=$news->content?>
  
  <?=HTML::anchor('news/get/' . $news->id, '<button class="btn btn-primary btn-lg" type="button">  Читать полностью...</button>')?>
 

  <hr>
    
    
   
<?endforeach?>
</div>
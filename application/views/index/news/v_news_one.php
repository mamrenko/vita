
<div class="row">
<ol class="breadcrumb">
     
     <li><a href="<?=URL::base()?>news">Все Новости</a></li>
     <li class="active"><?=$news->title?></li>
  
</ol>
<div class="well">
    <h1><?=$news->title?></h1>
</div>

<p><?=date('d-m-Y',strtotime($news->day));?></p>

 <img class="img-responsive img-thumbnail pull-right" src="<?=URL::base();?>media/uploads/news/<?=$news->image;?>"
                              alt="<?=$news->title;?>">
        <?=$news->content?>


</div>
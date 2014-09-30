
    
  <ol class="breadcrumb">
     <li><a href="<?=URL::base()?>places">Площадки</a></li>
     <li><a href="<?=URL::base()?>places/place/<?=$artist->place->id;?>"><?=$artist->place->title;?></a></li>
     <li class="active"><?=$artist->name;?></li>
  
</ol>
  <div class='row'>
    <div class="well">
<h1 ><?=$artist->name;?></h1>
</div>
    
    <div class="jumbotron">
        <h3><?=$artist->name?> | <?=HTML::anchor('places/place/'.$artist->place->id, $artist->place->title)?></h3>
<p>  <img class="img-circle img-thumbnail pull-right" src="<?=URL::base();?>media/uploads/artists/<?=$artist->image;?>" class="img-responsive" alt="<?=$artist->name?> | <?=$artist->place->title?>">

  <p><?=$artist->description?></p>
  

  <?foreach ($playbills as $playbill):?>
       <? $events = ORM::factory ('event')
                ->where ('playbill_id', '=', $playbill->id)
                ->group_by('playbill_id')
                ->and_where('day', '>=', date('Y-m-d'))
                ->find_all();

  ?>   
<?foreach ($events as $event):?>
  
 
 
 
     <p><a class="btn btn-primary btn-lg" 
        role="button" <?=HTML::anchor('/event/'.$event->playbill_id,$event->playbill->title )?>
               </a></p>
    
    <?
endforeach;?>
   <?
endforeach;?>
</div>

</div>
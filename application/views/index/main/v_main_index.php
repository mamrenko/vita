
<div class="row">
            
            <br />
         <ul class="list-unstyled">
             <?foreach ($events as $event):?>

                <li class="col-md-4">
                <div class="thumbnail ">
                    <a href="event/one/<?=$event->playbill->id;?>">
 <?=HTML::image('media/uploads/playplaces/'.$event->playbill->image, array(
                  'class' => 'img-responsive',  
                ));?>   
                    </a>  
               
                <div class=" caption">
                    <?=HTML::anchor('places/place/'. $event->place_id,'<h4>'. Text::limit_chars($event->playbill->place->title, 20).'</h4>');?>
                <h4><?=HTML::anchor('event/one/'.$event->playbill->id,Text::limit_chars($event->playbill->title, 20));?></h4>
                <p><?=  Text::limit_chars($event->playbill->subtitle, 25 );?></p>
                <p>
                    <?=HTML::anchor('event/one/'.$event->playbill->id, 'Подробнее', array(
                         'class' => 'btn btn-success',
                        'role' => 'button',
                    ));?>
                </p>
                
                </div>
                </div>
                    <br />
            <?endforeach;?>    

            </ul>
        </div>

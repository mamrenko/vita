<!--=== Breadcrumbs ===-->
<div class="breadcrumbs margin-bottom-10">
    <div class="container">
        <h3><?=$scene->place->title;?>   <?=$scene->title;?></h3>
        <ul class="breadcrumb">
            <li>
                <a href="<?=URL::base()?>/places">Площадки</a>
            </li>

 
            <li class="active"><?=HTML::anchor('places/one/'.$scene->place->id,$scene->place->title);?>
            </li>
            <li>
              <?=$scene->title;?>  
            </li>
        </ul>
    </div>
</div><!--/breadcrumbs-->
<div class="row">
    
    <div class="col-md-6">
                    <div class="bg-light">
                        <h4><i class="icon-align-justify"></i><?=$scene->place->title;?> -  <?=$scene->title;?></h4>
                        <p><?=HTML::image('media/uploads/scenes/small_'.$scene->image, array(
                                    'class' => 'img-thumbnail',
                                    'width' => 100,
                             ));?>
                        </p>
                      
                    </div>
                </div> 
    



    
    
</div>

<div class='row'>
    <div class='col-md-12'>
        <table  id="rectb" class="table table-hover">

             
           <thead>
               <tr>
                <th></th>
                <th>Название</th>
                <th></th>
                <th>Дата</th>
                <th>Начало</th>
                 <th></th>
             </tr>
           </thead>
           <?foreach($events as $event):?>
         
           <tr> 
               
               <td> <?=HTML::image('media/uploads/playplaces/small_'.$event->playbill->image, array(
                   'class' => 'img-thumbnail',
                     'width' => 100,
               ));?></td> 
               <td> <?=$event->playbill->title;?></td> 
               <td> <?=$event->playbill->subtitle;?></td> 
               <td> <?=date('d-m-Y',strtotime($event->day));?></td> 
               <td> <?=$event->tart->start?></td>
               <td><button type="button" class="btn btn-success">Заказать</button></td>
           </tr>
           
              <?endforeach;?>
           <tbody>
               
               
           </tbody>
       </table>
        
        
       
    </div>
    
    
    
    
</div>

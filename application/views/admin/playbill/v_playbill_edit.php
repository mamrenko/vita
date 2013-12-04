<div class='row'>
    <div class="col-md-4">
        <div class="portlet">
 
<div class="portlet-header">
    <p>
  
      
      <?=HTML::anchor('admin/playbill/list/'.$playbill->place_id, '<button class="btn btn-info" type="button"><i class="fa fa-reply"></i> Вернуться</button>')?>
</p>

</div>
<div class="portlet-content">
    <div class="well">
    <h4></i><?=$playbill->title?></h4>
    <h4><?=$playbill->place->title?></h4>
   <h4>Начало мероприятия <?=$playbill->starts->start?></h4> 
   <h4>Сцена: <?=$playbill->scene->title?></h4>
    </div>
</div>
        </div>
    </div>
    <div class="col-md-4">
    <div class="portlet">
        <div class="portlet-header">
      <p>
       <?=HTML::anchor('admin/costs/add/'.$playbill->id, '<button class="btn btn-success" type="button"><i class="fa fa-plus"></i> Добавить Цены</button>')?>
      </p>
      <h3>Ценовые категории</h3>
         </div>
        <div class="portlet-content">
<table class="table table-bordered table-highlight">
    <thead>
<tr>
    
    <th>Сектор</th>
    <th>Цены</th>
    <th>Функции</th>
    
</tr>
</thead>
    
    
    
       <?if(count($playbill->costs->find_all()) > 0):?> 
         <?$costs = $playbill->costs->find_all()?>
        <?foreach($costs as $cost):?>
 <tr>   
     <td>    
           <?=$cost->area->title?>
     </td>
     <td>
         <?=$cost->price?> руб.
     </td> 
       
   
    <td>
      
            <?=HTML::anchor('admin/costs/edit/'.$cost->id, '<button class="btn btn-secondary" type="button">
								<i class="fa fa-pencil"></i></button>')?>
       <?if(count($playbill->costs->find_all()) >1):?> 
            <?=HTML::anchor('admin/costs/delete/'.$cost->id, '<button class="btn btn-danger" type="button">
								<i class="fa fa-times"></i></button>')?>
         <?endif?>
    </td>
</tr>
    <?endforeach?>

     
</table> 
    <?else:?>
          <ul class="portlet-tools pull-right">
								
                <li>
	     <span class="label label-info">Здесь нет Цен</span>
             
                </li>
                </ul>  
            
        
      <?=HTML::anchor('admin/costs/add/'.$playbill->id, '<button class="btn btn-success" type="button"><i class="fa fa-plus"></i> Добавить Цены</button>')?>
      <?=HTML::anchor('admin/costs/add/'.$playbill->id, 'Цены')?>
        <?endif?>
 
        </div>
     
    </div>
        
        </div>
</div>
         
        <?if(count($playbill->events->find_all()) > 0):?> 
         <?$events = $playbill->events->find_all()?>
       
        
      


<div class="row">

    <div class="col-md-8">
        <div class="portlet">
            <div class="portlet-header">
                <p>
                <?=HTML::anchor('admin/events/add/'.$playbill->id, '<button class="btn btn-success" type="button"><i class="fa fa-plus"></i> Добавить События</button>')?>
                </p>
                <h3>События</h3>
              </div>
            <div class="portlet-content">
<table id="placetb" class="table table-bordered table-highlight">
    <thead>
<tr>
    
    <th>Дата</th>
    <th>На Главной</th>
    <th>Жанры</th>
    
    <th>Функции</th>
    
</tr>
</thead>
    
    
    
    
        <?foreach($events as $event):?>
 <tr>   
     <td>    
            <?=date('d-m-Y',strtotime($event->day));?>
     </td>
     <td>
         <?if($event->status > 0):?> 
На Главной
<?else:?>
    Не показано на главной
         <?endif?>
     </td> 
     <td>
      <?$categories = $event->categories->find_all();?> 
        <?foreach($categories as $cat):?>
         <p><?=$cat->title?></p>
         <?endforeach;?>

     </td>
   
    <td>
      
            <?=HTML::anchor('admin/events/edit/'.$event->id, '<button class="btn btn-secondary" type="button">
								<i class="fa fa-pencil"></i></button>')?>
       
            <?=HTML::anchor('admin/events/delete/'.$event->id, '<button class="btn btn-danger" type="button">
								<i class="fa fa-times"></i></button>')?>
     
    </td>
</tr>
    <?endforeach?>
    
</table> 
                
                
                
    <?else:?>
               

    <div class="col-md-8">
                <div class="portlet">
                    <div class="portlet-header">
                        <h3>Здесь нет Событий</h3>
                    </div>
                <div class="portlet-content">
        
        
      <?=HTML::anchor('admin/events/add/'.$playbill->id, '<button class="btn btn-success" type="button"><i class="fa fa-plus"></i> Добавить События</button>')?>
     
        
                </div></div>
                </div>
        <?endif?>
        </div>
        </div>
    </div>
</div>
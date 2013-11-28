<div class="row">
    <div class="col-md-8">
        <div class="portlet">
            <div class="portlet-header">
<h3>
Страница Мероприятий 

</h3>

                <ul class="portlet-tools pull-right">
								
                    <li>
                            <span class="label label-primary">На сайте показываются только События</span>
                    </li>
                    </ul>
</div>
            <div class="portlet-content">
<table class="table table-bordered table-highlight">
    <thead>
        <tr>
            <th>Список мероприятий Площадки</th>


            <th>Добавить мероприятие</th>
            <th>Сцены</th>

        </tr>
    </thead>
<tr>
    <?foreach ($places as $place):?>

   <?if(count($place->scenes->find_all()) > 0):?>
    <td>
        <?=HTML::anchor('admin/playplaces/list/'.$place->id, $place->title)?>
        <p>Список мероприятий</p>
    </td>
   
   
    <td>
        
          <?=HTML::anchor('admin/playplaces/add/'. $place->id, HTML::image('media/images/add.png'))?>
          <?=HTML::anchor('admin/playplaces/add/'. $place->id, 'Добавить Мероприятие')?>
    </td>
    <td>
        <?$scenes = $place->scenes->find_all()?>
        <?foreach($scenes as $scene):?>
        <p><?=$scene->title?></p>
        <?endforeach?>
    </td>
    
        <?else:?>
    <td>
        <?=$place->title?>
    </td>
    <td><p>Нужны сцены  </p></td>
       <td>
        <h3>Здесь нет сцен</h3>
        <?=HTML::anchor('admin/scenes/add/'.$place->id, HTML::image('media/images/add.png'))?>
        <?=HTML::anchor('admin/scenes/add/'.$place->id, 'Добавить Сцену')?>
        </td>
         <?endif?>
    
 
</tr>
    <? endforeach; ?>  
</table>
    </div>
       </div>
        </div>
         </div>


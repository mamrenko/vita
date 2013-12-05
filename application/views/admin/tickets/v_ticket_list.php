<div class="row">
    <div class="col-md-9">
        <div class="portlet">
            <div class="portlet-header">
                <p>
                <?=HTML::anchor('admin/tickets/add/'.$event->id, '<button class="btn btn-success" type="button"><i class="fa fa-plus"></i> Добавить Билеты</button>')?>
                </p>
                <p>
                <?=HTML::anchor('admin/tickets/', '<button class="btn btn-success" type="button"><i class="fa fa-plus"></i> На список событий</button>')?>
                </p>
                <h2>
                 Билеты на событие  | 
 <?=$event->playbill->place->title?> | 
 <?=$event->playbill->title?> | 
        <?=$event->playbill->starts->start?> |
  <?=$event->playbill->scene->title?> |
    <?=date('d-m-Y',strtotime($event->day));?>
                </h2>
                
                <ul class="portlet-tools pull-right">
								
                <li>
                        <span class="label label-primary">Всего Билетов : <?=count($tickets);?></span>
                </li>
                </ul>

            </div>
            <div class="portlet-content">
                <?if(count($tickets)> 0):?>
                <table id="placetb" class="table table-bordered table-highlightab">
                    <thead>
                        <tr>
                            <td>
                               Сектор 
                            </td>
                            <td>
                                Ряд
                            </td>
                            <td>
                                Место
                            </td>
                            <td>
                                Цена
                            </td>
                            <td>
                                Функции
                            </td>
                        </tr>
                        
                    </thead>
                        <?foreach($tickets as $ticket):?>
                    <tr>
                       
                            <td>
                               <?=$ticket->sector?> 
                            </td>
                            <td>
                               <?=$ticket->row?> 
                            </td>
                            <td>
                               <?=$ticket->seat?> 
                            </td>
                            <td>
                               <?=$ticket->cost?> 
                            </td>
                            <td>
                                 <?=HTML::anchor('admin/tickets/edit/'.$ticket->id, '<button class="btn btn-secondary" type="button">
								<i class="fa fa-pencil"></i></button>')?>
         <?=HTML::anchor('admin/tickets/delete/'.$ticket->id, '<button class="btn btn-danger" type="button">
								<i class="fa fa-times"></i></button>')?>
                            </td>
                        </tr>
                     <?endforeach;?>
                    
                    
                </table>
                <?else:?>
                
                <ul class="portlet-tools pull-left">
								
                <li>
                        <span class="label label-primary">Нет Билетов</span>
                </li>
                </ul>
                <?endif?>
            </div>
            </div>
        </div>
    </div>





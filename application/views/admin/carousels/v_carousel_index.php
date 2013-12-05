<div class="row">
    <div class="col-md-10">
        <div class="portlet">
            <div class="portlet-header">
                <p>
                <?=HTML::anchor('admin/carousels/add', '<button class="btn btn-success" type="button"><i class="fa fa-plus"></i> Добавить</button>')?>
                </p>
                <h3>Карусель на Главной странице</h3>
                <ul class="portlet-tools pull-right">
								
                <li>
	     <span class="label label-info">Должно быть не менее 3х баннеров</span>
            
                </li>
                <li>
                     <span class="label label-primary">Картинки размером 600 на 300 пикселей</span>
                </li>
                <li>
                    <span class="label label-primary">Больше 4 баннеров не показывается</span>
                </li>
                </ul>

         </div>         
            <div class="portlet-content">
                
       <?if(count($carousels)>0):?>    

           
              <table id="placetb" class="table table-bordered table-highlight">
                <thead>
                  <tr>
                    
                    <th>Название</th>
                    <th>Описание</th>
                    <th>Картинка</th>
                    <th>Показана </th>
                    <th>Окончание Показа</th>
                    <th>Ссылка</th>
                    <th>Функции</th>
                  </tr>
                </thead>
                <tbody>
                 
                 
                  <?foreach ($carousels as $carousel):?>
                  <tr>
                      
                    <td><?=HTML::anchor('admin/carousels/edit/'.$carousel->id, $carousel->title)?></td>
                    <td><?=$carousel->description?></td>
                    <td>
                        
                         <?if($carousel->image == NULL):?>
                            <?=HTML::image('/media/images/placeoff.jpg', array(
                                    'class' => 'img-thumbnail',
                                     'width' => 100,
                            ))?>

                            <?else:?>
                             <?=HTML::image('media/uploads/carousels/'.'small_'.$carousel->image, array(
                            'class' => 'img-thumbnail',
                            'width' => 100,
                        ))?>
                         <?endif?>
                        
                       
  
                    </td>
                    <td>
                        <?if($carousel->label > 0):?>
                        <p>Показана</p>
                        <?else:?>
                         <p>Не Показана</p>
                           <? endif;?>     
  
                    </td>
                    <td>
                        <?=date('d-m-Y',strtotime($carousel->day));?>
                    </td>
                    <td>
                       <?=$carousel->link?> 
                    </td>
                    <td>
                         <?=HTML::anchor('admin/carousels/edit/'. $carousel->id, '<button class="btn btn-secondary" type="button">
								<i class="fa fa-pencil"></i></button>')?>

                         <?=HTML::anchor('admin/carousels/delete/'. $carousel->id, '<button class="btn btn-danger" type="button">
								<i class="fa fa-times"></i></button>')?></td>
                    
                  </tr>
                   <? endforeach; ?>  
                  
                </tbody>
              </table>
            
          

<?endif;?>
</div>
          
         </div>
            </div>
            </div>


      
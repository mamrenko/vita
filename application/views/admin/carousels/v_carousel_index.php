<div class="row">
    <div class="col-md-8">
        <div class="portlet">
            <div class="portlet-header">
                <p>
                <?=HTML::anchor('admin/carousels/add', '<button class="btn btn-success" type="button"><i class="fa fa-plus"></i> Добавить</button>')?>
                </p>
                <h3>Карусель на Главной странице</h3>
                <ul class="portlet-tools pull-right">
								
                <li>
	     <span class="label label-info">Должно быть не менее 3х баннеров</span>
             <span class="label label-primary">Картинки размером 600 на 300 пикселей</span>
                </li>
                </ul>

         </div>         
            <div class="portlet-content">
                
       <?if(count($carousels)>0):?>    

           
              <table class="table table-bordered table-highlight">
                <thead>
                  <tr>
                    
                    <th> Название</th>
                    <th>Описание</th>
                    <th>Картинка</th>
                    <th>Функции</th>
                  </tr>
                </thead>
                <tbody>
                 
                 
                  <?foreach ($carousels as $carousel):?>
                  <tr>
                      
                    <td><?=HTML::anchor('admin/carousels/edit/'.$carousel->id, $carousel->title)?></td>
                    <td><?=$carousel->description?></td>
                    <td>
                        <?=HTML::image('media/uploads/carousels/'.'small_'.$carousel->image)?>
  
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


      
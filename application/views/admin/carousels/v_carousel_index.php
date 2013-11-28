<div class="row">
          <div class="col-lg-12">
              <p>
<?=HTML::anchor('admin/carousels/add', HTML::image('media/images/add.png'))?>
    
<?=HTML::anchor('admin/carousels/add', 'Добавить')?>
</p>
<br/>
              
             
       <?if(count($carousels)>0):?>    

            <div class="bs-example table-responsive">
              <table class="table table-striped table-bordered table-hover">
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
                  <tr class="success">
                      
                    <td><?=HTML::anchor('admin/carousels/edit/'.$carousel->id, $carousel->title)?></td>
                    <td><?=$carousel->description?></td>
                    <td>
                        <?=HTML::image('media/uploads/carousels/'.'small_'.$carousel->image)?>
  
                    </td>
                    <td>
                         <?=HTML::anchor('admin/carousels/edit/'. $carousel->id, HTML::image('media/images/edit.png'))?>

                         <?=HTML::anchor('admin/carousels/delete/'. $carousel->id, HTML::image('media/images/delete.png'))?></td>
                    
                  </tr>
                   <? endforeach; ?>  
                  
                </tbody>
              </table>
            
          </div>

<?endif;?>

          </div><!-- /example -->
          </div>


      
<div class="row">
    <div class="col-md-6 col-md-offset-1">
        
        <div class="portlet">
            <div class="portlet-header">


<?if($errors):?>
<?foreach ($errors as $error):?>

            <ul class="portlet-tools pull-right">
								
                  <li>
                      <span style="font-size: 18px">
                          <span class="label label-primary">
                            <?=$error?>
                          </span>
                        </span>
		  </li>
		</ul>
<?endforeach?>
<?endif?>
                 <p><?=HTML::anchor('admin/artists', '<button class="btn btn-warning" type="button"><i class="fa fa-reply-all"></i> Вернуться на список площадок</button>')?></p>
<p>
  
      <?=HTML::anchor('admin/artists/list/'.$id, '<button class="btn btn-info" type="button"><i class="fa fa-reply"></i>  Вернуться ' .$place->title.' </button>')?>
     
</p>

<h3>Добавляем в труппу <?=$place->title?></h3>
            </div>
  <div class="portlet-content">
      
      <?=Form::open('admin/artists/add', array(
          'enctype' => 'multipart/form-data',
           'id' => 'validate-basic',
           'class' => 'form parsley-form',
           'data-validate' => 'parsley',
          ));?>
    
           
           
           <div class="form-group">
               <?=Form::label('name', 'Имя Актера')?>
               <?=Form::input('name', $data['name'], array(
                   'type' =>'text',
                   'placeholder' => 'Минимум 3 буквы, максимум 120',
                   'class' => 'form-control',
                   'data-required' => 'true',
                   'data-minlength' => '3',
                   'data-maxlength' => '120',
                   ))?>
          </div>
           
           
           
           
           
          <div class="form-group">
               <?=Form::label('description', 'Описание Актера')?>
              <?=Form::textarea('description', $data['description'], array(
                  'class' => 'form-control ckeditor',
                  'cols' => 10, 
                  'rows' => 5,
                  
                  'data-minlength' => '50',
                  'data-maxlength' => '3000',
                  //'data-required' => 'true',
                  'name' => 'description',
                 
                  ))?>
              
                
          </div>
      
       <div class="form-group">
           
           <?=Form::hidden('place_id', $place->id)?>
           
       </div>
                       
            <div class="form-group">
                    <?=Form::label('image', 'Загрузить изображение:')?>
            </div>
          
           
      
      <div class="fileupload fileupload-new" data-provides="fileupload">
		<div class="fileupload-preview thumbnail" style="width: 200px; height: 150px;"></div>
		 <div>
		<span class="btn btn-default btn-file">
                    <span class="fileupload-new">Выберите фото актера</span>
                    <span class="fileupload-exists">Изменить</span>
                    
                    <?=Form::file('image')?>
                </span>
			<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Удалить</a>
			</div>
			</div>

      
     
      
      
      
      
      
      
           
          <div class="form-group">
                    
                      <?=Form::button('submit', 'Сохранить', array(
                          'type' => 'submit',
                          'class' => 'btn btn-primary',
                          ));?>
                    
                  </div>
   <?=Form::close()?>
</div> </div> 
            </div> 
    </div> 
 
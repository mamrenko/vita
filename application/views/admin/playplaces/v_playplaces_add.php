<div class="row">
    <div class="col-md-9">
        <div class="portlet">
            <div class="portlet-header">

<?if($errors):?>
<?foreach ($errors as $error):?>
<ul class="portlet-tools pull-right">
								
                  <li>
                      <span style="font-size: 18px"><span class="label label-primary"><?=$error?></span>
                        </span>
		  </li>
		</ul>
<?endforeach?>
<?endif?>


<p>  <?=HTML::anchor('admin/playplaces/list/'. $place->id, '<button class="btn btn-info" type="button"><i class="fa fa-reply"></i>  Вернуться  '.$place->title.'</button>')?>
 
</p>
<h1><?=$place->title?></h1>
</div>
            <div class="portlet-content">

       <?=Form::open('admin/playplaces/add/'.$id, array(
            'enctype' => 'multipart/form-data',
            'id' => 'validate-basic',
           'class' => 'form parsley-form',
           'data-validate' => 'parsley',
           ));?>
       
           
                <div class="row">
                    <div class="col-md-6">
                    
          <div class="form-group"> 
                <?=Form::label('title', 'Название')?>
               <?=Form::input('title', $data['title'], array(
                   'class' => 'form-control',
                   'data-required' => 'true',
                   'data-minlength' => '3',
                   'data-maxlength' => '150',
                   ))?>
          </div>
                    </div>
                    <div class="col-md-6">
                         <div class="form-group"> 
                        <?=Form::label('subtitle', 'ПОД_Название')?>
               <?=Form::input('subtitle', $data['subtitle'], array(
                   'class' => 'form-control',
                   'data-required' => 'true',
                   'data-minlength' => '3',
                   'data-maxlength' => '150',
                   ))?>
                         </div>
                        
                    </div>
                </div>
           
          <div class="form-group"> 
                <?=Form::label('description', 'Описание')?>
              <?=Form::textarea('description', $data['description'], array(
                  'cols' => 20, 
                  'rows' => 5,           
                  'class' => 'form-control ckeditor',
                  'data-required' => 'true',
                  'data-minlength' => '3',
                  'data-maxlength' => '1500',
                 
                  
                  ))?>
           
          </div>
           
         
              <div class="row">
                        <div class="col-sm-6">
                            
                            <div class="form-group"> 
                <?=Form::label('meta_title', 'meta_title для Сео оптимизации')?>
                  <span class="help-block">
                      От 10 до 150 символов можно ввести
                  </span>
               <?=Form::textarea('meta_title', $data['meta_title'], array(
                   'class' => 'form-control',
                   'data-required' => 'true',
                   'data-minlength' => '10',
                   'data-maxlength' => '150',
                   'id' => 'testTextarea2',
                   'rows' => '3',
                   ))?>
               </div>
                            
                        </div>
                  
                        <div class="col-sm-6">
                            
                            
                             <div class="form-group"> 
                <?=Form::label('meta_keywords', 'Ключевые слова для Сео оптимизации')?>
                                   <span class="help-block">
                      От 10 до 150 символов можно ввести
                  </span>
               <?=Form::textarea('meta_keywords', $data['meta_keywords'], array(
                   'class' => 'form-control',
                   'data-required' => 'true',
                   'data-minlength' => '10',
                   'data-maxlength' => '150',
                   'id' => 'testTextarea22',
                   'rows' => '3',
                   ))?>
          </div>
                             
                        </div>
                    </div>
              
         
    
         
           
           
        
           
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group"> 
               <?=Form::label('meta_description', 'meta_description Описание страницы')?>
                          <span class="help-block">
                      От 10 до 250 символов можно ввести
                  </span>
               <?=Form::textarea('meta_description', $data['meta_description'], array(
                   'class' => 'form-control',
                   'data-required' => 'true',
                   'data-minlength' => '10',
                   'data-maxlength' => '150',
                   'id' => 'testTextarea222',
                   'rows' => '3',
                   ))?>
               
          </div>
                    </div>
           </div>
                
          
            <div class="row">
                    <div class="col-sm-4">
               <div class="form-group"> 
               
               <?=Form::label('scene_id', 'Сцена')?>:
               <br />
               <?=Form::select('scene_id', 
                  $scene, $data['scene_id'],
                  array(
                     'class' => 'form-control select2-input', 
                  ))?>
               </div>
                    </div>
                <div class="col-sm-2">
                    <div class="form-group"> 
                         <?=Form::label('start', 'Начало мероприятия')?>
                        <br />
                        <?=Form::select('start', $start,21,array(
                            'class' => 'form-control select2-input',
                          
                        )
                           , $data['start']     )?>

                        
                    </div>
                    
                    
                </div>
                
                    
                <div class="col-sm-6">
                    <div class="form-group"> 
              <?=Form::label('pl', 'Площадка')?>
              <br />
              <h2><?=$place->title?></h2>
              <?=Form::hidden('place_id', $place->id)?>

          </div>
                    
                    
                </div>
            </div>
           
                 <div class="form-group">
                    <?=Form::label('image', 'Загрузить изображение:')?>
             <span class="help-block">Файл размером 300 на 200 пикселей</span>
                    <?//=Form::file('image', array('id' => 'multi'))?>
             
             
             <?=Form::file('image', array(
                          
                          'class' => 'btn btn-success',
                          'id' =>'multi',
                          ));?>
                 </div>
                 
         <div class="form-group"> 
              <?=Form::button('submit', 'Сохранить', array(
                          'type' => 'submit',
                          'class' => 'btn btn-primary',
                          ));?>
          </div>
     <?=Form::close()?>
                
        
                
</div>
            
            
                </div>
         </div>
     </div>
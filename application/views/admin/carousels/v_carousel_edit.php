<div class="row">
    <div class="col-md-8">
        <div class="portlet">
            <div class="portlet-header">
             
                
                <?if($errors):?>
<?foreach ($errors as $error):?>
<div class="error"><?=$error?></div>
<?endforeach?>
<?endif?>
<p> <?=HTML::anchor('admin/carousels/', '<button class="btn btn-info" type="button"><i class="fa fa-reply"></i>  Вернуться</button>')?>
<h3>Карусель на Главной </h3>
            </div>
            <div class="portlet-content">
                  
                   <?=Form::open('admin/carousels/edit/'.$id, array(
           'enctype' => 'multipart/form-data',
           'id' => 'validate-basic',
           'class' => 'form parsley-form',
           'data-validate' => 'parsley',
                
           ));?> 
                  
                <fieldset>
                  <legend>Форма добавления</legend>
                  <div class="form-group">
                      
                <?=Form::label('title', 'Название',array())?>
                       
               <?=Form::input('title', $data['title'], array(
                   'type' => 'text',
                   'class' => 'form-control',
                   'data-required' => 'true',
                   'data-minlength' => '3',
                   'data-maxlength' => '50',
                   'placeholder' => 'Название не длинее 50 символов',
                   
                   ))?> 
                    <span class="help-block">
                           Название не должно быть длинее 50 символов.
                      </span>  
                    
                  </div>
                 
                  <div class="form-group">
                     <?=Form::label('description', 'Описание',array(
                    
                         ))?>  
                   
                    
                         
              <?=Form::textarea('description', $data['description'], array(
                   'type' => 'textarea',
                   'class' => 'form-control',
                   'data-required' => 'true',
                   'data-minlength' => '3',
                   'data-maxlength' => '100',
                   'placeholder' => 'Название не длинее 100 символов',
                   'rows' => 3,
                   
                  ))?>
                      
                      <span class="help-block">
                           Описание не должно быть длинее 100 символов.
                      </span>
                    
                  </div>
                  <div class="row">
         <div class="col-md-4">
     <h4>Выберите дату окончания показа баннера</h4>
                            <div id="dp-ex-3"
                                 class="input-group date" 
                                 data-auto-close="true" 
                                 data-date=<?=date('d-m-Y');?>
                                 data-date-format="dd-mm-yyyy" 
                                 data-date-autoclose="true"
                                 >
                                <?=Form::input('day', $data['day'], array(
                                    'class' => 'form-control',
                                    'type' => 'text',
                                     'data-required' => 'true',
                                    
                                    
                  ))?>
                               
				<span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                            </div>
                            <span class="help-block">dd-mm-yyyy</span>
     
 
     
     </div>
         </div>
                  
                  <div class="form-group">
                      
                <?=Form::label('link', 'Ссылка',array())?>
                       
               <?=Form::input('link', $data['link'], array(
                   'type' => 'text',
                   'class' => 'form-control',
                   'data-required' => 'true',
                   'data-minlength' => '3',
                   'data-maxlength' => '50',
                   'placeholder' => 'Название не длинее 50 символов',
                   
                   ))?> 
                    <span class="help-block">
                           Ссылка ведет на событие, вводите только 
                      </span>  
                    
                  </div>
                  <div class="form-group">
                    <label>Показывать или нет</label>
                   
                      <div class="radio">
                        <label>
                          <input type="radio" checked="" value="1" id="optionsRadios1" name="label">
                         Показывать
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input type="radio" value="0" id="optionsRadios2" name="label">
                          Не показывать
                        </label>
                      </div>
                    </div>
                 <div class="form-group">
                    <?=HTML::image('media/uploads/carousels/'.'small_'.$carousel->image,array(
                        'class' => 'img-circle',
                    ))?>
                 </div>
                  <div class="form-group">
                    <label>Загрузка файла</label>
                    
                    <?=Form::label('image', 'Загрузить изображение:')?>
                    <?=Form::file('image', array('id' => 'multi'))?>
                        <span class="help-block">
                            Файл размером 800 на 600 пикселей
                      </span>
   
                  </div>
                  <div class="form-group">
                    
                      <?=Form::button('submit', 'Сохранить', array(
                          'type' => 'submit',
                          'class' => 'btn btn-primary',
                          ));?>
                    
                  </div>
                </fieldset>
              <?=Form::close()?>
            </div>
          </div>
</div>
    </div>

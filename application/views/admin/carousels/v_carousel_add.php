<div class="row">
<div class="col-lg-12">
            <div class="well">
             
                
                <?if($errors):?>
<?foreach ($errors as $error):?>
<div class="error"><?=$error?></div>
<?endforeach?>
<?endif?>
<br />
                  
                   <?=Form::open('admin/carousels/add/', array(
           'enctype' => 'multipart/form-data',
           'class' => 'bs-example form-horizontal',
           ));?> 
                  
                <fieldset>
                  <legend>Форма добавления</legend>
                  <div class="form-group">
                      
                    <?=Form::label('title', 'Название',array('class' =>'col-lg-2 control-label' ))?>
                   
                    <div class="col-lg-10">
                       
               <?=Form::input('title', $data['title'], array(
                  'type' => 'text',
                   'placeholder' => 'Название не длинее 50 символов',
                   'id' => 'inputEmail',
                   'class' => 'form-control', 
                   ))?> 
                    <span class="help-block">
                           Название не должно быть длинее 50 символов.
                      </span>  
                    </div>
                  </div>
                 
                  <div class="form-group">
                     <?=Form::label('description', 'Описание',array(
                         'class' =>'col-lg-2 control-label',
                         'for' =>'editor',))?>  
                    <div class="col-lg-10">
                    
                         
              <?=Form::textarea('description', $data['description'], array(
                 'class' => 'form-control',
                  'rows' => 3,
                  'id' => 'editor',
                  ))?>
                      
                      <span class="help-block">
                           Описание не должно быть длинее 100 символов.
                      </span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-2 control-label">Показывать или нет</label>
                    <div class="col-lg-10">
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
                  </div>
                  <div class="form-group">
                    <label class="col-lg-2 control-label" for="select">Загрузка файла</label>
                    <div class="col-lg-10">
                       <?=Form::label('image', 'Загрузить изображение:')?>
                    <?=Form::file('image', array('id' => 'multi'))?>
                        <span class="help-block">
                            Файл размером 800 на 600 пикселей
                      </span>
                    </div>
                  </div>
                  
                  <div class="fileinput fileinput-new" data-provides="fileinput">
  <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
    <img data-src="holder.js/100%x100%" alt="...">
  </div>
  <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
  <div>
    <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="..."></span>
    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
  </div>
</div>

                  
                  
                  
                  <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                     
                      
                     
                      <?=Form::button('submit', 'Сохранить', array(
                          'type' => 'submit',
                          'class' => 'btn btn-primary',
                          ));?>
                    </div>
                  </div>
                </fieldset>
              <?=Form::close()?>
            </div>
          </div>
</div>

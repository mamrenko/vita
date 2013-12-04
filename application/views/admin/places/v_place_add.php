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
<p>
  
      <?=HTML::anchor('admin/places', '<button class="btn btn-info" type="button"><i class="fa fa-reply"></i>  Вернуться  </button>')?>
     
</p>
            </div>
  <div class="portlet-content">
      
      <?=Form::open('admin/places/add', array(
          'enctype' => 'multipart/form-data',
           'id' => 'validate-basic',
           'class' => 'form parsley-form',
           'data-validate' => 'parsley',
          ));?>
    
           
           
           <div class="form-group">
               <?=Form::label('title', 'Название Площадки')?>
               <?=Form::input('title', $data['title'], array(
                   'type' =>'text',
                   'placeholder' => 'Минимум 3 буквы, максимум 40',
                   'class' => 'form-control',
                   'data-required' => 'true',
                   'data-minlength' => '3',
                   'data-maxlength' => '40',
                   ))?>
          </div>
           
           
           <div class="form-group">
              <?=Form::label('adress', 'Адрес площадки')?>
               <?=Form::input('adress', $data['adress'], array(
                   'type' =>'text',
                   'placeholder' => 'Минимум 10 буквы, максимум 40',
                   'class' => 'form-control',
                   'data-required' => 'true',
                   'data-minlength' => '10',
                   'data-maxlength' => '70',
                   ))?>
          </div>
           
           
          <div class="form-group">
               <?=Form::label('description', 'Описание Площадки')?>
              <?=Form::textarea('description', $data['description'], array(
                  'class' => 'form-control ckeditor',
                  'cols' => 10, 
                  'rows' => 5,
                  'name' => 'description',
                  'id' => 'editor'
                  ))?>
              
                <script type="text/javascript">
                    CKEDITOR.replace( 'editor' );
               </script>
          </div>
      
       
           
            <div class="form-group">
                    <?=Form::label('image', 'Загрузить изображение:')?>
            </div>
          <div class="form-group">
                    <?=Form::file('image', array('id' => 'multi'))?>
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
 
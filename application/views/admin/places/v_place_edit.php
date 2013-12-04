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
  
      <?=HTML::anchor('admin/places/', '<button class="btn btn-info" type="button"><i class="fa fa-reply"></i>  Вернуться  </button>')?>
      
</p>
            </div>
            <div class="portlet-content">
                

      
      <?=Form::open('admin/places/edit/'. $id, array(
           'enctype' => 'multipart/form-data',
           'id' => 'validate-basic',
           'class' => 'form parsley-form',
           'data-validate' => 'parsley',
          ));?>
    
           
           
           <div class="form-group">
               <?=Form::label('title', 'Название')?>
               <?=Form::input('title', $data['title'], array(
                   'type' =>'text',
                   'placeholder' => 'Минимум 3 буквы, максимум 40',
                   'class' => 'form-control',
                   'data-required' => 'true',
                   'data-minlength' => '3',
                   'data-maxlength' => '40',))?>
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
               <?=Form::label('description', 'Описание',array(
                   'for' => 'description'
               ))?>
              <?=Form::textarea('description', $data['description'], array(
                  'class' => 'form-control ckeditor',
                  //'class' => 'form-control parsley-validated',
                  'cols' => 10, 
                  'rows' => 5,
                  'placeholder' => 'Минимум 50 буквы, максимум 500',
                  'data-minlength' => '50',
                  'data-maxlength' => '500',
                  'data-required' => 'true',
                  'name' => 'description',
                  'id' => 'description'
                  ))?>
              
               
               
               
                <script type="text/javascript">
                   
                    CKEDITOR.replace( 'description' );
               </script>
          </div>
           
           <div class="form-group">
                    <?=HTML::image('media/uploads/places/'.'small_'.$place->image,array(
                        'class' => 'img-circle',
                    ))?>
            </div>
                <div class="form-group">
                     <?=Form::label('image', 'Загрузить изображение:')?>
                     <?=Form::file('image', array('id' => 'multi'))?>
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

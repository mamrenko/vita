<div class="row">
    <div class="col-md-6">
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

    <p>
    <?=html::anchor('admin/scenes/list/'. $scene->place->id,
        '<button class="btn btn-info" type="button"><i class="fa fa-reply"></i>  Вернуться  '.$scene->place->title.'</button>')?>
    </p>
    <h3><?=$scene->place->title?></h3>
</div>
            <div class="portlet-content">

       <?=Form::open('admin/scenes/edit/'.$id, array(
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
                   'data-maxlength' => '40',
               ))?>
          </div>
           
           
           
           
            <div class="form-group">
              <?=Form::label('pl', 'Площадка')?>
              <br />
              <h2><?=$scene->place->title?></h2>
              <?=Form::hidden('place_id', $scene->place->id)?>

          </div>
           
      <div class="form-group">
                    <?=HTML::image('media/uploads/scenes/'.'small_'.$scene->image)?>
         
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
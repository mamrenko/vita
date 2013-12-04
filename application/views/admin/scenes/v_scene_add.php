
<div class="row">
    <div class="col-md-6 col-md-offset-1">
        <h2>Добавление сцены <?=$place->title?></h2>
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
  
      <?=HTML::anchor('admin/scenes/list/'.$place->id, '<button class="btn btn-info" type="button"><i class="fa fa-reply"></i> Вернуться ' . $place->title .'</button>')?>
      
</p>

    </div> 
            <div class="portlet-content">

                
                

                
                 
       <?=Form::open('admin/scenes/add/'.$id, array(
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
           
           
        
           
           
          <div>
             
              <?=Form::hidden('place_id', $place->id)?>

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





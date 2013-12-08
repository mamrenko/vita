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
            <i class="icon-li fa fa-cloud"></i>
          Редактируем Новости
        </p>
        
    
<p>  
<?=HTML::anchor('admin/news/', '<button class="btn btn-info" type="button"><i class="fa fa-reply"></i>  Вернуться</button>')?>
 
</p>
            </div>
           
<div class="portlet-content">
      
      <?=Form::open('admin/news/edit/'. $id, array(
          'enctype' => 'multipart/form-data',
            'id' => 'validate-basic',
           'class' => 'form parsley-form',
           'data-validate' => 'parsley',
          ));?>
    
           <div class="form-group">
               <?=Form::label('title', 'Название')?>
               <?=Form::input('title', $data['title'], array(
                   'class' => 'form-control',
                   'data-required' => 'true',
                   'data-minlength' => '3',
                   'data-maxlength' => '150',
                   ))?>
          </div>
           
           
          <div class="row">
         <div class="col-md-4">
     <h4>Выберите дату</h4>
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
               <?=Form::label('content', 'Основной текст')?>
              <?=Form::textarea('content', $data['content'], array(
                  'cols' => 20, 
                  'rows' => 5, 
                  'class' => 'form-control ckeditor',
                  'data-required' => 'true',
                  'data-minlength' => '3',
                  'data-maxlength' => '1500',
                  ))?>

            
             
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


<div class="row">
    <div class="col-md-4">
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
<br />
<h2>Добавление Коллеги</h2>
<p>
  
      <?=HTML::anchor('admin/colleges', '<button class="btn btn-info" type="button"><i class="fa fa-reply"></i> Вернуться </button>')?>
      
</p>
            </div>

  <div class="portlet-content">
      
      <?=Form::open('admin/colleges/add', array(
         'id' => 'validate-basic',
           'class' => 'form parsley-form',
           'data-validate' => 'parsley',
          ));?>
    
           
           
           <div class="form-group">
               <?=Form::label('name', 'Имя Коллеги', array(
       ))?>
               
               <?=Form::input('name', $data['name'], array(
                   'type' =>'text',
                   'placeholder' => 'Минимум 3 буквы, максимум 200',
                   'class' => 'form-control',
                   'data-required' => 'true',
                   'data-minlength' => '3',
                   'data-maxlength' => '200',
                   ))?>
          </div>
       <div class="form-group">
    <?=Form::label('phone', 'Телефон', array(
         
        
        
        
    ))?>
    
           <?=Form::input('phone', $data['phone'], array(
               'type' => "text",
        'class' =>'form-control bfh-phone',
        'data-format' => "+7 (ddd) ddd-dddd",
                  
                  
                   'placeholder' => 'Телефон Коллеги',
                   'id' => 'phone',
                   ))?>
    
   
  </div>
           
           <div class="form-group">
    <?=Form::label('adress', 'Адрес', array(
         
        
        
        
    ))?>
    
           <?=Form::input('adress', $data['adress'], array(
                   'type' =>'text',
                   'placeholder' => 'Минимум 3 буквы, максимум 200',
                   'class' => 'form-control',
                   'data-required' => 'true',
                   'data-minlength' => '3',
                   'data-maxlength' => '200',
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
        </div></div>
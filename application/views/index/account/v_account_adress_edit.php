<div class="row">
    <div class="col-md-10">
        <div class="portlet">
            <div class="portlet-header">

<?if($errors):?>
<?foreach ($errors as $error):?>
              <ul class="portlet-tools pull-right">
								
                  <li>
                      <span style="font-size: 18px"><span class="label label-danger"><?=$error?></span>
                        </span>
		  </li>
		</ul>
<?endforeach?>
<?endif?>



<h3>Редактируем адрес
</h3>
        
<p>
  
      <?=HTML::anchor('account/adress', '<button class="btn btn-info" type="button"><i class="fa fa-reply"></i> Список адресов</button>')?>
      
</p>
            </div>

  <div class="portlet-content">
      
        <?=Form::open('account/adress_edit/'.$adress->id, array(
           
          ));?>
      
      <div class="form-group">
               <?=Form::label('adress', 'Адрес')?>
               <?=Form::input('adress', $data['adress'], array(
                   'type' =>'text',
                   'placeholder' => 'Введите адрес доставки',
                   'class' => 'form-control',
                   'data-required' => 'true',
                   'data-minlength' => '10',
                   'data-maxlength' => '255',
                   ))?>
          </div>
      
      
      <div class="form-group"> 
              <?=Form::label('metro', 'Выбор метро')?>
              <?=Form::select('metro', $gets, $data['metro'], array(
           
                 
                  'class' => 'form-control',
                   
                  
                  ))?>

          </div>   
      
       <div class="form-group">
                    
                      <?=Form::button('submit', 'Изменить адрес', array(
                          'type' => 'submit',
                          'class' => 'btn btn-primary',
                          ));?>
                    
                  </div>
      
      <?=Form::close()?>
      
  </div>
           

            </div>
        </div>
    </div>
            

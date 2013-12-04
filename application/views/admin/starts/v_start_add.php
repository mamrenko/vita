
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
<br />
<p>
  
      <?=HTML::anchor('admin/starts', '<button class="btn btn-info" type="button"><i class="fa fa-reply"></i> Вернуться </button>')?>
   
</p>
</div>
  <div class="portlet-content">
      
      <?=Form::open('admin/starts/add', array(
           'id' => 'validate-basic',
           'class' => 'form parsley-form',
           'data-validate' => 'parsley',
          ));?>
    
           
           
          <div class="form-group">
               <?=Form::label('start', 'Начало Мероприятий Такого Вида 11:30')?>
               <?=Form::input('start', $data['start'], array(
                   'type' =>'text',
                   'placeholder' => 'Минимум 5 буквы, максимум 5',
                   'class' => 'form-control',
                   'data-required' => 'true',
                   'data-minlength' => '5',
                   'data-maxlength' => '5',
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
</div> </div> </div> 

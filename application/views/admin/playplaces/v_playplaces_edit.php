<div class="row">
    <div class="col-md-8">
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


<p> <?=HTML::anchor('admin/playplaces/list/'. $playbill->place_id, '<button class="btn btn-info" type="button"><i class="fa fa-reply"></i>  Вернуться  '.$playbill->place->title.'</button>')?>
 
</p>
<h1><?=$playbill->title?></h1>
</div>
            <div class="portlet-content">

       <?=Form::open('admin/playplaces/edit/'.$id, array(
           'enctype' => 'multipart/form-data',
           'id' => 'validate-basic',
           'class' => 'form parsley-form',
           'data-validate' => 'parsley',
           ));?>
       
           
           
           <div class="row">
                    <div class="col-md-6">
                    
          <div class="form-group"> 
                <?=Form::label('title', 'Название')?>
               <?=Form::input('title', $data['title'], array(
                   'class' => 'form-control',
                   'data-required' => 'true',
                   'data-minlength' => '3',
                   'data-maxlength' => '150',
                   ))?>
          </div>
                    </div>
                    <div class="col-md-6">
                        <?=Form::label('subtitle', 'ПОД_Название')?>
               <?=Form::input('subtitle', $data['subtitle'], array(
                   'class' => 'form-control',
                   'data-required' => 'true',
                   'data-minlength' => '3',
                   'data-maxlength' => '150',
                   ))?>
                        
                        
                    </div>
                </div>
           
          <div class="form-group"> 
                <?=Form::label('description', 'Описание')?>
              <?=Form::textarea('description', $data['description'], array(
                  'cols' => 20, 
                  'rows' => 5, 
                  'class' => 'form-control ckeditor',
                  'data-required' => 'true',
                  'data-minlength' => '3',
                  'data-maxlength' => '1500',
                  'id' =>'editor',
                  
                  ))?>
           <script type="text/javascript">
                    CKEDITOR.replace( 'editor' );
               </script>
          </div>
           <div class="row">
               <div class="col-md-6">
                   <div class="form-group"> 
                <?=Form::label('meta_title', 'meta_title для Сео оптимизации')?>
               <?=Form::textarea('meta_title', $data['meta_title'], array(
                   'class' => 'form-control',
                   'data-required' => 'true',
                   'data-minlength' => '10',
                   'data-maxlength' => '300',
                   'cols' => 10, 
                   'rows' => 3, 
                    'id' => 'testTextarea2',
                   ))?>
          </div>
               </div>
               <div class="col-md-6">
                    <div class="form-group"> 
                <?=Form::label('meta_keywords', 'Ключевые слова для Сео оптимизации')?>
               <?=Form::textarea('meta_keywords', $data['meta_keywords'], array(
                   'class' => 'form-control',
                   'data-required' => 'true',
                   'data-minlength' => '10',
                   'data-maxlength' => '300',
                   'cols' => 10, 
                   'rows' => 3,
                   'id' => 'testTextarea22',
                   ))?>
          </div>
               </div>
            </div>
          
    
          
           
                <div class="row">
                    <div class="col-md-6">
        <div class="form-group"> 
               <?=Form::label('meta_description', 'meta_description Описание страницы')?>
               <?=Form::textarea('meta_description', $data['meta_description'], array(
                   'class' => 'form-control',
                   'data-required' => 'true',
                   'data-minlength' => '10',
                   'data-maxlength' => '300',
                   'cols' => 10, 
                   'rows' => 3,
                    'id' => 'testTextarea222',
                   ))?>
               </div>
          </div>
                </div>
           
                <div class="row">
                    
                    
                     <div class="col-md-4">
               <div class="form-group"> 
               
               <?=Form::label('scene_id', 'Сцена')?>:
               <br />
               <?=Form::select('scene_id', 
                  $scene, $data['scene_id'],
                  array(
                     'class' => 'form-control select2-input', 
                  ))?>
               </div>
                    </div>
                    
                    <div class="col-md-2">
                    <div class="form-group"> 
                         <?=Form::label('start', 'Начало мероприятия')?>
                        <br />
                        <?=Form::select('start', $start, $data['start'],array(
                            'class' => 'form-control select2-input',
                           
                        ))?>


                    </div>
                    </div>
                    <div class="col-md-3">
                        
                        
                        <div class="form-group"> 
              <?=Form::label('pl', 'Площадка')?>
              <br />
              <h2><?=$playbill->place->title?></h2>
              <?=Form::hidden('place_id', $playbill->place->id)?>

          </div>
                    </div>
                    <div class="col-md-3">
                          <div class="form-group">
                          <?=Form::label('onset', 'Начало мероприятия2')?>
                        <br />
                        
                       <?
                       
//                             $table_name = "playbills";
//                             $column_name = "onset";
//
//                            echo "<select name=\"$column_name\">";
//                            $result = mysql_query("SELECT COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS
//                                WHERE TABLE_NAME = '$table_name' AND COLUMN_NAME = '$column_name'")
//                            or die (mysql_error());
//
//                            $row = mysql_fetch_array($result);
//                            $enumList = explode(",", str_replace("'", "", substr($row['COLUMN_TYPE'], 5, (strlen($row['COLUMN_TYPE'])-6))));
//
//                            foreach($enumList as $value)
//                                echo "<option value=\"$value\">$value</option>";
//
//                            echo "</select>";


                       ?>
                        <?//$allsets = (explode(',', $playbill->onset));


                        ?>
                        
                         <?$onset = $playbill->onset;
                       
                      $row = explode(",", $onset);
                     $arr[] = $row;
                     
                    
                      foreach ($row as $ons )
                            echo "<h2>$ons</h2>";
                       
                       ?>  
                        
                        
                        <?=Form::select('onset[]', $gets, $row, array(
           
                  'id' => 's3_multi_value',
                  'class' => 'form-control',
                   'multiple',
                  
                  ))?>
   
                       <?//= //    Form::select(
//                               'onset[]',  $enumList,  array(1,2,3),
//                             
//                               array(
//                                   
//                                   'id' => 'e1',
//                                   'class' => 'form-control',
//                                   'multiple',
//                                   ));
           
                                   
                 
                  
              //  ?>
                        
                        
                       
                        
                          </div>
                        
                      <?//=Form::select('color', array('black', 'white', 'green', 'blue'), array(2,3), array('id' => 'select'));
                        ?>  
                       
                        
                    </div>
           </div>
           
                <div class="row">
                <div class="col-md-4">
           <div class="form-group">
                    <?=HTML::image('media/uploads/playplaces/'.'small_'.$playbill->image,array(
                        'class' => 'img-circle',
                    ))?>
            </div>
                <div class="form-group">
                     <?=Form::label('image', 'Загрузить изображение:')?>
                     <span class="help-block">Файл размером 300 на 200 пикселей</span>
                     <?=Form::file('image', array('id' => 'multi'))?>
              </div>
                    
               </div>  
                <div class="col-md-8">
                  
                     <div class="form-group"> 
                         <?if(count($arts) > 0){?>
                             
                             
                       
                  <?=Form::label('artist', 'Артисты')?>:
              
             
               
              <?=Form::select('art[]', $arts, $data['art'], array(
           
                  'id' => 's4_multi_value',
                  'class' => 'form-control',
                   'multiple',
                  
                  ))?>
           
                         <?} else
                             
                         {?>
                             
                  <h3>Нет артистов</h3>
               
                    <?=HTML::anchor('admin/artists/add/'. $playbill->place_id, '<button class="btn btn-info" type="button"><i class="fa fa-user"></i>  Добавить в труппу  '.$playbill->place->title.'</button>')?>          
                        <? }?>
                  
                  
          </div>
                </div>
                </div>   
         <div class="form-group"> 
              <?=Form::button('submit', 'Сохранить', array(
                          'type' => 'submit',
                          'class' => 'btn btn-primary',
                          ));?>
          </div>
     <?=Form::close()?>

            </div>      </div>
         </div>
     </div>
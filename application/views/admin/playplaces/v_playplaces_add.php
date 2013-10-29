<?if($errors):?>
<?foreach ($errors as $error):?>
<div class="error"><?=$error?></div>
<?endforeach?>
<?endif?>

<h2><?=$place->title?></h2>
     
<div class="TTWForm-container">
       <?=Form::open('admin/playplaces/add/', array('class' => 'TTWForm ui-sortable-disabled', 'style' => 'width: 700px'));?>
       
           
           
          <div id="field1-container" class="field f_100">
                <?=Form::label('title', 'Название')?>
               <?=Form::input('title', $data['title'], array('size' => 100, 'required' => 'required'))?>
          </div>
           
           
          <div id="field3-container" class="field f_100">
                <?=Form::label('description', 'Описание')?>
              <?=Form::textarea('description', $data['description'], array('cols' => 20, 'rows' => 5, 'id' => 'editor', 'required' => 'required'))?>
           <script type="text/javascript">
                    CKEDITOR.replace( 'editor' );
               </script>
          </div>
           
           
          <div id="field4-container" class="field f_100">
                <?=Form::label('meta_keywords', 'Ключевые слова для Сео оптимизации')?>
               <?=Form::input('meta_keywords', $data['meta_keywords'], array('size' => 100, 'required' => 'required'))?>
          </div>
           
           
          <div id="field5-container" class="field f_100">
               <?=Form::label('meta_description', 'Описание страницы')?>
               <?=Form::input('meta_description', $data['meta_description'], array('size' => 100, 'required' => 'required'))?>
               
          </div>
           
           
          <div id="field6-container" class="field f_100">
               <label for="field6">
                    Начало мероприятия
               </label>
               <select name="start" id="field6" required="required">
                    <option id="field6-1" value="09.00">
                         09.00
                    </option>
                    <option id="field6-2" value="10.00">
                         09.30
                    </option>
                    <option id="field6-2" value="10.00">
                         10.00
                    </option>
                    <option id="field6-3" value="10.30">
                         10.30
                    </option>
                    <option name="start" id="start-4" value="11.00">
                         11.00
                    </option>
                    <option name="start" id="start-5" value="11.30">
                         11.30
                    </option>
                    <option name="start" id="start-6" value="12.00">
                         12.00
                    </option>
                    <option name="start" id="start-7" value="12.30">
                         12.30
                    </option>
                    <option name="start" id="start-8" value="13.00">
                         13.00
                    </option>
                    <option name="start" id="start-9" value="13.30">
                         13.30
                    </option>
                    <option name="start" id="start-10" value="14.00">
                         14.00
                    </option>
                    <option name="start" id="start-11" value="14.30">
                         14.30
                    </option>
                    <option name="start" id="start-12" value="15.00">
                         15.00
                    </option>
                    <option name="start" id="start-13" value="15.30">
                         15.30
                    </option>
                    <option name="start" id="start-14" value="16.00">
                         16.00
                    </option>
                    <option name="start" id="start-15" value="16.30">
                         16.30
                    </option>
                    <option name="start" id="start-16" value="17.00">
                         17.00
                    </option>
                    <option name="start" id="start-17" value="17.30">
                         17.30
                    </option>
                    <option name="start" id="start-18" value="18.00">
                         18.00
                    </option>
                    <option name="start" id="start-19" value="18.30">
                         18.30
                    </option>
                    <option name="start" id="start-20" selected value="19.00">
                         19.00
                    </option>
                    <option name="start" id="start-21" value="19.30">
                         19.30
                    </option>
                    <option name="start" id="start-22" value="20.00">
                         20.00
                    </option>
                    <option name="start" id="start-23" value="20.30">
                         20.30
                    </option>
                    <option name="start" id="start-24" value="21.00">
                         21.00
                    </option>
                    <option name="start" id="start-25" value="21.30">
                         21.30
                    </option>
                    <option name="start" id="start-26" value="22.00">
                         22.00
                    </option>
                    <option name="start" id="start-27" value="22.30">
                         22.30
                    </option>
                    <option name="start" id="start-28" value="23.00">
                         23.00
                    </option>
                    <option name="start" id="start-29" value="23.30">
                         23.30
                    </option>
                    <option name="start" id="start-30" value="24.00">
                         24.00
                    </option>
               </select>
          </div>
           
           
          <div id="field8-container" class="field f_100">
              <?=Form::label('pl', 'Площадка')?>
              <br />
              <h2><?=$place->title?></h2>
              <?=Form::hidden('place_id', '$place->id')?>

          </div>
           
           
          <div id="form-submit" class="field f_100 clearfix submit">
              <?=Form::submit('submit', 'Сохранить')?>
          </div>
     <?=Form::close()?>
</div>



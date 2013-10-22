<?if($errors):?>
<?foreach ($errors as $error):?>
<div class="error"><?=$error?></div>
<?endforeach?>
<?endif?>


     
<div class="TTWForm-container">
      
       <form style="width: 400px;" action="admin/playbill/add" class="TTWForm"
     method="multipart/form-data" novalidate="">
           
           
          <div id="field1-container" class="field f_100">
               <label for="field1">
                    Название
               </label>
               <input name="title" id="field1" required="required" type="text">
          </div>
           
           
          <div id="field3-container" class="field f_100">
               <label for="field3">
                    Описание
               </label>
               <textarea rows="5" cols="20" name="description" id="field3" required="required"></textarea>
          </div>
           
           
          <div id="field4-container" class="field f_100">
               <label for="field4">
                    Ключевые слова
               </label>
               <input name="meta keywords" id="field4" required="required" type="text">
          </div>
           
           
          <div id="field5-container" class="field f_100">
               <label for="field5">
                    Описание страницы
               </label>
               <input name="meta description" id="field5" required="required" type="text">
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
                    <option name="start" id="start-20" value="19.00">
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
               <label for="field8">
                    Площадка
               </label>
               <select name="place_id" id="field8" required="required">
                   <?foreach ($places as $place):?>
                    <option id="field8-1" value="<?=$place->id?>">
                         <?=$place->title?>
                    </option>
                    <?endforeach;?>
                    
               </select>
          </div>
           
           
          <div id="form-submit" class="field f_100 clearfix submit">
               <input value="Добавить !" type="submit">
             </div>
     </form>
</div>



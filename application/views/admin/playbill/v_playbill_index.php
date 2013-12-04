<div class='row'>
     <div class="col-md-6">

<h4 class="heading">На сайте показываются только События</h4>


<table class="table table-bordered table-hover">
    <thead>
<tr>
    <th>Площадка</th>
   
    
</tr>
    </thead>
<tr>
    <?foreach ($playbills as $playbill):?>


    <td>
        <?=HTML::anchor('admin/playbill/list/'.$playbill->place->id, $playbill->place->title)?>
    </td>
    
   
</tr>
    <? endforeach; ?>  
</table>

     </div>




     <div class="col-md-6 border">

<h4 class="heading">Статистика событий</h4>
   <table class="table table-bordered table-highlight">
    <thead>
<tr>
    <th>Площадки</th>
    <th>Мероприятий</th>
    
</tr>
    </thead>
<tr>
   


    <td>
        <?=count($playbills);?>
    </td>
    <td>
        <?=count($playbillsis);?>
        
    </td>
   
</tr>
   
</table>  
    
</div>
</div>
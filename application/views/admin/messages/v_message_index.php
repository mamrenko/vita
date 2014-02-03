<div class="row">
    <div class="col-md-12">
        <div class="portlet">
            <div class="portlet-header">

<h3>Сообщения</h3>

</div>

            <div class="portlet-content">

<table id="placetb" class="table table-bordered table-highlight" data-paginate="TRUE">
    <thead>
<tr>
    <th>Имя</th>
    <th>Емейл</th>
    <th>Телефон</th>
    <th>Сообщение</th>
    <th>Когда Пришло</th>
    <th>Функции</th>
</tr>
</thead>
<?foreach ($messages as $message):?><?foreach ($messages as $message):?>
<tr>
    <td><?=$message->name?></td>
     <td><?=$message->email?></td>
     <td><?=$message->phone?></td>
     <td><?=$message->text?></td>
      
     <td><?=date('d-m-Y H:i:s',strtotime($message->intime));?></td>
     <td><?=HTML::anchor('admin/messages/delete/'. $message->id, 
               '<button class="btn btn-danger" type="button">
		<i class="fa fa-times"></i></button>')?>
       </td>
</tr>
<?endforeach;?><?endforeach;?>
</table>
</div>
        </div>
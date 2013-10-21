<h2>
Страница Мероприятий 
(На сайте показываются только События).
</h2>


<!-- Generated from http://html-generator.weebly.com -->
<script type="text/javascript">
	window.onload=function(){
	var tfrow = document.getElementById('tfhover').rows.length;
	var tbRow=[];
	for (var i=1;i<tfrow;i++) {
		tbRow[i]=document.getElementById('tfhover').rows[i];
		tbRow[i].onmouseover = function(){
		  this.style.backgroundColor = '#ffffff';
		};
		tbRow[i].onmouseout = function() {
		  this.style.backgroundColor = '#bedda7';
		};
	}
};
</script>

<style type="text/css">
table.tftable {font-size:12px;color:#333333;width:100%;border-width: 1px;border-color: #9dcc7a;border-collapse: collapse;}
table.tftable th {font-size:12px;background-color:#abd28e;border-width: 1px;padding: 8px;border-style: solid;border-color: #9dcc7a;text-align:left;}
table.tftable tr {background-color:#bedda7;}
table.tftable td {font-size:12px;border-width: 1px;padding: 8px;border-style: solid;border-color: #9dcc7a;}
</style>

<table id="tfhover" class="tftable" border="1">
<tr>
    <th>Площадка</th>
    <th>Название</th>
    <th>Начало</th>
    
    <th>Функции</th>
    
</tr>
<tr>
    <?foreach ($playbills as $playbill):?>
<p></p>

    <td><?=$playbill->place_id?></td>
    <td><?=HTML::anchor('admin/playbill/edit/'.$playbill->id, $playbill->title)?></td>
    <td><?=$playbill->start?> ч.</td>
   
    <td>
            <?=HTML::anchor('admin/playbill/edit/'.$playbill->id, HTML::image('media/images/edit.png'))?>
        &nbsp;&nbsp;
            <?=HTML::anchor('admin/playbill/delete/'.$playbill->id, HTML::image('media/images/delete.png'))?>
    </td>
 <? endforeach; ?>  
</tr>
</table>
<p></p>
<p>
  
   <?=HTML::anchor('admin/playbill/add', HTML::image('media/images/add.png'))?>
      <?=HTML::anchor('admin/playbill/add', 'Добавить')?>
</p>


<p><small>Created with <a href="http://html-generator.weebly.com/css-table-generator.html" target="_blank">HTML Generator</a></small></p>


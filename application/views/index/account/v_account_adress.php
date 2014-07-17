<div class="row">
    <div class="col-md-12">
   
<h3>
Адреса Доставки
</h3>

<?if(count($adresses) > 0 ):?>


        <p>Адреса Доставки по Москве</p>
<?if(count($adresses)>= 5):?>
        <p>
            <?=$user?> , можно иметь не более 5 адресов
        </p>
        <?else :?>

<?=HTML::anchor('account/adress_add/'
        , 
        '<button class="btn btn-success" type="button"><i class="fa fa-plus"></i> 
            Добавить Адрес</button>')?>
         <br />
        <?
endif;?>
        
        <br />
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Адрес</th>


            <th>Метро</th>
            <th>Изменить | Удалить</th>

        </tr>
    </thead>
    <tbody>
        
        <?foreach ($adresses as $adress):?>
        <tr>
            <td>
                
               <?=$adress->adress?> 
                
            </td>
            <td>
                <?=$adress->metro?> 
            </td>
            <td>
                 <?=HTML::anchor('account/adress_edit/'.$adress->id, '<button class="btn btn-warning" type="button">
								<i class="fa fa-pencil"></i></button>')?>
                <?=HTML::anchor('account/adress_del/'.$adress->id, '<button class="btn btn-danger" type="button">
								<i class="fa fa-times"></i></button>')?>
            </td>
            
        </tr>
        
        <?
                endforeach;?>
    </tbody>
<?else:?>
        
        <p>Пока нет адресов</p>      
        <?=HTML::anchor('account/adress_add/'
        , 
        '<button class="btn btn-success" type="button"><i class="fa fa-plus"></i> Добавить Адрес</button>')?>
<?endif;?>

</table>



</div>

</div>
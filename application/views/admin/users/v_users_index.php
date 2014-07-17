

<div class="row">
    <div class="col-md-9">
        <div class="portlet">
            <div class="portlet-header">


<h3>Пользователи</h3>
</div>
            <div class="portlet-content">
                
           
<table id="placetb" class="table table-bordered table-highlight" data-paginate="TRUE">
    <thead>
<tr>
    <th>Имя</th>
    <th>Телефон</th>
    <th>Емейл</th>
   
    <th>Роли</th>
    <th>
        Последний вход
    </th>
    <th>
        Заходы
    </th>
    <th>Функции</th>
    
</tr>
</thead>

   <?foreach ($users as $user):?>

<tr>
    
    <td><?=HTML::anchor('admin/users/edit/'. $user->id, $user->username)?></td>
    
    <td><?=$user->phonenumber?></td>
    
   <td><?=$user->email?></td>
   <td>
       <?$roles = $user->roles->find_all();?>
   <?foreach ($roles as $role):?>
       <?if ($role == '1'):?>
       <p>Пользователь</p>
        <?  endif;?>
         <?if ($role == '2'):?>
       <p>Администратор</p>
        <?  endif;?>
       
       <?endforeach;?>

   
   
   </td>
   <td>
       <?=date('d-m-Y', $user->last_login)?>
   </td>
   <td>
       <?=$user->logins?>
   </td>
    <td>
        
           <?=HTML::anchor('admin/users/edit/'. $user->id, '<button class="btn btn-secondary" type="button">
								<i class="fa fa-pencil"></i></button>')?>
        <?=HTML::anchor('admin/users/delete/'. $user->id, '<button class="btn btn-danger" type="button">
								<i class="fa fa-times"></i></button>')?>
    </td>
</tr>
 <? endforeach; ?>  

</table>
                
             



</div>
            </div>
        </div>
    </div>




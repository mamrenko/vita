<?
if (isset($message)):?>
<?=$message?>
<?
else :?>
<h3>Новый пароль выслан на <?=$emailuser?></h3>
<p>Проверьте свой почтовый ящик</p>
<?endif;?>
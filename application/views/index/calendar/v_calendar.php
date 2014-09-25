
<?  if (isset($pickdays)):?>
<?foreach($pickdays as $pickday):?>
<p><?=$pickday->day;?></p>
<p><?=$pickday->playbill->title;?></p>
<? endforeach; ?>
<?else:?>
Ths is calendar
<?endif;?>
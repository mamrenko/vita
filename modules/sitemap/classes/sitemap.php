<?php defined('SYSPATH') or die('No direct script access.');

class Sitemap extends Kohana_Sitemap { 
    
    public static function build()
    {
        // Создаем экземпляр класса Sitemap.
        $sitemap = new Sitemap;
 
        // Через этот объект мы будем добавлять все УРЛы к нашей карте.
        $url = new Sitemap_URL;
 
        // Добавляем необходимые УРЛы к нашей карте сайта
        // Моя CMS хранит их в БД, но Вы можете и просто перечислить нужные ссылки вручную
          $allPages = DB::select()
            ->from('events') 
            ->group_by('playbill_id')
            ->where('day', '>=', date('Y-m-d'))
            ->execute()
            ->as_array(); // берем все события из БД где дата больше чем сегодня
   foreach ($allPages as $v) // для каждой ссылки в цикле
       {
          $priority = '0.9';
//            // Выставляем приоритет индексирования. У меня - для главной страницы - 1, для остальных - 0.9.
//            if ($v['url']== '/') $priority = '1.0';
               $url->set_loc(URL::site('/event/one/'.$v['playbill_id'], true)) // Добавляем саму ссылку. У меня в БД они относительные, поэтому я вставляю домен перед ссылкой
              ->set_last_mod(time()) // Устанавливаем время последнего редактирования. У меня временем последнего редактирования страницы всегда ставится текущее время, чтобы поисковики всегда обновляли индекс
              ->set_change_frequency('always') // Показываем, что страницу нужно индексировать всегда
               ->set_priority($priority);
                $sitemap->add($url); // Добавляем ссылку
         }
 $allPlaces = DB::select('place_id')
         ->from('events')
         ->group_by('place_id')
          ->where('day', '>=', date('Y-m-d'))
         ->as_object()
         ->execute();
 
 
  foreach ($allPlaces as $p) // для каждой ссылки в цикле
       {
          $priority = '0.9';
//            // Выставляем приоритет индексирования. У меня - для главной страницы - 1, для остальных - 0.9.
//            if ($v['url']== '/') $priority = '1.0';
               $url->set_loc(URL::site('/places/place/'.$p->place_id, true)) // Добавляем саму ссылку. У меня в БД они относительные, поэтому я вставляю домен перед ссылкой
              ->set_last_mod(time()) // Устанавливаем время последнего редактирования. У меня временем последнего редактирования страницы всегда ставится текущее время, чтобы поисковики всегда обновляли индекс
              ->set_change_frequency('always') // Показываем, что страницу нужно индексировать всегда
               ->set_priority($priority);
                $sitemap->add($url); // Добавляем ссылку
         }
        
         
          $url->set_loc(URL::site('/', true))
                ->set_last_mod(time())
                ->set_change_frequency('yearly')
                ->set_priority(1);
        
$sitemap->add($url);
        $url->set_loc(URL::site('/contact', true))
                ->set_last_mod(time())
                ->set_change_frequency('yearly')
                ->set_priority(0.9);
        
$sitemap->add($url);

$url->set_loc(URL::site('/deliver', true))
                ->set_last_mod(time())
                ->set_change_frequency('yearly')
                ->set_priority(0.9);

$sitemap->add($url);

$url->set_loc(URL::site('/pay', true))
                ->set_last_mod(time())
                ->set_change_frequency('yearly')
                ->set_priority(0.9);

$sitemap->add($url);
$url->set_loc(URL::site('/places', true))
                ->set_last_mod(time())
                ->set_change_frequency('yearly')
                ->set_priority(0.9);

$sitemap->add($url);

 // Генерируем xml
        $response = urldecode($sitemap->render());
 
        //Записываем в файл sitemap.xml в корне сайта
        file_put_contents('sitemap.xml', $response);
        
        
}
    
    
    
}
<?php defined('SYSPATH') or die('No direct script access.');

class Model_News extends Model {

    // Все новости
    public function get_news($limit = NULL)
    {
        $limit = (int) $limit;

        if($limit == NULL)
        {
            $query = DB::select()->from('news');
            return $query->execute();
        }
        else
        {
            $query = DB::select()->from('news')->limit($limit);
            return $query->execute();
        }
    }

    // Получить одну новость
    public function get_one_news($id)
    {
        $id = (int) $id;

        $query = DB::select()
                ->from('news')
                ->where('id', '=', $id);
        $result = $query->execute();
        return $result[0];
    }

    // Добавить новость
    public function add_news($title,  $content, $date = null)
    {
        if ($date == null)
            $date = date('d.m.Y');

        $query = DB::insert('news', array('title',  'content', 'date'))
                            ->values(array($title,  $content, $date));

        return $query->execute();
    }
} 

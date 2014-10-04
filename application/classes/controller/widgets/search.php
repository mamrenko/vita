<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Виджет "Форма поиска"
 */
class Controller_Widgets_Search extends Controller_Widgets {
    
    public $template = 'widgets/w_search';

    public function action_index()
    {
          $result = ORM::factory('place')->where('title', 'like', '%'.
    'б' . '%')->find_all()->as_array('id', 'title');

        $this->template->result = $result;
        
       //  $_POST ['query'] = 'ж';
        if (isset($_POST['query'])) {
            
             $query = $_POST['query'];
             $result = array();
            

    $result = ORM::factory('place')->where('title', 'like', '%'.
    $query . '%')->find_all();
        
          $cats = array();
            foreach ($result as $cat){
               $cats[$cat->id] = $cat->title;
            }
        
          $val = json_encode($cats);
         $this->template->val = $val;
    }}
    public function action_getjson(){
        
        $_POST ['query'] = 'б';
        if (isset($_POST['query'])) {
            
             $query = $_POST['query'];
             $result = array();
            

    $result = ORM::factory('place')->where('title', 'like', '%'.
    $query . '%')->find_all()->as_array('id', 'title');
        
          $cats = array();
            foreach ($result as $cat){
               $cats[$cat->id] = $cat->title;
            }
        
          $val = $cats;
         $this->template->val = $val;
          //$this->template->query = $query;
             
        }
       // var_dump($result);
//        else{
//           
//        $query =  'Б' ;
//        $vals = DB::select()
//                    ->from('places')
//                    ->where('title', 'LIKE', '%'.$query.'%')
//                    ->as_object()
//                    ->execute()
//                    ;
//           
//        
//          $cats = array();
//            foreach ($vals as $cat){
//               $cats[$cat->id] = $cat->title;
//            }
//         $message = 'Нет никакого поста';
//        $this->template->val = json_encode($cats);
//        $this->template->message = $message;
//         
//    }
        
        
        $result = ORM::factory('place')->where('title', 'like', '%'.
    'q' . '%')->find_all()->as_array('id', 'title');

        $this->template->result = $result;
    }
}

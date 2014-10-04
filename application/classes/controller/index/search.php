<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Поиск
 */
class Controller_Index_Search extends Controller_Index {

    public function action_index() {
        
        $content = View::factory('index/search/v_search_index');
        
        
        
        
        
        // Выводим в шаблон
        $this->template->page_title = 'Поиск';
        $this->template->block_header = array($content);
        //$this->template->block_left = null;
    }
    
        
         public function action_getjson(){
        if (isset($_POST['query'])) {
            
             $query = $_POST['query'];
             $result = array();
            

    $result = ORM::factory('place')->where('title', 'like', '%'.
    $query . '%')->find_all()->as_array('id', 'title');
        
          $cats = array();
            foreach ($result as $cat){
               $cats[$cat->id] = $cat->title;
            }
        
       echo json_encode($cats);
          // $this->template->val = $result;
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
    'м' . '%')->find_all()->as_array('id', 'title');
var_dump($result);
        
    }


}
<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Корзина
 */
class Controller_Index_Cart extends Controller_Index {
    public function before() {
        parent::before();
        
        // $this->template->scripts[] = 'media/BootstrapFormHelpers/ajax.js';
         
         
        // $this->template->styles[] = 'media/js/plugins/bootstrap-touchspin/src/jquery.bootstrap-touchspin.css';
        // $this->template->scripts[] = 'media/js/plugins/bootstrap-touchspin/src/jquery.bootstrap-touchspin.js';
         //$this->template->scripts[] = 'media/js/plugins/bootstrap-touchspin/src/mytouch.js';
         
      
        
    }
    

    public function action_index() {
        
         
         
         
        // $products_s = $this->session->get('products');
         
         
         
         $cost_s = $this->session->get('costs');
         
         $amt_s = $this->session->get('amts');
         
         
         

//        if ($products_s != NULL)
//        {
//            $products = ORM::factory('event');
//
//            foreach($products_s as $id =>$count)
//            {
//                $products->or_where('id', '=', $id);
//            }
//
//            $products = $products->find_all();
//         }else {
//         $products = NULL;
//
//         }
        
         
         if ($cost_s != NULL  and $amt_s!= NULL)
        {
            $orders = ORM::factory('event');

            foreach($cost_s as $id =>$count)
            {
                $orders->or_where('id', '=', $id);
            }

            $orders = $orders->find_all();
            
           
         }else {
         $orders = NULL;
         $this->request->redirect('places');

         }
         
         
        $content = View::factory('index/cart/v_cart_index')
                ->bind('user', $user)
                ->bind('data', $data)
                ->bind('orders', $orders)
                ->bind('products', $products)
                ->bind('products_s', $products_s)         
                ->bind('cost_s', $cost_s)
                ->bind('amt_s', $amt_s)
              
               
                ;

       
     
        
        // Выводим в шаблон
        $this->template->page_title = 'Ваша корзина';
        $this->template->content_title ='Корзина';
         $this->template->block_header = array(
                $content, );
    }

     public function action_add()
    {
        // Получить существующие товары из куков
        $products_s = $this->session->get('products');
        $id = $this->request->param('id');

        if (isset($products_s[$id]))
        {
            $products_s[$id]++;
        }
        else
        {
            $products_s[$id] = 1;
        }

        $this->session->set('products', $products_s);
       // var_dump($products_s);
        $this->request->redirect('cart');
    }
    
    
    
    

public function action_del(){
     $id = abs((int) $this->request->param('id'));
     
             
            
             $cost_s = $this->session->get('costs');
             
             
             
             $amt_s = $this->session->get('amts');
             
             
             
            
            if (array_key_exists($id, $cost_s)) {
                unset($cost_s[$id]);
            }
            
            
            if (array_key_exists($id, $amt_s)) {
                unset($amt_s[$id]);
            }
             
            
             
                
                $this->session->set('costs', $cost_s);
               
                $this->session->set('amts', $amt_s);

            $this->request->redirect('cart');
}


            public function action_edit(){
//Изменение количества и качества билетов в корзине
                  
                 $id = abs((int)$_POST['id']);
                 $_POST['input'] = abs((int)$_POST['input']);
                 $amt_s = $this->session->get('amts');
                 
                 
              if(isset($id) and isset($_POST['input'])){
                   
                  if (isset($amt_s[$id]))
        {
             
              $amt_s[$id] = Arr::get($_POST, 'input');
            
        }
        else
        {
            $amt_s[$id] = Arr::get($_POST, 'input');
             
        }
                   
               }
        //     $id_cost = abs((int)$_POST['id_cost']);
        //       $_POST['cost'] = Security::xss_clean( $_POST['cost']);
           //   $cost_s = $this->session->get('costs');
//        
//                
//                if(isset($id_cost) and isset($_POST['cost'])){
//                   
//                  if (isset($cost_s[$id_cost]))
//        {
//             
//              $cost_s[$id_cost] = Arr::get($_POST, 'cost');
//            
//        }
//        else
//        {
//            $cost_s[$id_cost] = Arr::get($_POST, 'cost');
//             
//        }
//                   
//               }
       
        $this->session->set('amts', $amt_s);
       // $this->session->set('costs', $cost_s);
        $this->request->redirect('cart');
             
            }
            
            
            public function action_edit_cost(){
                
                
                
                if(isset($_POST['id_cost']) and isset($_POST['cost'])){
                    
                    $id_cost = $_POST['id_cost'];
                  $id_cost = UTF8::substr_replace($id_cost, '',0,4);
                  $id_cost =  abs((int)$id_cost);
                    //echo '<h1>'.$id_cost.'</h1>';
                   // echo '<h1>'.$_POST['cost'].'</h1>';
                $_POST['cost'] = Security::xss_clean( $_POST['cost']);
                $cost_s = $this->session->get('costs');
                   
                  if (isset($cost_s[$id_cost]))
        {
             
              $cost_s[$id_cost] = Arr::get($_POST, 'cost');
           
        }
        else
        {            $cost_s[$id_cost] = Arr::get($_POST, 'cost');
             
       }
                   
               }
       
        
        $this->session->set('costs', $cost_s);
        $this->request->redirect('cart');
             
                
            }

            public function _getmonth($month){
            
            
            
            switch ($month) {
case 1:
    $month =  " Января";
    break;
case 2:
    $month =  " Февраля";
    break;
case 3:
    $month =  " Марта";
    break;
case 4:
    $month = " Апреля";
    break;
case 5:
    $month = " Мая";
    break;
case 6:
    $month = " Июня";
    break;
case 7:
    $month = " Июля";
    break;
case 8:
    $month =  " Августа";
    break;
case 9:
    $month = " Сентября";
    break;
case 10:
    $month = " Октября";
    break;
case 11:
    $month = " Ноября";
    break;
case 12:
    $month = " Декабря";
    break;
default:
    $month = "????";
}
return $month;
        }
        
        public function _getday($den)
        {
            switch ($den) {
case 1:
    $den =  " Понедельник";
    break;
case 2:
    $den =  " Вторник";
    break;
case 3:
    $den =  " Среда";
    break;
case 4:
    $den =  " Четверг";
    break;
case 5:
    $den =  " Пятница";
    break;
case 6:
    $den =  " Суббота";
    break;
case 7:
    $den =  " Воскресенье";
    break;
default:
    $den =  " ????";
}
            
return $den;       
        } 
        
        
        public function action_order(){
            // Для Зарегистрированных
            if (!$this->auth->logged_in())
        {
                $this->request->redirect('cart/orders');
           
        }
          $adresses = ORM::factory('adress')
                ->where('user_id', '=', $this->user->id)
                 ->find_all();
         $arr_adresses = array();
foreach ($adresses as $key) {
         $arr_adresses[$key->adress.'. Метро:   '.$key->metro] = $key->adress.'  '.$key->metro;
}
           
           // $products_s = $this->session->get('products');
             $cost_s = $this->session->get('costs');
         
             $amt_s = $this->session->get('amts');

        
        
         
         if ($cost_s != NULL  and $amt_s!= NULL)
        {
            $orders = ORM::factory('event');

            foreach($cost_s as $id =>$count)
            {
                $orders->or_where('id', '=', $id);
            }

            $orders = $orders->find_all();
           
          
            
         }else {
          $orders = NULL;
          $this->request->redirect('places');

         }
          if (isset($_POST['submit']))
        {
               $_POST['seladr'] = Security::xss_clean( $_POST['seladr']); 
               $data = Arr::extract($_POST, array('seladr','status'));
               $data2 = array('user_id' => $this->user->id);
               $data = Arr::merge($data2, $data);
               $orderuser = ORM::factory('orderuser');
               
               $orderuser->values($data);
               
                  try {
               $orderuser->save();
               $orderuser_id = $orderuser->pk();
               $user_id = $this->user->id;
               
              foreach ($orders as $order) {
                
         $addorder = ORM::factory('booking');
         $addorder->orderuser_id =  $orderuser_id;
         $addorder->user_id = $user_id;
        $addorder->place = $order->playbill->place->title;
        $addorder->playbill = $order->playbill->title;
        $addorder->scene = $order->scene->title;
        $addorder->dt = $order->day;
        $addorder->tm = $order->start;
        $addorder->amt = $amt_s[$order->id];
        $addorder->cost = $cost_s[$order->id];
        $addorder->save();
      
            }
             $this->request->redirect('account/orders');
            
        }  catch (ORM_Validation_Exception $e) {
                $errors = $e->errors('validation');
            }
              
        }
        


        $content = View::factory('index/cart/v_cart_order')
                    ->bind('arr_adresses',  $arr_adresses)
                    ->bind('orders', $orders)
                    ->bind('amt_s', $amt_s)
                    ->bind('cost_s', $cost_s)
                    ->bind('data', $data)
                     ->bind('errors', $errors)
                    
                    ;
            // Выводим в шаблон
        $this->template->page_title = 'Оформление заказа';
        $this->template->content_title ='Оформление заказа';
       $this->template->block_header = array(
                $content, );
            
        }
        
        public function action_orders(){
            //Для НЕ зарагистрированных
             
             $costomers_s = $this->session->get('costomers');
             if ($costomers_s != NULL ) {
                 $this->session->delete('costomers');
                 
            }
             $cost_s = $this->session->get('costs');
         
             $amt_s = $this->session->get('amts');

        
        
         
         if ($cost_s != NULL  and $amt_s!= NULL)
        {
            $orders = ORM::factory('event');

            foreach($cost_s as $id =>$count)
            {
                $orders->or_where('id', '=', $id);
            }

            $orders = $orders->find_all();
          
            //$metros = ORM::factory('adress');
          
            
         }else {
         $orders = NULL;
         $this->request->redirect('places');
         }
         
         
         $get_sets = Model::factory('adress')->get_sets();
          $gets = array();
          foreach ($get_sets as $key => $value) {
            $gets[$value] = $value;
            }
            
            if (isset($_POST['submit']))
        {
                
               
            $_POST['email'] = Security::xss_clean( $_POST['email']);
           $_POST['name'] = Security::xss_clean( $_POST['name']);
           $_POST['phone'] = Security::xss_clean( $_POST['phone']);
           $_POST['adress'] = Security::xss_clean( $_POST['adress']);
            $_POST['metro'] = Security::xss_clean($_POST['metro']); 
           
           $data = Arr::extract($_POST, array('email','name','phone','adress' ,'metro','status'));
           
            $customer = ORM::factory('customer');
            $customer->values($data);
         
          
            
        

         try {
             
             
               $customer->save();
               $сostom_id = $customer->pk();
               
           
            foreach ($orders as $order) {
                
              $addorder = ORM::factory('order');
        $addorder->custom_id = $сostom_id;
        $addorder->place = $order->playbill->place->title;
        $addorder->playbill = $order->playbill->title;
        $addorder->scene = $order->scene->title;
        $addorder->dt = $order->day;
        $addorder->tm = $order->start;
        $addorder->amt = $amt_s[$order->id];
        $addorder->cost = $cost_s[$order->id];
        $addorder->save();
      
            }
            
            
            
            $admin_email = Kohana::config('settings.admin_email');
            $site_name = Kohana::config('settings.site_name');
            $order_email = Kohana::config('settings.order_email');
            
            
            $myorders = ORM::factory('order')
                    ->where('custom_id', '=', $сostom_id)
                    ->find_all();
//            
            $letter =  View::factory('index/order/v_letter')
                    ->bind('name', $data['name'])
                    ->bind('adress', $data['adress'])
                    ->bind('phone', $data['phone'])
                    ->bind('сostom_id', $сostom_id)
                    ->bind('myorders', $myorders)
                   
                    ;
            
            $this->template->page_title = 'Уведомление о Заказе';
            $this->template->content_title ='Уведомление о Заказе';
            $this->template->block_header = array(
                $letter, );
                  //  var_dump($myorders);
                    //echo Debug::vars($myorders);
            $email = Email::factory('Сделан Заказ Билетов на сайте Аплодисменты', $letter,'text/html')
                    
                    ->to($data['email'], $data['name'])
                    ->from($admin_email, $site_name)
                    ->send();    
            
            $lettome = View::factory('index/order/v_lettertome')
                      ->bind('name', $data['name'])
                    ->bind('adress', $data['adress'])
                    ->bind('phone', $data['phone'])
                     ->bind('metro', $data['metro'])
                     ->bind('email', $data['email'])
                    ->bind('сostom_id', $сostom_id)
                    ->bind('myorders', $myorders)
                    ;
            $emailtome = Email::factory('Заказ на сайте', $lettome, 'text/html')
                    ->to($order_email, $site_name)
                    ->from($admin_email, $site_name)
                    ->send();
            
            
            
            // Удалить товары из корзины
        $this->session->delete('costs');
        $this->session->delete('amts');
        
           $this->session->set('costomers', $сostom_id);
            
              $this->request->redirect('order/get_order');
            
              
              
            }
            catch (ORM_Validation_Exception $e) {
                $errors = $e->errors('validation');
            }
            
        }
            
            $content = View::factory('index/cart/v_cart_orders')
                    ->bind('data', $data)
                   ->bind('orders', $orders)
                  ->bind('cost_s', $cost_s)
                  ->bind('amt_s', $amt_s)
                  ->bind('errors', $errors)
                     ->bind('gets', $gets)
                 ;
            
            // Выводим в шаблон
        $this->template->page_title = 'Оформление заказа';
        $this->template->content_title ='Оформление заказа';
       $this->template->block_header = array(
                $content, );
            
        }
        
       
}
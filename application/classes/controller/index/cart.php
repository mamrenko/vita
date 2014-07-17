<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Корзина
 */
class Controller_Index_Cart extends Controller_Index {
    public function before() {
        parent::before();
        
         $this->template->scripts[] = 'media/BootstrapFormHelpers/ajax.js';
    }
    

    public function action_index() {
        
         
         
         
         $products_s = $this->session->get('products');
         
         
         
         $cost_s = $this->session->get('costs');
         
         $amt_s = $this->session->get('amts');
         
         
         

        if ($products_s != NULL)
        {
            $products = ORM::factory('event');

            foreach($products_s as $id =>$count)
            {
                $products->or_where('id', '=', $id);
            }

            $products = $products->find_all();
         }else {
         $products = NULL;

         }
        
         
         if ($cost_s != NULL  and $amt_s!= NULL)
        {
            $orders = ORM::factory('event');

            foreach($cost_s as $id =>$count)
            {
                $orders->or_where('id', '=', $id);
            }

            $orders = $orders->find_all();
//            foreach ( $orders as $order) {
//                
//            }
//                 $month = $this->_getmonth(date('m', strtotime($order->day))) ;  
//                $den = $this->_getday(date('N',strtotime($order->day)));
            
         }else {
         $orders = NULL;

         }
         
         
        $content = View::factory('index/cart/v_cart_index')
                ->bind('user', $user)
                ->bind('data', $data)
                ->bind('orders', $orders)
                ->bind('products', $products)
                ->bind('products_s', $products_s)
                ->bind('orders', $orders)
                ->bind('sum', $cart['sum'])
                ->bind('cost_s', $cost_s)
                ->bind('amt_s', $amt_s)
                //->bind('amt', $amt)
               // ->bind('den', $den)
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

                
                 $amt_s = $this->session->get('amts');
                 
                 
               if(isset($_POST['input']) and isset($_POST['inputid'])){
                   
                  
                   //var_dump($_POST['inputid']) ;
                  echo $_POST['inputid'] .'  это'.$_POST['input'];
                   
                   $id = $_POST['inputid'];
                  // $amt = $_POST['input'];
               }
        if (isset($amt_s[$id]))
        {
             
              $amt_s[$id] = Arr::get($_POST, 'input');
            
        }
        else
        {
            $amt_s[$id] = Arr::get($_POST, 'input');
             
        }
        $this->session->set('amts', $amt_s);
        //$this->request->redirect('cart');
             
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
            
            if (!$this->auth->logged_in())
        {
                $this->request->redirect('cart/orders');
           
        }
            $content = View::factory('index/cart/v_cart_order')
               //  ->bind('amt', $amt)
                    
                    ;
            // Выводим в шаблон
        $this->template->page_title = 'Оформление заказа';
        $this->template->content_title ='Оформление заказа';
       $this->template->block_header = array(
                $content, );
            
        }
        
        public function action_orders(){
            
             
             $products_s = $this->session->get('products');
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
           // $orders3 = $orders->as_array();
          
            
         }else {
         $orders = NULL;

         }
         
            
            if (isset($_POST['submit']))
        {
                
               
            $_POST['email'] = Security::xss_clean( $_POST['email']);
           $_POST['name'] = Security::xss_clean( $_POST['name']);
           $_POST['phone'] = Security::xss_clean( $_POST['phone']);
           $_POST['adress'] = Security::xss_clean( $_POST['adress']);
           
           $data = Arr::extract($_POST, array('email','name','phone','adress' ,'status'));
           
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
        $addorder->dt = $order->day;
        $addorder->tm = $order->start;
        $addorder->amt = $amt_s[$order->id];
        $addorder->cost = $cost_s[$order->id];
        $addorder->save();
      
            }
            
            
            
            $admin_email = Kohana::config('settings.admin_email');
            $site_name = Kohana::config('settings.site_name');
            $myorders = ORM::factory('order')
                    ->where('custom_id', '=', $сostom_id)
                    ->find_all();
//            
            $letter =  View::factory('index/order/v_letter')
                    ->bind('adress', $data['adress'])
                    ->bind('phone', $data['phone'])
                    ->bind('сostom_id', $сostom_id)
                    ->bind('myorders', $myorders)
                    ;
                  //  var_dump($myorders);
                    //echo Debug::vars($myorders);
            $email = Email::factory('Сделан Заказ Билетов на сайте Аплодисменты', $letter,'text/html')
                    
                    ->to($data['email'], $data['name'])
                    ->from($admin_email, $site_name)
                    ->send();    
            
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
                 ;
            
            // Выводим в шаблон
        $this->template->page_title = 'Оформление заказа';
        $this->template->content_title ='Оформление заказа';
       $this->template->block_header = array(
                $content, );
            
        }
        
        public function _array_pluck($toPluck, $arr){
            $ret = array();
            foreach ($arr as $key => $value) {
                    $ret[] = $value[$toPluck];

            }
            return($ret);

            }
}
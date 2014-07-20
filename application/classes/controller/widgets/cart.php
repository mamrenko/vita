<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Виджет "Корзина"
 */
class Controller_Widgets_Cart extends Controller_Widgets {
    
    public $template = 'widgets/w_cart';
    //protected $session;
    public function before() {
        parent::before();
        Session::$default = 'cookie';
          $this->session = Session::instance();
    }

    public function action_index()
    {
      $cost_s = $this->session->get('costs');
    $carts = count($cost_s);
     $this->template->carts = $carts;
        
    }

}
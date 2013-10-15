<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Заказы
 */
class Controller_Admin_Orders extends Controller_Admin {

    public function action_index() {
        $submenu = Widget::load('adminmenuorders');
        $content = View::factory('admin/orders/v_orders_index')
                ->set('submenu', $submenu);

        // Вывод в шаблон
        $this->template->page_title = 'Заказы';
        $this->template->block_center = array($content);
        $this->template->block_left = array($submenu);
    }
}
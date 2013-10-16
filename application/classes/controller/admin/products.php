<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Продукты
 */
class Controller_Admin_Products extends Controller_Admin {

    public function action_index() {

        $submenu = Widget::load('adminmenuproducts');
        $content = View::factory('admin/products/v_products_index');

        // Вывод в шаблон
        $this->template->page_title = 'Товары';
        $this->template->block_center = array($content);
        $this->template->block_left = array($submenu);
        
    }
}
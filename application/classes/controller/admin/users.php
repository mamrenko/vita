<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Пользователи
 */
class Controller_Admin_Users extends Controller_Admin {
    public function before() {
        parent::before();
            $this->template->scripts[] = 'canvas/js/plugins/datatables/jquery.dataTables.min.js';
            $this->template->scripts[] = 'canvas/js/plugins/datatables/DT_bootstrap.js';
            $this->template->scripts[] = 'canvas/js/plugins/datatables/placetb.js';
    }

    public function action_index() {

        $submenu = Widget::load('adminmenuusers');
        $users = ORM::factory('user')->find_all();
        $content = View::factory('admin/users/v_users_index')
                ->bind('users', $users)
                ;

        // Вывод в шаблон
        $this->template->page_title = 'Пользователи';
        $this->template->block_center = array($content);
        $this->template->block_left = array($submenu);
    }
    
    public function action_delete(){
        $id = (int) $this->request->param('id');
        $user = ORM::factory('user', $id);
        $roles = ORM::factory('role')->find_all()->as_array();
       
        if(!$user->loaded()) {
            $this->request->redirect('admin/users');
        }
        
        $user->remove('roles');
        $user->delete();
        $this->request->redirect('admin/users');
    }

}

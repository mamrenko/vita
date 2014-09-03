<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Taketickets extends Controller_Admin {
     public function before() {
        parent::before();
         $this->template->scripts[] = 'canvas/js/plugins/datatables/jquery.dataTables.min.js';
            $this->template->scripts[] = 'canvas/js/plugins/datatables/DT_bootstrap.js';
            $this->template->scripts[] = 'canvas/js/plugins/datatables/placetb.js';
             $this->template->scripts[] = 'canvas/js/plugins/tableCheckable/jquery.tableCheckable.js';
            $this->template->scripts[] = 'canvas/js/plugins/tableCheckable/mychecktable.js';
             
            $this->template->scripts[] = 'canvas/js/plugins/select2/select2.js';
           
            $this->template->styles[] = 'canvas/js/plugins/datepicker/datepicker.css';
            $this->template->scripts[] = 'canvas/js/plugins/datepicker/bootstrap-datepicker.js';     
            $this->template->scripts[] = 'canvas/js/plugins/datepicker/bootstrap-datepicker.ru.js';
            
             $this->template->scripts[] = 'canvas/js/demos/form-extended.js';
    }

    public function action_index() {
        
        $submenu = Widget::load('adminmenuorders');
        
         $taketickets = ORM::factory('taketicket')
                 ->order_by('dmy','DESC')
                 ->find_all();
        $content = View::factory('admin/taketickets/v_taketickets_index')
                ->bind('taketickets', $taketickets);
                

        // Вывод в шаблон
        $this->template->page_title = 'У кого брали и какие билеты';
        
        $this->template->block_center = array($content);
        $this->template->block_left = array($submenu);
    }
    public function action_add(){
    
         if (isset($_POST['submit']))
        {
         
            $_POST['comment'] = Security::xss_clean( $_POST['comment']);
            $_POST['day'] = date('Y-m-d', strtotime( $_POST['day']));
        
            $data = Arr::extract($_POST, array(
                'day', 
                'comment',
                'college',
                'customer_id',
                'order_id'
                ));
            $data2 = array(
                'booking_id' => '0',
                'orderuser_id' => '0',
            );
            $data = Arr::merge($data2, $data);
            $taketicket = ORM::factory('taketicket');
             $taketicket->values($data);
            

         try {
                $taketicket->save();
                $taketicket->add('associates', $data['college']);
                $this->request->redirect('admin/taketickets');
            }
            catch (ORM_Validation_Exception $e) {
                $errors = $e->errors('validation');
             
                }
            }

    }


}
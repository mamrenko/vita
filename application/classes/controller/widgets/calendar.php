<?php defined('SYSPATH') OR die('No direct script access.');

class Controller_Widgets_Calendar extends Controller_Widgets
 
{
   
    public $template = 'widgets/w_calendar';

    public function action_index()
	{
          if(isset($_POST['datavalue'])) {
              echo $_POST['datavalue']. 'Ну что то получилочь';
          }
        
} 
}

       
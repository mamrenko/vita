<?php defined('SYSPATH') OR die('No direct script access.');

class Model_Place extends ORM {
    
        protected $_has_many = array(
		'playbills' => array(
			'model' => 'playbill',
			'foreign_key' => 'place_id',
		),
                'scenes' => array(
			'model' => 'scene',
			'foreign_key' => 'place_id',
		),
	);
   
   
    protected $_has_one = array(
        'event' => array(
            'model' => 'event',
            'foreign_key' => 'place_id',
            ),
        
       
        );

    
//    public function rules()
//    {
//        return array(
//            'title' => array(
//                array('not_empty'),
//                array('min_length', array(':value', 3)),
//                
//            ),
//             'adress' => array(
//                array('not_empty'),
//                
//            ),
//            
//            'description' => array(
//                array('not_empty'),
//                array('min_length', array(':value', 20)),
//            ),
////           'image' => array(
////             array('Upload::not_empty') ,
////             array('Upload::valid'),
////             array('Upload::type', array(':value',array( 'jpg', 'jpeg', 'png', 'gif','JPG',))),   
////             array('Upload::size', array(':value', '10M')),             )
////        
////      
//            
//        );
//
//  
//    }
//
//    public function labels()
//    {
//        return array(
//            'title' => 'Название Площадки',
//            'adress' => 'Адрес Площадки',
//            
//            'description' => 'Описание  Площадки',
//            'image' => 'Загрузка картинки',
//        );
//    }
//
    public function filters()
    {
        return array(
           
            'title' => array(
                array('strip_tags'),
                array('trim'),
            ),
            'adress' => array(
                array('strip_tags'),
                array('trim'),
            ),
            'description' => array(
                array('strip_tags'),
                array('trim'),
            ),
            
        );
    }
     public function save_data($post, $file){ 
         
         $validpost = Validation::factory($post)
      ->rules('title', array(array('not_empty'),
          array('min_length', array(':value', 3)),
          array('max_length', array(':value', 50))))
                 
      ->rules('adress', array(array('not_empty'),
          array('min_length', array(':value', 10)),
          array('max_length', array(':value', 70))))
                 
       ->rules('description', array(array('not_empty'),
          array('min_length', array(':value', 50)),
          array('max_length', array(':value', 500))))
                 
      ->labels(array('title'=>'Название','adress'=>'Адрес ', 'description' => 'Описание'))
     
        ;
         
      $validfile = Validation::factory($file)
      ->rules('image',array(
        array('Upload::not_empty'),
        array('Upload::valid'),
        array('Upload::size' ,array(':value', '1M')),
        array('Upload::type' ,array(':value', array('jpg', 'jpeg', 'png', 'gif','JPG',))),
      ))
      ->labels(array('image'=>'Изображение')); 
      
      
      
      $checkpost=$validpost->check();
      $checkfile=$validfile->check();
      
      
      if($checkpost && $checkfile){
      $this->title=Arr::get($post, 'title', NULL);      //dodanie tytułu
      $this->adress=Arr::get($post, 'adress', NULL);  //dodanie treści
      $this->description=Arr::get($post, 'description', NULL);  //dodanie treści
     
      
      
      
      $img=Image::factory($file['image']['tmp_name']);  //tymczasowy plik
      $filename = strtolower(Text::random('alnum', 20));  //unikalna nazwa pliku
      
         
      $img->resize('600','800');//skalowanie
      $mark = image::factory('media/images/watermark10023.png');
      $img->watermark($mark,100,100);
      $img->save('media/uploads/places/'.$filename.'.jpg',70);     //zapisanie pliku o zmniejszonej jakości
      $this->image=$filename.'.jpg';                    //dodanie nazwy obrazka
 
      
      $img->resize('200','200'); 
      $img->watermark($mark,50,50);//skalowanie
      $img->save('media/uploads/places/small_'.$filename.'.jpg',70);     //zapisanie pliku o zmniejszonej jakości
      $this->image=$filename.'.jpg';                    //dodanie nazwy obrazka
      $this->save();  //zapisanie do bazy
      
      

 
            // Delete the temporary file
            //unlink($file);
      
      

      return false;   //zwrócenie false oznacza, że błędy nie wystąpiły
    }else{
      return Arr::merge($validpost->errors('validation'),$validfile->errors('messages'));
    } 
         
     }
}

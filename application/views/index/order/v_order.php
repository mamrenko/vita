
<div class='row'>
<ol class="breadcrumb">
     <li><a href="<?=URL::base()?>places">Площадки</a></li>
     <li><a href="<?=URL::base()?>places/place/<?=$event->place_id;?>"><?=$event->playbill->place->title;?></a></li>
     <li class="active"><?=$event->playbill->title;?></li>
  
</ol>
     
     
    
    
 <div class="panel panel-info">
     <img class="img-responsive img-thumbnail pull-right" 
                       src="<?=URL::base();?>media/uploads/playplaces/<?=$event->playbill->image;?>" 
                              alt="<?=$event->playbill->title;?>">
                <div class="panel-heading">
                    
                    <h2>Заказ Билетов: </h2>
                 
                   <h3><?=HTML::anchor('places/place/'.$event->playbill->place->id, $event->playbill->place->title)?>
                   </h3>
                    <h3><?=HTML::anchor('event/one/'.$event->playbill->id, $event->playbill->title);?></h3>
                    <h4><?=$event->playbill->subtitle;?></h4>
                    <h4><?=date('d-m-Y', strtotime($event->day));?></h4>
                    <h2></h2>
                  
                </div>
                <div class="panel-body">
                  <div class="col-md-3">  
                   <?=Form::open('order/add/'.$event->id, array(
                'id' => 'contactFor',
                'class' => 'form parsley-form',
                'data-validate' => 'parsley',
          ));?>
                    
                    <div class="form-group">
                        
                         <?=Form::label('cost', 'Стоимость билетов')?>
                          <?=Form::select('cost', $costs_s);?>
                        
                        
                    </div>
                    
                    
                    
                   <!--- <div class="form-group">
           <?//=  Form::label('amt', 'Количество билетов')?>
                        <?//$val = Arr::range(1,20)  ?>  
                      
                      <?//=Form::select('amt', 
                           //  $val, 2,array(
                               
                            // )
                      //);?> 
             
                       
                    </div>
                   --->
                    
              <div class="form-group bfh-number">
                           <?=  Form::label('amt', 'Количество билетов')?>
                        <?=Form::input('amt', 2, array(
                            'type' =>'text',
                            'class' => 'form-control bfh-number',
                            'data-min'=> '1',
                            'data-max' => '25',
                        ));?>
                        
                    </div>
                    <div class="form-group">
                        
                       
                      <?=Form::button('submit', 'Заказать', array(
                          'type' => 'submit',
                          'class' => 'btn btn-success',
                          ));?> 
                        
                    </div>
    
                 <?=Form::close()?>

                    
                    
                    
                    
                </div>
     </div>
  </div>
        
</div>

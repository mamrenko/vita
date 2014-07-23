
<div class='row'>
<ol class="breadcrumb">
     <li><a href="<?=URL::base()?>places">Площадки</a></li>
     <li><a href="<?=URL::base()?>places/place/<?=$event->place_id;?>"><?=$event->playbill->place->title;?></a></li>
     <li class="active"><?=$event->playbill->title;?></li>
  
</ol>
      <div class="panel panel-default">
                    <div class="panel-body">
                 <img class="img-responsive img-thumbnail pull-right" 
                       src="<?=URL::base();?>media/uploads/playplaces/<?=$event->playbill->image;?>" 
                              alt="<?=$event->playbill->title;?>">
                    <h3>Заказ Билетов: </h3>
                 
                   <h3><?=HTML::anchor('places/place/'.$event->playbill->place->id, $event->playbill->place->title)?>
                   </h3>
                    <h3><?=HTML::anchor('event/one/'.$event->playbill->id, $event->playbill->title);?></h3>
                    <h4><?=$event->playbill->subtitle;?></h4>
                    <h4><?=date('d-m-Y', strtotime($event->day));?></h4>
                    
     
</div></div></div>
    
 
    <div class="row">
        <?=Form::open('order/add/'.$event->id, array(
                
                'class' => 'form parsley-form',
                'data-validate' => 'parsley',
          ));?>
                    
     <div class="col-md-5">  
                
               
               
              
 
                   
                  <div class="form-group">
                        
                         <?=Form::label('cost', 'Стоимость билетов')?>
                          <?=Form::select('cost', $costs_s,'',array(
                              'class' => "form-control",
                          ));?>
                        
                        
                    </div>
                    
                    
             
                   
                    
                    
                    
              </div>          
              
    
     <div class="col-md-3">
          <div class="form-group bfh-number">
                           <?=  Form::label('amt', 'Количество билетов')?>
                        <?=Form::input('amt', 2, array(
                            'type' =>'text',
                            'class' => 'form-control bfh-number',
                            'data-min'=> '1',
                            'data-max' => '25',
                        ));?>
                        
                    </div>
        
         
     </div></div>
<div class="row">
        <div class="col-md-8 text-right">
            <div class="form-group">
                        
                       
                      <?=Form::button('submit', 'Заказать', array(
                          'type' => 'submit',
                          'class' => 'btn btn-success',
                          ));?> 
                        
                    </div>
    
                 <?=Form::close()?>
</div>
        </div>
        
             
     

        


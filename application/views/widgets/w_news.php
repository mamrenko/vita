<?if(count($all_news)>0):?>
    <div class="panel panel-info">
                <div class="panel-heading">
                    <h2 class="panel-title">
                    Новости
                    </h2>
              </div>
                <div class="panel-body">
                    <?foreach($all_news as $news):?>

                        <h3><?=HTML::anchor('news/get/' . $news->id, $news->title)?></h3>
                        <p><?=  Text::limit_chars($news->content)?></p>
                    <?endforeach?>
               </div>
                <div class="panel-footer">
                 <a href="<?=URL::base()?>news">
 
                <button class="btn btn-info">    
                  Все новости
                </button>
                 </a>    
                </div>
        </div>
    
<?
endif;?>

   
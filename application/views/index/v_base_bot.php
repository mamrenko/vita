<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="<?=URL::base()?>media/dist/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?=URL::base()?>media/dist/css/amelia-bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="<?=URL::base()?>media/dist/css/site.css">
</head>

<body>
    
<div id="page">
    <header  class="container">
        <div id="menu" class="navbar navbar-default ">
            <div class="navbar-header">
            <button class="btn btn-success navbar-toggle"
                    data-toggle="collapse"
                    data-target=".navbar-collapse"><span class="glyphicon glyphicon-chevron-down"></span>
              
            </button>
            
            <div id="logo">
                <a href=".">
                    <h3>www.aplodismenty.ru</h3>
                </a>
           </div>
           </div>
            
            <div class="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">

                         <?=$topmenu?>

            </ul>
            
            </div>
            
        </div>
        
    </header>
    <section id="body"  class="container">
        
        <div class="page-header">
          
            <h1>
               Агентство Аплодисменты
            </h1>
            <p class="text-warning">
                Заказ и Доставка  Билетов, Афиша Москвы 
            </p> 
            <ol class="breadcrumb">
                
                <li c>
                    <a href='/'>Главная</a>
                </li>
                <li lass="active">
                    Переход 1
                </li>
                
                <li>
                    <a href='/'>Переход 2</a>
                </li>
                
            </ol>
<!--            Insert Pagination-->
<ul class="pager">
    <li class="previous"><a href="#">&larr; Prev</a></li>
     <li class="next"><a href="#">Next &rarr;</a></li>
</ul>
     


<ul class="pagination">
    <li class="disabled"><a href="#">&laquo;</a></li>
    <li class="active"><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">&raquo;</a></li>
</ul>
        </div>
        
<!--    End  <div class="page-header">  -->
 <div class="row hidden-xs">
      <div class="col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
    <div class="carousel slide" id="theCarousel" data-interval="2000">
       <ol class="carousel-indicators">
              <li data-target="#theCarousel" data-slide-to="0" class="active"></li>
              <li data-target="#theCarousel" data-slide-to="1"></li>
              <li data-target="#theCarousel" data-slide-to="2"></li>
              <li data-target="#theCarousel" data-slide-to="3"></li>
            </ol>
        
        <div class="carousel-inner">
       
            <div class="item active">
                <img src="http://placehold.it/800x450" alt="1"
                 class="img-responsive"/>
                <div class="carousel-caption">
                    <h4>Name First</h4>
                    <p>Здесь какой нибудь текст 111</p>
                </div>
            </div>
             <div class="item">
                 <img src="http://placehold.it/800x450" alt="3" class="img-responsive"/>
                 <div class="carousel-caption">
                    <h4>Привет </h4>
                    <p>Здесь какой нибудь текст2222</p>
                </div>
             </div>
             <div class="item">
                 <img src="http://placehold.it/800x450" alt="2" class="img-responsive"/>
                 <div class="carousel-caption">
                    <h4>Цирк Дю сОлей</h4>
                    <p>Здесь какой нибудь текст Цирк</p>
                </div>
             </div>
             <div class="item">
                 <img src="http://placehold.it/800x450" alt="4" class="img-responsive"/>
                 <div class="carousel-caption">
                    <h4>Еще меропрятие</h4>
                    <p>Здесь какой нибудь текст 111</p>
                </div>
             </div>
            </div>
        <a href="#theCarousel" class="carousel-control left" data-slide="prev"><span class="icon-prev"></span></a>
            <a href="#theCarousel" class="carousel-control right" data-slide="next"><span class="icon-next"></span></a>
        </div>
    </div> 
 </div>
<hr/>



    	<section id="main" class="col-md-9">
            
        <p class="lead">
            Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться.
            Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное
            заполнение шаблона, а также реальное распределение букв и пробелов в абзацах, 
            которое не получается при простой дубликации 
            "Здесь ваш текст.. Здесь ваш текст.. Здесь ваш текст.."
        </p>
             <img src="http://placehold.it/350x150" alt="3" class="pull-right img-thumbnail"/>
       
        <p>
            Многие программы электронной вёрстки и редакторы HTML используют Lorem Ipsum
            в качестве текста по умолчанию, так что поиск по ключевым словам "lorem ipsum" 
            сразу показывает, как много веб-страниц всё ещё дожидаются своего настоящего рождения. 
            За прошедшие годы текст Lorem Ipsum получил много версий. 
            Некоторые версии появились по ошибке, некоторые - намеренно (например, юмористические варианты).
 
        </p>
        <p>
            Многие программы электронной вёрстки и редакторы HTML используют Lorem Ipsum
            в качестве текста по умолчанию, так что поиск по ключевым словам "lorem ipsum" 
            сразу показывает, как много веб-страниц всё ещё дожидаются своего настоящего рождения. 
            За прошедшие годы текст Lorem Ipsum получил много версий. 
            Некоторые версии появились по ошибке, некоторые - намеренно (например, юмористические варианты).
 
        </p>
      
             <div class="well">
        <p class="text-warning">
            Многие программы электронной вёрстки и редакторы HTML используют Lorem Ipsum
            в качестве текста по умолчанию, так что поиск по ключевым словам "lorem ipsum" 
            сразу показывает, как много веб-страниц всё ещё дожидаются своего настоящего рождения. 
            За прошедшие годы текст Lorem Ipsum получил много версий. 
            Некоторые версии появились по ошибке, некоторые - намеренно (например, юмористические варианты).
 
        </p>
       </div>
        <br />
        <div class="row">
            
            <h1>The best мероприятия</h1>
         <ul class="list-unstyled">
                <li class="col-md-3">
                <div class="thumbnail ">
                <img src="http://placehold.it/300x200" alt="" class="img-responsive">
                <div class=" caption">
                <h3>RRRRRRRnnn</h3>
                <p>Описание и текст…</p>
                </div>
                </div>
                </li>
                <li class="col-md-3">
                <div class="thumbnail">
                <img src="http://placehold.it/300x200" alt="">
                <div class="caption">
                <h3>Заголовок</h3>
                <p>Описание и текст…</p>
                </div>
                </div>
                </li>
                <li class="col-md-3">
                <div class="thumbnail">
                <img src="http://placehold.it/300x200" alt="">
                <div class="caption">
                <h3>Заголовок</h3>
                <p>Описание и текст…</p>
                </div>
                </div>
                </li>
                <li class="col-md-3">
                <div class="thumbnail">
                <img src="http://placehold.it/300x200" alt="">
                <div class="caption">
                <h3>Заголовок</h3>
                <p>Описание и текст…</p>
                </div>
                </div>
                </li>
            </ul>
        </div>
        <h1>Tables</h1>
        <div class="row">
            <div class="col-md-10">
                <div class="table-responsive">
                    
        <table class="table table-striped table-bordered table-hover table-condensed">
            <thead>
                <tr>
                    <th>One</th>
                    <th>Two</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>ggggh</td>
                    <td>hfhjfljhljh</td>
                </tr>
                <tr>
                    <td>dghgkkfk</td>
                    <td>uyrfuyuyuy</td>
                </tr>
                <tr>
                    <td>tfyuuyuu</td>
                    <td></td>
                </tr>
                <tr>
                    <td>tfuyfuyyfu</td>
                    <td>hgdghfhg</td>
                </tr>
                <tr>
                    <td>nchvjhkljhh</td>
                    <td>mhgvhnlhjkkj</td>
                </tr>
            </tbody>
        </table>
            </div>
            </div>
        </div>
        
        
        
        <div class="col-md-7">
      
        <h1>Example</h1>
        <ul class="list-group">
                <li class="list-group-item">
                    <span class="badge">
                        <span class="glyphicon glyphicon-calendar">
                        </span>  
                    </span>
                  Один Описание и текст
                
                </li>
                <li class="list-group-item">
                
                 Два Описание и текст
                
               </li>
                <li class="list-group-item">
                
                 ТРи  Описание и текст
                
                </li>
    
            </ul>
        
        
          </div>
        
         <div class="col-md-8">
            
        <h1>Forms</h1>
        <form>
            
            <div class="form-group">
            <label for="nameInput">Введите имя</label>
            <div class="input-group">
            <input name="nameInput"
                   type="text"
                   class="form-control"
                   placeholder="Ваше имя"
                   />
            <span class='input-group-addon'>
                <span class="glyphicon glyphicon-ok">
                        </span>  
            </span>
              </div>
            </div>
            
            <div class="form-group">
             <label for="emeilInput">Введите Емей</label>
                   
                
             <div class="input-group">
                 <span class='input-group-addon'>Email: </span>
                 
                 <input name="emeilInput" 
                   type="text"
                   class="form-control"
                   placeholder="Ваш емейл адрес"
                   /> 
            </div>
             </div>
            
            <div class="form-group">
             <label>Выберите что нибудь</label>
             
             <div class="btn-group btn-group-sm">
             <button class="btn btn-success active">
                 Button1
             </button>
              <button class="btn btn-success">
                 Button2
             </button> 
              <button class="btn btn-success">
                 Button3
             </button> 
                </div>
            
            </div>
            
             <div class="form-group">
             <label>Выберите что нибудь</label>
             <div class="btn-group btn-group-lg" data-toggle="buttons">
                 <label class="btn btn-success active">
                     <input type="checkbox">
                 Button1
             </label>
              <label class="btn btn-success">
                  <input type="checkbox">
                 Button2
             </label> 
              <label class="btn btn-success">
                  <input type="checkbox">
                 Button3
             </label> 
                
               
                  
             </div>
            
            </div>
            
              <div class="form-group">
                <label class="control-label col-md-2">Favorite</label>
                <div class="col-md-10">
                  <div class="btn-group btn-group-sm" data-toggle="buttons">
                    <label class="btn btn-success">
                      <input type="radio">The Dude</label>
                    <label class="btn btn-success">
                      <input type="radio">Donny</label>
                    <label class="btn btn-success">
                      <input type="radio">Maude</label>
                    <div class="btn-group btn-group-sm">
                      <button class="btn btn-success">Other</span>
                      </button>
                      <button class="btn btn-success" data-toggle="dropdown">
                        <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu">
                        <li><a href="#" tabindex="-1">Walter</a>
                        </li>
                        <li><a href="#" tabindex="-1">Bunny</a>
                        </li>
                        <li class="divider"></li>
                        <li class="disabled"><a href="#" tabindex="-1">The Big Lebowski</a>
                        </li>
                      </ul>
                    </div>
                  </div>



                </div>
              </div>
        
            <div class="form-group">
            <label>Тема обращения</label>
            <select class="form-control">
                <option>Тема обращения</option>
                <option>Тема обращения</option>
                <option>Тема обращения</option>
                <option>Тема обращения</option>
            </select>
            </div>
            
             <div class="form-group">
            <label>
                    Ваше Сообщение
             </label>
               <textarea rows="6"
                         cols="40"
                         name="message"
                         class="form-control"
                         placeholder="Введите сообщение">

               </textarea>
                 <span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span>
             </div>
            
            <div class="form-group">
                    <label class="col-lg-2 control-label">Radios</label>
                    <div class="col-lg-10">
                      <div class="radio">
                        <label>
                          <input type="radio" checked="" value="option1" id="optionsRadios1" name="optionsRadios">
                          Option one is this
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input type="radio" value="option2" id="optionsRadios2" name="optionsRadios">
                          Option two can be something else
                        </label>
                      </div>
                    </div>
                  </div>
               <input value="Отправить !" 
                      type="submit"
                      class="btn btn-success"
                      >
        </form>
        </div>
        
        
        <div class="col-md-9">
            <h1>New Form</h1>
        <div class="row">
        <form class="form-horizontal">
          <div class="form-group">
            <label for="nameInput" class="control-label col-md-2">Your Name</label>
            <div class="col-md-10">
              <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-chevron-down"></span></span>
                <input type="text" name="nameInput" class="form-control" placeholder="e.g. Your Name" />
                <span class="input-group-addon">!</span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="emailInput" class="control-label col-md-2">Email</label>
            <div class="col-md-10">
              <div class="input-group">
                <span class="input-group-addon">@</span>
                <input type="email" name="emailInput" class="form-control" placeholder="e.g. Your Email" />
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-2">Favorite</label>
            <div class="col-md-10">
              <div class="btn-group btn-group-sm" data-toggle="buttons">
                <label class="btn btn-success">
                  <input type="radio">The Dude</label>
                <label class="btn btn-success">
                  <input type="radio">Donny</label>
                <label class="btn btn-success">
                  <input type="radio">Maude</label>
                <div class="btn-group btn-group-sm">
                  <button class="btn btn-success">Other</span>
                  </button>
                  <button class="btn btn-success" data-toggle="dropdown">
                    <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu">
                    <li><a href="#" tabindex="-1">Walter</a>
                    </li>
                    <li><a href="#" tabindex="-1">Bunny</a>
                    </li>
                    <li class="divider"></li>
                    <li class="disabled"><a href="#" tabindex="-1">The Big Lebowski</a>
                    </li>
                  </ul>
                </div>
              </div>



            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-2">Reason</label>
            <div class="col-md-10">
              <!-- <select class="form-control">
                <option>Adoration</option>
                <option>Ordering a White Russian</option>
                <option>Complaint</option>
                <option>I am lost</option>
              </select> -->
              <div class="dropdown">
                <button class="btn btn-success" id="pickButton">Pick One...</button>
                <button class="btn btn-success" data-toggle="dropdown">
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" id="reasonDropdown">
                  <li><a href="#" tabindex="-1">Adoration</a>
                  </li>
                  <li><a href="#" tabindex="-1">Ordering a White Russian</a>
                  </li>
                  <li><a href="#" tabindex="-1">Complaint</a>
                  </li>
                  <li><a href="#" tabindex="-1">I am lost</a>
                  </li>
                </ul>

              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-2">Message</label>
            <div class="col-md-10">
              <textarea cols="40" rows="6" class="form-control" placeholder="e.g. The Message"></textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-10 col-md-offset-2">
              <input type="submit" value="Submit" class="btn btn-success" />
            </div>
          </div>
        </form>
      </div>
       </div>
        <div class="row">
            <div class="col-md-9">
        <h2>Accordion</h2>
        
       
        
        
        
        <hr/>

      <div id="accordion" class="panel-group">
        <div class="panel panel-info">
          <div class="panel-heading">
            <div class="panel-title">
              <a href="#first" data-toggle="collapse" data-parent="#accordion">First</a>
            </div>
          </div>
          <div class="panel-collapse collapse in" id="first">
            <div class="panel-body">
              <img src="http://placehold.it/300x200" alt="1" />
            </div>
          </div>
        </div>
        <div class="panel panel-info">
          <div class="panel-heading">
            <div class="panel-title">
              <a href="#second" data-toggle="collapse" data-parent="#accordion">Second</a>
            </div>
          </div>
          <div class="panel-collapse collapse" id="second">
            <div class="panel-body">
              <img src="http://placehold.it/300x200" alt="2" />
            </div>
          </div>
        </div>
        <div class="panel panel-info">
          <div class="panel-heading">
            <div class="panel-title">
              <a href="#third" data-toggle="collapse" data-parent="#accordion">Third</a>
            </div>
          </div>
          <div class="panel-collapse collapse" id="third">
            <div class="panel-body">
              <img src="http://placehold.it/300x200" alt="3" />
            </div>
          </div>
        </div>
      </div>
      <h1>Modal Window
      </h1>
<a href="#sentDialog" class="btn btn-info" data-toggle="modal">Show Dialog...</a>




     <div class="row">
         <div class="col-md-9 col-md-offset-3">
           
            <div class="alert alert-warning">
                <p>Это необходимая информация, надо обратить внимание</p>
            </div>
         </div> 
      </div> 



</section>
        <section id="sidebar" class="col-md-3">
             <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2 class="panel-title">
                    Lorem Ipsum
                    </h2>
              </div>
                <div class="panel-body">
            <p>
                Есть много вариантов Lorem Ipsum, но большинство из них имеет 
                не всегда приемлемые модификации, например, юмористические
                вставки или слова, которые даже отдалённо не напоминают латынь.
                Если вам нужен Lorem Ipsum для серьёзного проекта, вы наверняка
                не хотите какой-нибудь шутки, скрытой в середине абзаца.
                Также все другие известные генераторы Lorem Ipsum используют один 
                и тот же текст, который они просто повторяют, пока не достигнут нужный объём. 
                Это делает предлагаемый здесь генератор единственным настоящим Lorem Ipsum генератором. 
                Он использует словарь из более чем 200 латинских слов, а также набор моделей предложений. 
                В результате сгенерированный Lorem Ipsum выглядит правдоподобно,
                не имеет повторяющихся абзацей или "невозможных" слов.
            </p>
            </div>
                <div class="panel-footer">
                    <button class="btn btn-success">Подробнее</button>
                </div>
        </div>
        </section>
    </section>
    <hr/>
    <footer  class="container">
   <p> Praesent a est a nisl iaculis vestibulum id vel lectus.
       Phasellus eu suscipit est. In hac habitasse platea dictumst. 
       Integer commodo quam at lorem venenatis laoreet.
       Aenean sit amet tincidunt est, vitae dignissim ante.
       Nullam tempor nulla a ipsum sodales imperdiet. 
       Suspendisse quis lectus sit amet velit interdum viverra.
       Pellentesque sed enim nec leo commodo venenatis. 
       Curabitur ultricies sem sit amet commodo pellentesque
    </p>
    </footer>


<div class="modal" id="sentDialog" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <a href="#" class="close" data-dismiss="modal">&times;</a>
          <h4>Thanks for clicking</h4>
        </div>
        <div class="modal-body">
           <img src="http://placehold.it/300x200" alt="">
        </div>
        <div class="modal-footer">
          <button class="btn btn-success" data-dismiss="modal">Закрыть</button>
        </div>
      </div>
    </div>
  </div>

</div>
    <script src="<?=URL::base()?>media/dist/js/jquery-2.0.3.min.js"></script>
    <script src="<?=URL::base()?>media/dist/js/bootstrap.min.js"></script>
    <script src="<?=URL::base()?>media/dist/js/site.js"></script>
</body>
</html>

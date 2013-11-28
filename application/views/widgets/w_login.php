
        <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2 class="panel-title">
                   Вход
                    </h2>
                </div>
            
                <div class="panel-body">
                <form action="<?=URL::base()?>login" method="post">
                    <input value="" name="login" type="text"><br/>
                    <input value="" name="pass" type="text"><br/>
                    <input value="Войти"  type="submit">
                    <a href="<?=URL::base()?>register">Регистрация</a>
                </form>
              </div>
                
        </div>
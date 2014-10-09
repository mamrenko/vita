$(function(){
        $('#multi').MultiFile({
          accept:'jpg|gif|JPG|png', max:1, STRING: {
            remove:'<br /><button class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></button>',
            selected:'Выбраны: $file',
            denied:'Неверный тип файла: $ext!',
            duplicate:'Этот файл уже выбран:\n$file!'
        }});
    });
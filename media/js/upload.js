$(function(){
        $('#multi').MultiFile({
          accept:'jpg|gif|JPG|png', max:1, STRING: {
            remove:'<img  style="padding-left:30px" src="/vita/media/images/delete.png">',
            selected:'Выбраны: $file',
            denied:'Неверный тип файла: $ext!',
            duplicate:'Этот файл уже выбран:\n$file!'
        }});
    });
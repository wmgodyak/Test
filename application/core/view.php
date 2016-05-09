<?php
    class View {
    //public $template_view; // здесь можно указать общий вид по умолчанию.

        function generate($content_view,  $data = null) {
            include 'application/views/template/head.php';
            
        /*
        if(is_array($data)) {
        // преобразуем элементы массива в переменные
        extract($data);
        }
        */

            include 'application/views/'.$content_view;

            include 'application/views/template/footer.php';
         }
    }
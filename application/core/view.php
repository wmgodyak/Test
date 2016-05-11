<?php
    class View {

      public function generate($content_view,  $data = null) {
            include 'application/views/template/head.php';


            include 'application/views/'.$content_view;

            include 'application/views/template/footer.php';
         }
    }
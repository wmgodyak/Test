<?php
    class View 
    {
      public function generate($content_view,  $data = null) 
      {
            include 'application/Views/Template/head.php';


            include 'application/Views/'.$content_view;

            include 'application/Views/Template/footer.php';
         }
    }
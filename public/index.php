<?php
      
       require __DIR__ . '/../vendor/autoload.php';
       
       use Controller\ItemController;
       $items = new ItemController();
       $items->index();

?>
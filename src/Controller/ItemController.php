<?php
namespace Controller;

use Model\ItemManager;


class ItemController
{
    public function index() 
    {
        
        $itemManager= new ItemManager();
        $items=$itemManager->selectAllItems(); 
        require __DIR__ . '/../View/Item.php'; 
        
    }

    public function show(int $id)
    {
        
            $itemManager = new ItemManager();
            $item = $itemManager->selectOneItem($id);
        
            require __DIR__ . '/../View/showItem.php';
           
    }
}




?>

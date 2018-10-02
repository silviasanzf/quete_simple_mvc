<?php
namespace Controller;

use Model\categoryManager;


class categoryController
{
    public function index() 
    {
        
        $categoryManager= new categoryManager();
        $categories=$categoryManager->selectAllCategories(); 
        require __DIR__ . '/../View/category.php'; 
        
    }

    public function show(int $id)
    {
        
            $categoryManager = new categoryManager();
            $category = $categoryManager->selectOneCategory($id);
        
            require __DIR__ . '/../View/showCategory.php';
           
    }
}




?>
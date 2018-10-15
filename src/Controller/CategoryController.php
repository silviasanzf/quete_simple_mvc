<?php
namespace Controller;

use Model\CategoryManager;

use Twig_Loader_Filesystem;
use Twig_Environment;

class CategoryController extends AbstractController
{

    public function index()
    {
        
        $categoryManager= new CategoryManager();
        $categories=$categoryManager->selectAllCategories();

        return $this->twig->render('category.html.twig', ['categories' => $categories]);
    }

    public function show(int $id)
    {
        
            $categoryManager = new CategoryManager();
            $category = $categoryManager->selectOneCategory($id);

             return $this->twig->render('showCategory.html.twig', ['category' => $category]);
           
    }
}

?>






<?php
namespace Controller;

use Model\ItemManager;


use Twig_Loader_Filesystem;
use Twig_Environment;

class ItemController extends AbstractController
{

    public function index()
    {
        $itemManager = new ItemManager($this->pdo);
        $items = $itemManager->selectAll();


        return $this->twig->render('Item.html.twig', ['items' => $items]);
    }


    public function show(int $id)
    {

        $itemManager = new ItemManager($this->pdo);
            $item = $itemManager->selectOneItem($id);

        return $this->twig->render('showItem.html.twig', ['Item' => $item]);

    }
    public function add()
    {
        if (!empty($_POST)) {
            // TODO : validations des valeurs saisies dans le form
            // création d'un nouvel objet Item et hydratation avec les données du formulaire
            $item = new Item();
            $item->setTitle($_POST['title']);

            $itemManager = new ItemManager();
            // l'objet $Item hydraté est simplement envoyé en paramètre de insert()
            $itemManager->insert($item);
            // si tout se passe bien, redirection
            header('Location: /');
            exit();
        }
        // le formulaire HTML est affiché (vue à créer)
        return $this->twig->render('Item/add.html.twig');
    }
}









?>

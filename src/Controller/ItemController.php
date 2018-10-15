<?php
namespace Controller;

use Model;




class ItemController extends AbstractController
{

    public function index() {
        $itemManager = new Model\ItemManager($this->pdo);
        $items = $itemManager->selectAll();
        return $this->twig->render('Item/index.html.twig', ['items' => $items]);
    }

    public function show(int $id)
    {
        $itemManager = new Model\ItemManager($this->pdo);
        $item = $itemManager->selectOneById($id);
        return $this->twig->render('Item/showItem.html.twig', ['item' => $item]);
    }

    public function add()
    {
        if (!empty($_POST)) {

            // validations des valeurs saisies dans le form
            if(empty($_POST['title'])) {
                $this->error = 'Your item is missing !';
            } elseif (!preg_match("/^[a-zA-Z àéèêëîùç\- \']*$/", $_POST['title'])) {
                $this->error = 'Your item is not valid !';
            } else {
                // création d'un nouvel objet Item et hydratation avec les données du formulaire
                $item = new Model\Item();
                $item->setTitle($_POST['title']);

                $itemManager = new Model\ItemManager($this->pdo);
                // l'objet $item hydraté est simplement envoyé en paramètre de insert()
                $itemManager->insert($item);
                // si tout se passe bien, redirection
                header('Location: /');
                exit();
            }

        }

        return $this->twig->render('Item/add.html.twig');
    }


    public function edit(int $id)
    {
        $itemManager = new Model\ItemManager($this->pdo);
        $item = $itemManager->selectOneById($id);


        if (!empty($_POST)) {

            // validations des valeurs saisies dans le form
            if(empty($_POST['title'])) {
                $this->error = 'Your item is missing !';
            } elseif (!preg_match("/^[a-zA-Z àéèêëîùç\- \']*$/", $_POST['title'])) {
                $this->error = 'Your item is not valid !';
            } else {
                $item->setTitle($_POST['title']);
                $itemManager->update($item);
                header('Location: /');
                exit();
            }
        }

        //Affiche le formulaire :
        return $this->twig->render('Item/edit.html.twig', ['item' => $item]);

    }


    public function delete(int $id)
    {
        $itemManager = new Model\ItemManager($this->pdo);
        $item = $itemManager->selectOneById($id);


        if (!empty($_POST)) {


            $item->setTitle($_POST['title']);
            $itemManager->delete($item);
            header('Location: /');
            exit();
        }



        //Affiche le formulaire :
        return $this->twig->render('Item/delete.html.twig', ['item' => $item]);

    }




}









?>

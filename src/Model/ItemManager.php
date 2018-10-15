<?php

namespace Model;

use Model\Item;


class ItemManager extends AbstractManager
{
    const TABLE = 'Item';

        public function __construct($pdo)
        {
            parent::__construct(self::TABLE, $pdo);
        }
//inserer un Item
        public function insert(Item $item): int
        {
            $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (`title`) VALUES (:title)");
            $statement->bindValue('title', $item->getTitle(), \PDO::PARAM_STR);
            if ($statement->execute()) {
                return $this->pdo->lastInsertId();
            }
        }



    // récupération de tous les items


        public function selectOneItem(int $id) : array
        {
             $query = "SELECT * FROM Item WHERE id = :id";
            $statement = $pdo->prepare($query);
            $statement->bindValue(':id', $id, \PDO::PARAM_INT);
            $statement->execute();
            // contrairement à fetchAll(), fetch() ne renvoie qu'un seul résultat
            return $statement->fetch();

        }


}

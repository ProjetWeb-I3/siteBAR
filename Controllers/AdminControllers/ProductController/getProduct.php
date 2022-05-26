<?php

function getArticle($conn, $nb = null, $id = null)
{

    if ($nb and !$id) {
        $req = $conn->query('SELECT * FROM products LIMIT' . $nb);
        $article = $req->fetchAll();
    } elseif ($id) {
        $req = $conn->query('SELECT * FROM products WHERE id_products =' . $id);
        $article = $req->fetchObject();
    } else {
        $req = $conn->query('SELECT * FROM products ');
        $article = $req->fetch();

    }
    return $article;
}

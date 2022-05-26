<?php

function getMembre($conn, $nb = null, $id = null)
{

    if ($nb and !$id) {
        $req = $conn->query('SELECT * FROM users LIMIT' . $nb);
        $membre = $req->fetchAll();
    } elseif ($id) {
        $req = $conn->query('SELECT * FROM users WHERE id_users =' . $id);
        $membre = $req->fetchObject();
    } else {
        $req = $conn->query('SELECT * FROM users ');
        $membre = $req->fetchAll();
    }
    return $membre;
}

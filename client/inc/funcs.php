<?php

function debug($data)
{
    echo '<pre>' . print_r($data, 1) . '</pre>';
}

function get_products()
{
    global $pdo;
    $res = $pdo->query("SELECT * FROM products");
    return $res->fetchAll();
}

function get_product($id)
{
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}

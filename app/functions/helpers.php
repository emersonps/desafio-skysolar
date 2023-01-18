<?php
// Funcionalidades padrão para o sistema

// dd - die dump para debug
function dd($data){
    print_r($data);

    die();
}

function json($data){
    header('Content-Type: application/json');

    echo json_encode($data);
}

//definição do path
function path(){
    $vendorDir = dirname(__DIR__);
    return dirname($vendorDir);
}
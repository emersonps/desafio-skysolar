<?php
use Twig_SimpleFunction;
// Elaboração de funções manuais devido a limitação do twig

// função teste para validar arquivo
$file_exists = new \Twig_SimpleFunction('file_exists', function ($file) {
    return file_exists($file);
});

// função de teste
$teste = new \Twig_SimpleFunction('teste', function() {
    echo "teste";
});

// retornas todas as funções 
return [
    $file_exists,
    $teste
];
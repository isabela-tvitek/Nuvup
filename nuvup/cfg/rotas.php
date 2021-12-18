<?php

$rotas = [
    '/' => [
        'GET' => '\Controlador\RaizControlador#index',
    ],
    '/login' => [
        'GET' => '\Controlador\LoginControlador#criar',
        'POST' => '\Controlador\LoginControlador#armazenar',
    ],
    '/usuarios' => [
        'POST' => '\Controlador\UsuarioControlador#armazenar'
    ],
    '/usuarios/criar' => [
        'GET' => '\Controlador\UsuarioControlador#criar',
    ],
    '/sistema' => [
        'GET' => '\Controlador\SistemaControlador#index',
    ],
    '/sistema/upload/criar' => [
        'GET' => '\Controlador\UploadControlador#criar',
        'POST' => '\Controlador\UploadControlador#armazenar',
    ],
    '/sistema/relatorio/criar/?' => [
        'GET' => '\Controlador\RelatorioControlador#index',
        'POST' => '\Controlador\RelatorioControlador#criar',
    ],
    '/sistema/comentario/criar/?' => [
        'GET' => '\Controlador\ComentarioControlador#index',
        'POST' => '\Controlador\ComentarioControlador#armazenar',
    ],
     '/sistema/comentario/?/deletar/?' => [
        'DELETE' => '\Controlador\ComentarioControlador#destruir',
    ],
    '/sistema/comentario/?/editar/?' => [
        'PATCH' => '\Controlador\ComentarioControlador#atualizar',
    ],
    '/sistema/comentario/?/editar/' => [
        'GET' => '\Controlador\ComentarioControlador#editar',
    ],
];

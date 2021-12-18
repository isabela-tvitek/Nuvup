<?php

namespace Controlador;

use \Framework\DW3Sessao;
use \Modelo\Sistema;
use \Modelo\Usuario;

class SistemaControlador extends Controlador
{

    public function index()
    {
        $dados = Sistema::buscarTodos($_GET);
       
        $this->visao('sistema/index.php', [
            'dados' => $dados,
            'mensagemFlash' => DW3Sessao::getFlash('mensagemFlash', null)
        ]);
    }

    public function criar($id)
    {
        $usuario = Usuario::buscarId($id);

        
    }
}

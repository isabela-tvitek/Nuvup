<?php

namespace Controlador;

use \Modelo\Usuario;
use \Framework\DW3BancoDeDados;
use \Framework\DW3Sessao;

class UsuarioControlador extends Controlador
{
    public function criar()
    {
        $this->visao(
            'usuarios/cadastro.php',
            ['mensagem' => DW3Sessao::getFlash('mensagem', null),],
            'index.php'
        );
    }

    public function armazenar()
    {
        $usuario = new Usuario($_POST['nome'], $_POST['senha'], $_POST['email']);

        if ($usuario->isEmailValido($_POST['email'])) {
            $usuario->salvar();
            DW3Sessao::setFlash('mensagem', 'Sucesso no cadastro');
            $this->redirecionar(URL_RAIZ . 'usuarios/criar');
        } else {
            DW3Sessao::setFlash('mensagem', 'Email já utilizado');
            $this->redirecionar(URL_RAIZ . 'usuarios/criar');
        }
    }
}

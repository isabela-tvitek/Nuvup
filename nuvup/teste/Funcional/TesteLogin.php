<?php
namespace Teste\Funcional;

use \Teste\Teste;
use \Modelo\Usuario;
use \Framework\DW3Sessao;

class TesteLogin extends Teste
{
    public function testeAcessar()
    {
        $resposta = $this->get(URL_RAIZ . 'login');
        $this->verificarContem($resposta, 'Login');
    }

    public function testeLogar()
    {
        (new Usuario('Joao', '123', 'joao@gmail.com'))->salvar();
        $resposta = $this->post(URL_RAIZ . 'login', [
            'nome' => 'Joao',
            'senha' => '123',
            'email' => 'joao@gmail.com'
        ]);
        $this->verificarRedirecionar($resposta, URL_RAIZ . 'sistema/criar');
        $this->verificar(DW3Sessao::get('usuario') != null);
    }

    public function testeDeslogar()
    {
        (new Usuario('Joao', '123', 'joao@gmail.com'))->salvar();
        $resposta = $this->post(URL_RAIZ . 'login', [
            'nome' => 'Joao',
            'senha' => '123',
            'email' => 'joao@gmail.com'
        ]);
        $resposta = $this->delete(URL_RAIZ . 'login');
        $this->verificarRedirecionar($resposta, URL_RAIZ . 'login');
        $this->verificar(DW3Sessao::get('usuario') == null);
    }
}

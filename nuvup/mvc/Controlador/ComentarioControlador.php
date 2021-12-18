<?php

namespace Controlador;

use \Framework\DW3Sessao;
use \Modelo\Comentario;
use \Modelo\Upload;

class ComentarioControlador extends Controlador
{

    public function index($id)
    {

       $comentarios = Comentario::buscarTodos($id);
       $upload = Upload::buscarId($id);

       $this->visao( 'comentario/comentario.php', [
           'upload' =>$upload,
           'comentarios' =>$comentarios,
           'mensagemFlash' => DW3Sessao::getFlash('mensagemFlash', null)
        ]);
    }

    public function armazenar($id)
    {
        $comentario = new Comentario(
            $_POST['comentario'],
            DW3Sessao::get('usuario'),
            $id,
        );
        
        $comentario->salvar();
        DW3Sessao::setFlash('mensagemFlash', 'comentario cadastrado.');
        $this->redirecionar(URL_RAIZ . 'sistema/comentario/criar/'.$id );
    }

    public function editar($id)
    {
        echo('teste');
        // $comentario = Comentario::buscarId($id);
        // $this->visao('comentario/editar.php', [
        //     'comentario' => $comentario
        // ]);
    }

    public function atualizar($id)
    {
        echo('teste');
        // $comentario = Comentario::buscarId($id);
        // $comentario->setComentario($_POST['comentario']);
        // $comentario->salvar();
        // $this->redirecionar(URL_RAIZ . 'sistema/comentario/criar/'.$comentario->getId());
    }

    public function destruir($idUpload, $id)
    {   
        Comentario::destruir($id);
        DW3Sessao::setFlash('mensagemFlash', 'Mensagem destruida.');
       
        $this->redirecionar(URL_RAIZ . 'sistema/comentario/criar/'.$idUpload);
    }
}

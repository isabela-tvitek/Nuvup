<?php
namespace Controlador;

use \Framework\DW3Sessao;
use Modelo\Relatorio;
use \Modelo\Sistema;
use Modelo\Upload;

class RelatorioControlador extends Controlador
{

    public function index($id)
    {
        $relatorios = Relatorio::buscarTodos($id);

        $this->visao('sistema/relatorio.php', [
            'relatorios' =>$relatorios,
            'mensagemFlash' => DW3Sessao::getFlash('mensagemFlash', null)
        ]);
       
    }

    // public function criar($id)
    // {

    //     $upload = Sistema::buscarId($id);
    //     $Upload = new Relatorio(
    //         $_POST['comentario'],
    //         DW3Sessao::get('usuario'),
    //         $upload,
    //     );
    // }


}

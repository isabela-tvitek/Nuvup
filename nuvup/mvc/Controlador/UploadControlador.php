<?php

namespace Controlador;

use \Framework\DW3Sessao;
use \Framework\DW3BancoDeDados;
use \Modelo\Upload;

class UploadControlador extends Controlador
{

    public function criar()
    {
        $this->verificarLogado();
        $this->visao(
            'sistema/upload.php',
            ['mensagemFlash' => DW3Sessao::getFlash('mensagemFlash', null),],
            'index.php'
        );
    }

    public function armazenar()
    {
        //$nomeArquivo = $_FILES['upload']['name'];

        if (array_key_exists('upload', $_FILES)) {
            $nome = $_FILES['upload']['name'];
            $tipo = $_FILES['upload']['type'];
            $tamanho = $_FILES['upload']['size'];
            $localAtual = $_FILES['upload']['tmp_name'];
            $nomeArquivo = $_POST['nomeArquivo'];
            $usuarioId = DW3Sessao::get('usuario');

            $localArquivo = PASTA_PUBLICO . "arquivos/" . $nomeArquivo;

            $upload = new Upload(
                $nomeArquivo,
                $_POST['data'],
                $_POST['descricao'],
                $localArquivo,
                $usuarioId
            );

            $upload->salvar();
            move_uploaded_file($localAtual, $localArquivo);
            DW3Sessao::setFlash('mensagemFlash', 'Upload realizado com sucesso');
            $this->redirecionar(URL_RAIZ . 'sistema');
        }
    }
}

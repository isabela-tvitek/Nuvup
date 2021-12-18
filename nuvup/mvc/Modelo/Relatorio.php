<?php
namespace Modelo;

use \PDO;
use \Framework\DW3BancoDeDados;

class Relatorio extends Modelo
{
    const BUSCAR_ID_USUARIO = 'SELECT * FROM uploads WHERE usuario_id = ? ORDER BY id';
    const BUSCAR_TODOS = 'SELECT nome_arquivo, data, descricao, usuario_id, id FROM uploads';
    const INSERIR = 'INSERT INTO uploads(nome_arquivo, data, descricao, usuario_id) VALUES (?, ?, ?, ?)';
   
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    // public static function buscarId($idUsuario)
    // {
    //     $comando = DW3BancoDeDados::prepare(self::BUSCAR_ID);
    //     $comando->bindValue(1, $idUsuario, PDO::PARAM_INT);
    //     $comando->execute();
    //     $relatorios = null;
    //     $registro = $comando->fetch();
    //     if ($registro) {
    //         $relatorios = new Upload(
    //             $registro['nomeArquivo'],
    //             $registro['data'],
    //             $registro['descricao'],
    //             $registro['usuario_id'],
    //             null,
    //             $registro['u_id']
    //         );
    //     }
    //     return $relatorios;
    // }

    public static function buscarTodos($UsuarioId)
    {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_ID_USUARIO);
        $comando->bindValue(1, $UsuarioId);
        $comando->execute();
        $registros = $comando->fetchAll();
        $relatorios = [];
        foreach ($registros as $registro) {
            $relatorios[] = new Upload(
                $registro['nomeArquivo'],
                $registro['data'],
                $registro['descricao'],
                $registro['usuario_id'],
                null,
                $registro['up_id']
            );
        }
        return $relatorios;
    }

    
    
}

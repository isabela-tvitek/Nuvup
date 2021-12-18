<?php

namespace Modelo;

use \PDO;
use \Framework\DW3BancoDeDados;
use \Modelo\Upload;

class Sistema extends Modelo
{
    const BUSCAR_TODOS = 'SELECT nome_arquivo, data, descricao, usuario_id, id FROM uploads';
    const BUSCAR_ID = 'SELECT * FROM uploads WHERE id = ? LIMIT 1';
    const INSERIR = 'INSERT INTO uploads(nome_arquivo, data, descricao, usuario_id) VALUES (?, ?, ?, ?)';
    const DELETAR = 'DELETE FROM uploads WHERE id = ?';


    public function getId()
    {
        return $this->id;
    }

    public static function buscarId($id)
    {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_ID);
        $comando->bindValue(1, $id, PDO::PARAM_INT);
        $comando->execute();
        $dados = null;
        $registro = $comando->fetch();
        if ($registro) {
            $dados = new Upload(
                $registro['nome_arquivo'],
                $registro['data'],
                $registro['descricao'],
                $registro['usuario_id'],
                null,
                $registro['id']
            );
        }
        return $dados;
    }

    public static function buscarTodos($filtro = [])
    {
        $sqlOrderBy='';

        if(array_key_exists('nome', $filtro)
        && $filtro['nome']!= '')
        {
            $sqlOrderBy.= ' ORDER BY nome_arquivo';
        }
        else if(array_key_exists('data', $filtro)
        && $filtro['data']!= '')
        {
            $sqlOrderBy.= ' ORDER BY data DESC';
        }

        $sql = self::BUSCAR_TODOS . $sqlOrderBy;
        
        $comando = DW3BancoDeDados::prepare($sql);
        $comando->execute();
        $registros = $comando->fetchAll();
        $dados = [];
        foreach ($registros as $registro) {
            $dados[] = new Upload(
                $registro['nome_arquivo'],
                $registro['data'],
                $registro['descricao'],
                $registro['usuario_id'],
                null,
                $registro['id']
            );
        }
        return $dados;
    }

}

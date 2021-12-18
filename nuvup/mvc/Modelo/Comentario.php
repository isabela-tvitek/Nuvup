<?php

namespace Modelo;

use \PDO;
use \Framework\DW3BancoDeDados;

class Comentario extends Modelo
{
    const BUSCAR_ID_UPLOAD = 'SELECT * FROM comentarios WHERE upload_id = ? ORDER BY id';
    const BUSCAR_ID = 'SELECT * FROM comentarios WHERE id = ?';
    const INSERIR = 'INSERT INTO comentarios(comentario, usuario_id, upload_id) VALUES (?, ?, ?)';
    const ATUALIZAR = 'UPDATE comentarios SET comentario = ? WHERE id = ?';
    const DELETAR = 'DELETE FROM comentarios WHERE id = ?';
    
    private $id;
    private $comentario;
    private $usuarioId;
    private $uploadId;

    public function __construct(
        $comentario,
        $usuarioId,
        $uploadId,
        $id = null
    ) {
        $this->comentario = $comentario;
        $this->usuarioId = $usuarioId;
        $this->uploadId = $uploadId;
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getComentario()
    {
        return $this->comentario;
    }

    public function setComentario($comentario)
    {
        $this->comentario = $comentario;
    }

    public function getUsuarioId()
    {
        return $this->usuarioId;
    }

    public function getUploadId()
    {
        return $this->uploadId;
    }
    
    public function salvar()
    {
        $this->inserir();
    }

    private function inserir()
    {
        DW3BancoDeDados::getPdo()->beginTransaction();
        $comando = DW3BancoDeDados::prepare(self::INSERIR);
        $comando->bindValue(1, $this->comentario);
        $comando->bindValue(2, $this->usuarioId);
        $comando->bindValue(3, $this->uploadId);
        $comando->execute();
        $this->id = DW3BancoDeDados::getPdo()->lastInsertId();
        DW3BancoDeDados::getPdo()->commit();
    }

    public static function buscarTodos($uploadId)
    {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_ID_UPLOAD);
        $comando->bindValue(1, $uploadId);
        $comando->execute();
        $registros = $comando->fetchAll();
        $comentarios = [];
        foreach ($registros as $registro) {
            $comentarios[] = new Comentario(
                $registro['comentario'],
                $registro['usuario_id'],
                $registro['upload_id'],
                $registro['id']
            );
        }
        return $comentarios;
    }

    public static function buscarId($id)
    {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_ID);
        $comando->bindValue(1, $id, PDO::PARAM_INT);
        $comando->execute();
        $registro = $comando->fetch();
        return new Comentario(
            $registro['comentario'],
            $registro['usuario_id'],
            $registro['upload_id'],
            $registro['id']
        );
    }

    public function atualizar()
    {
        $comando = DW3BancoDeDados::prepare(self::ATUALIZAR);
        $comando->bindValue(1, $this->comentario);
        $comando->bindValue(2, $this->id);
        $comando->execute();
    }

    public static function destruir($id)
    {
        $comando = DW3BancoDeDados::prepare(self::DELETAR);
        $comando->bindValue(1, $id, PDO::PARAM_INT);
        $comando->execute();
    }
}

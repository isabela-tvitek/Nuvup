<?php
namespace Modelo;

use \PDO;
use \Framework\DW3BancoDeDados;
use \Framework\DW3ImagemUpload;


class Upload extends Modelo
{
    const BUSCAR_ID = 'SELECT * FROM uploads WHERE id = ?';
    const INSERIR = 'INSERT INTO uploads(nome_arquivo, data, descricao, local_arquivo, usuario_id) VALUES (?, ?, ?, ?, ?)';
    private $id;
    private $nomeArquivo;
    private $data;
    private $descricao;
    private $localArquivo;
    private $usuarioId;

    public function __construct(
        $nomeArquivo,
        $data,
        $descricao,
        $localArquivo,
        $usuarioId = null,
        $id = null
    ) {
        $this->nomeArquivo = $nomeArquivo;
        $this->data = $data;
        $this->descricao = $descricao;
        $this->localArquivo = $localArquivo;
        $this->usuarioId = $usuarioId;
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNomeArquivo()
    {
        return $this->nomeArquivo;
    }

    public function getData()
    {
        return $this->data;
    }
    public function getDescricao()
    {
        return $this->descricao;
    }

    public function getLocalArquivo()
    {
        return $this->localArquivo;
    }

    public function getUsuario()
    {
        if ($this->usuario == null) {
            $this->usuario = Usuario::buscarId($this->usuarioId);
        }
        return $this->usuario;
    }

    public function salvar()
    {
       $this->inserir();
    }

    public function inserir()
    {
        DW3BancoDeDados::getPdo()->beginTransaction();
        $comando = DW3BancoDeDados::prepare(self::INSERIR);
        $comando->bindValue(1, $this->nomeArquivo, PDO::PARAM_STR);
        $comando->bindValue(2, $this->data, PDO::PARAM_STR);
        $comando->bindValue(3, $this->descricao, PDO::PARAM_STR);
        $comando->bindValue(4, $this->localArquivo, PDO::PARAM_STR);
        $comando->bindValue(5, $this->usuarioId, PDO::PARAM_STR);

        $comando->execute();
        $this->id = DW3BancoDeDados::getPdo()->lastInsertId();
        DW3BancoDeDados::getPdo()->commit();
    }

    public static function buscarId($id)
    {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_ID);
        $comando->bindValue(1, $id, PDO::PARAM_INT);
        $comando->execute();
        $registro = $comando->fetch();
        return new Upload(
            $registro['nome_arquivo'],
            $registro['data'],
            $registro['descricao'],
            $registro['local_arquivo'],
            $registro['usuario_id'],
            $registro['id']
        );
    }
    
}

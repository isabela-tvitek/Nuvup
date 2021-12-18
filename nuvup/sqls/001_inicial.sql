CREATE DATABASE nuvup COLLATE 'utf8_unicode_ci';

CREATE TABLE usuarios (
    id INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    senha CHAR(60) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    PRIMARY KEY (id)
)
ENGINE = InnoDB;

CREATE TABLE uploads (
    id INT NOT NULL AUTO_INCREMENT,
    nome_arquivo VARCHAR(255) NOT NULL,
    data TIMESTAMP NOT NULL,
    descricao  VARCHAR(255) NOT NULL,
    local_arquivo VARCHAR(255) NOT NULL,
    usuario_id INT NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
)
ENGINE = InnoDB;

CREATE TABLE comentarios (
    id INT NOT NULL AUTO_INCREMENT ,
    comentario VARCHAR(255) NOT NULL ,
    usuario_id INT NOT NULL,
    upload_id INT NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
    FOREIGN KEY (upload_id) REFERENCES uploads(id)

)
ENGINE = InnoDB;
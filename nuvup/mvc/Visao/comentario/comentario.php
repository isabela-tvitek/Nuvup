<?php

use Modelo\Upload;
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= URL_CSS . 'defaut.css' ?>">
    <link rel="stylesheet" href="<?= URL_CSS . 'comentario.css' ?>">

    <title>Nuvup</title>
</head>

<body>
    <nav class="menu-lateral">
        <a href="<?= URL_RAIZ . 'sistema' ?>"> <img id="logo" class="logo" alt="Logo" src="<?= URL_IMG . 'nuvem.png' ?>"></a>
        <ul>
            <li class="formulario">
                <form id="pesquisa" action="index.html" method="post">
                    <input type="text" placeholder="Pesquisa" />
                    <button type="submit">🔎</button>
                </form>
            </li>
            <li><a href="<?= URL_RAIZ . 'sistema/upload/criar' ?>">Upload 💾</a></li>
            <li><a href="<?= URL_RAIZ . 'sistema/relatorio/criar/' ?>">Relatório pessoal</a></li>
            <li><a href="<?= URL_RAIZ . 'login' ?>"> Sair</a></li>
        </ul>
    </nav>
    <main>
        <div class="geral">

            <h1><?= $upload->getNomeArquivo() ?></h1>
            <h2>comentarios</h2>

            <form action="<?= URL_RAIZ . 'sistema/comentario/criar/' . $upload->getId() ?>" id="form" method="post">

                <input type="text" id="comentario" name="comentario" placeholder="Digite novo comentario" />
                <button type="submit"><img src="<?= URL_IMG . 'enviar.png' ?>" alt="enviar"></button>

            </form>

            <?php foreach ($comentarios as $comentario) : ?>
                <table>
                    <tr <?= $comentario->getId() ?>>
                        <td id="c" name="c" class="comentario"><?=$comentario->getComentario()?></td>
                        <td>
                            <a href="<?= URL_RAIZ . 'sistema/comentario/' . $comentario->getId() . '/editar' ?>" title="Editar">
                                <img src="<?= URL_IMG . 'editar.png' ?>" alt="editar">
                            </a>
                        </td>
                        <td>
                            <form  action="<?= URL_RAIZ . 'sistema/comentario/'. $upload->getId() .'/deletar/' . $comentario->getId()?>" method="POST">
                                <input type="hidden" name="_metodo" value="DELETE"> 
                                <a onclick="event.preventDefault(); this.parentNode.submit();">
                                    <img src="<?= URL_IMG . 'deletar.png' ?>" alt="deletar">
                                </a> 
                            </form>
                        </td>
                    </tr>
                </table>
            <?php endforeach ?>
        </div>
    </main>
</body>

</html>
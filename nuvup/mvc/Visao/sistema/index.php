<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= URL_CSS . 'defaut.css' ?>">
    <link rel="stylesheet" href="<?= URL_CSS . 'index.css' ?>">

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

        <div id="corpo">

            <table>
                <tr>
                    <th id="nome">Nome do arquivos
                        <form method="GET">
                            <input type="hidden" name="nome" value="nome">
                            <button type="submit"><img src="<?= URL_IMG . 'az.png' ?>" alt="ordenar"></button>
                        </form>
                    </th>
                    <th id="data"> Data e Hora
                        <form method="GET">
                            <input type="hidden" name="data" value="data">
                            <button type="submit"><img src="<?= URL_IMG . 'ordem.png' ?>" alt="ordenar"></button>
                        </form>
                    </th>
                    <th id="desc">Descrição</th>
                    <th id="seta"></th>
                    <th id="coment"></th>
                </tr>


                <?php foreach ($dados as $dado) : ?>
                    <tr <?= $dado->getId() ?>>
                        <td><?= $dado->getNomeArquivo() ?></td>
                        <td><?= $dado->getData() ?></td>
                        <td><?= $dado->getDescricao() ?></td>
                        <th><a href="<?= URL_PUBLICO . 'arquivos/' . $dado->getNomeArquivo() ?>" download><img src="<?= URL_IMG . 'seta.png' ?>" alt="Download"></th>
                        <th><a href="<?= URL_RAIZ . 'sistema/comentario/criar/' . $dado->getId() ?>"><img src="<?= URL_IMG . 'comentarios.png' ?>" alt="Comentário"></a></th>
                    </tr>
                <?php endforeach ?>
            </table>

            <?php if ($mensagemFlash) : ?>
                <p><?= $mensagemFlash ?></p>
            <?php endif ?>

        </div>
    </main>

</body>

</html>
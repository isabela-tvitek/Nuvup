<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= URL_CSS . 'defaut.css' ?>">
    <link rel="stylesheet" href="<?= URL_CSS . 'relatorio.css' ?>">

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
            <li><a href="<?= URL_RAIZ . 'sistema/relatorio/criar' ?>">Relatório pessoal</a></li>
            <li><a href="<?= URL_RAIZ . 'login' ?>"> Sair</a></li>
        </ul>
    </nav>
    <main>
        <div class="principal">
            <table>
                <tr>
                    <th id="nome">Nome do arquivos</th>
                    <th id="data">Data</th>
                    <th id="desc">Descrição</th>
                    <th id="seta"></th>
                    <th id="coment"></th>
                </tr>
                
                <?php foreach ($relatorios as $relatorio):?>
                    <tr <?= $relatorio->getId() ?>>
                        <td><?= $relatorio->getNomeArquivo() ?></td>
                        <td><?= $relatorio->getData() ?></td>
                        <td><?= $relatorio->getDescricao() ?></td>
                        <th><a href="<?= URL_PUBLICO. 'arquivos/'.$relatorio ->getNomeArquivo()?>" download ><img src="<?= URL_IMG . 'seta.png' ?>" alt="Download"></th>
                        <th><a href="<?= URL_RAIZ . 'sistema/comentario/criar/'.$relatorio->getIdUsuario() ?>"><img src="<?= URL_IMG . 'comentarios.png' ?>" alt="Comentário"></a></th>
                    </tr>
                <?php endforeach ?>
                

            </table>
        </div>
    </main>

    <script src=""></script>

</body>

</html>
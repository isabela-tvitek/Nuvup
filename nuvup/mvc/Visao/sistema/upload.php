<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= URL_CSS . 'defaut.css' ?>">
    <link rel="stylesheet" href="<?= URL_CSS . 'upload.css' ?>">

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
        <div class="formulario">

            <h1>Upload</h1>
    

            <form action="<?= URL_RAIZ . 'sistema/upload/criar' ?>" id="form" method="post" enctype="multipart/form-data">
                <div id="inputs" >

                    <div id="dados-arquivo">
                        <input type="text" id="nome-arquivo" name="nomeArquivo"  placeholder="Digite nome do arquivo" required />
                        <input type="datetime-local" id="data" name="data" placeholder="Data" required />
                    </div>

                    <div id="info-arquivo">
                        <h2>Descrição</h2>
                        <input type="text" id="descricao" name="descricao"  required />
                    </div>

                    <div id="submeter">
                        <input type="file" id="upload" name="upload"  required />
                      
                        <button class="btn" type="submit">Concluir</a></button>
                    </div>
                </div>
            </form>
        </div>

        <?php if($mensagemFlash):?>
            
            <p> <?= $mensagemFlash ?> </p>
        
        <?php endif ?>
    </main>
</body>

</html>
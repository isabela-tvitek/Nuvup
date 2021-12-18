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
          
                <h1><?= $upload->getNomeArquivo()?></h1>
                <h2>comentarios</h2>

                <form action="<?= URL_RAIZ . 'sistema/comentario/'.$comentario->getId().'/editar' ?>" method="post">
                <input type="hidden" name="_metodo" value="PATCH" >
                    
                    <div >
                        <label  for="comentario">Comentario*</label>
                        <input id="comentario" name="comentario" value="<?$comentario->getComentario()?>" >
                    </div>
                
                    <button type="submit"><img src="<?= URL_IMG . 'enviar.png' ?>" alt="enviar"></button>
                </form>
              
            </div>
        </main>
    </body>
</html>
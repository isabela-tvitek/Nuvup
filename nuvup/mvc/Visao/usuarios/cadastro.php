<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= URL_CSS . 'defaut.css' ?>">
    <link rel="stylesheet" href="<?= URL_CSS . 'cadastro.css' ?>">
</head>

<body>
    <header>
        <nav class="topo">
            <img id="logo" class="logo" alt="Logo" src="<?= URL_IMG . 'nuvem.png' ?>">
        </nav>
    </header>

    <main>
        <div class="cadastro">

            <h1>Cadastro</h1>

            <form action="<?= URL_RAIZ . 'usuarios' ?>" method="post" id="form">
               
                <input type="text" id="nome" name="nome" for="nome"placeholder="Digite seu nome Completo" required />
                  
                <input type="password" id="senha" name="senha" for="senha" placeholder="Digite sua senha" required />
                
                <input type="email" id="email" name="email" for="email" value="" pattern="\w+@\w+\.\w{3}" required placeholder="Digite seu e-mail" />
            
                <button type="submit">Concluir cadastro</button>

                <a href="<?= URL_RAIZ . 'login' ?>">Retornar para tela de login</a>
            </form>

            <?php if($mensagem):?>
            
                <p> <?= $mensagem ?> </p>
            
            <?php endif ?>
            
        </div>
    </main>

    <script src=""></script>

</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Nuvup</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?= URL_CSS . 'defaut.css' ?>">
    <link rel="stylesheet" href="<?= URL_CSS . 'login.css' ?>">
</head>


<body>
    <header>
        <nav class="topo">
            <img id="logo" class="logo" alt="Logo" src="<?= URL_IMG . 'nuvem.png' ?>">
        </nav>
      </header>

    <main>
        
        <div class="singin">
            <h1>Faça seu login</h1>

            <form action="<?= URL_RAIZ . 'login' ?>" id="form" method="post" class="margin-bottom">
                <input
                type="text"
                id="email"
                name="email"
                value="<?= $this->getPost('nome') ?>"
                pattern ="\w+@\w+\.\w{3}"
                required
                placeholder="Digite seu e-mail"
                />

                <input
                type="password"
                id="senha"
                name="senha"
                placeholder="Digite sua senha" 
                required
                />
                
                <button type="submit">Logar</button>
                <a href="<?= URL_RAIZ . 'usuarios/criar' ?>">Não tem um usuário? Cadastrar-se aqui!</a>

            </form>
        </div>
    </main>

   
    <script src=""></script>

</body>
</html>
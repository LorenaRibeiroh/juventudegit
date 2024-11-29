<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!--ADM-->
    <form action="admin" method="post">

    </form>
<!--Criação do usuario; inserção de dados -->
    <form action="models./UsuarioModel.php" method="POST">

    <label for="senha">Digite seu Nome: </label>
    <input type="text" name="nome" id="nome" required>
    <br>
    <label for="senha">Digite seu E-Mail:</label>
    <input type="email" name="email" id="email" required>
    <br>
    <label for="senha">Digite sua Senha: </label>
    <input type="password" name="senha" id="senha required">
    <br>
    <button type="submit">Criar</button>
    </form>



    </script>
</body>
</html>
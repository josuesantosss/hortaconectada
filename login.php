<?php
// Inicia a sessão para manter os dados entre páginas
session_start();

// Defina as credenciais do usuário
$usuario_correto = "josue";
$senha_correta = "101827";

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    // Verifica se o usuário e a senha estão corretos
    if ($usuario == $usuario_correto && $senha == $senha_correta) {
        // Redireciona para a página desejada, por exemplo, 'hortaconectada.html'
        header("Location: hortaconectada.html");
        exit();
    } else {
        // Se as credenciais estiverem erradas, exibe a mensagem de erro
        $erro = "Usuário ou senha inválidos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roça Conectada - Login</title>
    <style>
        /* Seu código CSS permanece o mesmo */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #4CE486;
            margin: 0;
            background-image: url('img/backgroundLogin.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            position: relative;
        }

        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.9); /* Transparência de 50% */
            background-image: url('img/backgroundLogin.png');
            background-size: cover;
            background-position: center;
            z-index: -1;
        }

        .login-container {
            position: relative;
            border: 1px solid #ccc;
            padding: 50px 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            color: black;
            width: 300px;
            text-align: center;
            background-color: rgba(255, 255, 255, 0.9);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .login-container h2 {
            margin-top: 0;
            margin-bottom: 20px;
        }

        .login-container label {
            display: block;
            margin-bottom: 5px;
        }

        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .login-container button {
            width: auto;
            padding: 8px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }

        .login-container button:hover {
            background-color: #0056b3;
        }

        .error {
            color: red;
            margin-bottom: 10px;
        }

        /* Ajustes para dispositivos móveis */
        @media (max-width: 768px) {
            body {
                overflow-x: hidden;
            }

            .dashboard {
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            }

            .user-info {
                flex-direction: column;
                align-items: flex-start;
            }

            .buttons {
                flex-direction: column;
                gap: 5px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Roça Conectada - Login</h2>
        <!-- Exibe a mensagem de erro, se houver -->
        <?php if (isset($erro)): ?>
            <div class="error"><?= $erro; ?></div>
        <?php endif; ?>
        <form action="login.php" method="POST">
            <label for="usuario">Usuário</label>
            <input type="text" id="usuario" name="usuario" required>
            <label for="senha">Senha</label>
            <input type="password" id="senha" name="senha" required>
            <button type="submit">Entrar</button>
        </form>
    </div>
</body>
</html>

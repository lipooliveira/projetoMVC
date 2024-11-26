<section>

    <style>
        .login-form {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .login-form form {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #f2f2f2;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .login-form label, .login-form input {
            margin: 10px 0;
        }
        .login-form input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }
        .login-form input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>

    <div class="login-form">
        <form action="<?php echo BASE_URL;?>/Auth/logar" method="post">
            <label for="login">Usuário:</label>
            <input type="text" id="login" name="login" pattern="[A-Za-z]{6}" title="Usuário deve ter exatamente 6 caracteres alfabéticos" required>
            <br>
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" pattern="[A-Za-z0-9]{8}" title="Senha deve ter exatamente 8 caracteres alfanuméricos" required>
            <br>
            <p id="errormessage" style="color: red;"></p>
            <input type="submit" value="Login">

            <a href="<?php echo BASE_URL?>/Auth">Não tenho conta!</a>
        </form>
    </div>
</section>
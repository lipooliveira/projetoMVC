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
        <form action="" method="post">
            <label for="username">Usuário:</label>
            <input type="text" id="username" name="username" pattern="[A-Za-z]{8}" title="Usuário deve ter exatamente 8 caracteres alfabéticos" required>
            <br>
            <label for="password">Senha:</label>
            <input type="password" id="password" name="password" pattern="[A-Za-z0-9]{6}" title="Senha deve ter exatamente 6 caracteres alfanuméricos" required>
            <br>
            <input type="submit" value="Login">
        </form>
    </div>
</section>
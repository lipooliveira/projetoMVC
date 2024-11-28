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
        .login-form input[type="submit"], .login-form input[type="button"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
        }
        .modal {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .modal-content {
            background-color: #fefefe;
            padding: 20px;
            border: 1px solid #888;
            text-align: center;
        }
    </style>

    <div class="login-form">
        <form method="POST" action="<?php echo BASE_URL; ?>/Auth/autenticar">
            <label for="login">Usuário:</label>
            <input type="text" id="login" name="login" required>
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>
            
            <?php
                // Gerando o desafio do segundo fator.
                $segundoFator = rand(0, 3);
                $pergunta = '';

                switch ($segundoFator) {
                    case 0:
                        $pergunta = "Qual o seu CPF?";
                        break;
                    case 1:
                        $pergunta = "Qual sua data de nascimento?";
                        break;
                    case 2:
                        $pergunta = "Qual seu CEP?";
                        break;
                    default:
                        $pergunta = "Qual o nome da sua mãe?";
                        break;
                }

                echo '<div class="modal" style="display: none;">';
                echo '<div class="modal-content">';
                echo "<h3>$pergunta</h3>";
                echo '<input type="hidden" name="id_segundoFator" value="' . $segundoFator . '">';
                $inputType = ($segundoFator == 1) ? 'date' : 'text';
                echo '<input type="' . $inputType . '" name="segundoFator">';
                echo '<input type="button" value="Enviar">';
                echo '</div>';
                echo '</div>';
            ?>
            <p id="errormessage" style="color:red"></p>
            <input type="submit" value="Login">
        </form>

        <?php
            if ($segundoFator == 0) {
                echo '<script>
                    document.querySelector("input[name=\'segundoFator\']").addEventListener("input", function(event) {
                        var value = event.target.value.replace(/\D/g, "");
                        if (value.length > 11) value = value.slice(0, 11);
                        var formattedValue = value.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, "$1.$2.$3-$4");
                        event.target.value = formattedValue;
                    });
                </script>';
            }
            if ($segundoFator == 2) {
                echo '<script>
                    document.querySelector("input[name=\'segundoFator\']").addEventListener("input", function(event) {
                        var value = event.target.value.replace(/\D/g, "");
                        if (value.length > 8) value = value.slice(0, 8);
                        var formattedValue = value.replace(/(\d{5})(\d{3})/, "$1-$2");
                        event.target.value = formattedValue;
                    });
                </script>';
            }
        ?>

        <script>
            document.querySelector('input[type="button"]').addEventListener('click', function() {
                document.querySelector('.modal').style.display = 'flex';
            });
            var modal = document.querySelector('.modal');
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }

            document.querySelector('form').addEventListener('submit', function(event) {
                var segundoFatorInput = document.querySelector('input[name="segundoFator"]');
                if (!segundoFatorInput.value) {
                    event.preventDefault();
                    document.querySelector('.modal').style.display = 'flex';
                }
            });


           
        </script>
    </div>
</section>

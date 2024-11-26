<section>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow-y: auto;
            max-height: 80vh;
            width: 300px;
        }
        .login-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .login-container input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .login-container button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .login-container button:hover {
            background-color: #45a049;
        }
    </style>

    <div class="login-container">
        <h2>Registro</h2>
        <form action="<?php echo BASE_URL;?>/Registro/incluir" method="post">
            <input type="text" name="cpf" placeholder="CPF" required pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" title="Formato: 000.000.000-00">
            <input type="text" name="nome" placeholder="Nome" required minlength="10" maxlength="80">
            <input type="date" name="data_nascimento" placeholder="Data de Nascimento" required>
            <input type="text" name="nome_mae" placeholder="Nome da Mãe" required minlength="10" maxlength="80">
            <input type="email" name="email" placeholder="Email" required>
            <input type="text" name="celular" placeholder="Celular" required pattern="\(\d{2}\) \d{5}-\d{4}" title="Formato: (00) 00000-0000">
            <input type="text" name="cep" placeholder="CEP" required pattern="\d{5}-\d{3}" title="Formato: 00000-000">
            <input type="text" name="logradouro" placeholder="Logradouro" required>
            <input type="text" name="numero" placeholder="Número" required>
            <input type="text" name="complemento" placeholder="Complemento">
            <input type="text" name="bairro" placeholder="Bairro" required>
            <input type="text" name="cidade" placeholder="Cidade" required>
            <input type="text" name="estado" placeholder="Estado" required>
            <input type="text" name="login" placeholder="Login" required pattern="[A-Za-z]{6}" title="Apenas letras, 6 caracteres">
            <input type="password" name="senha" placeholder="Senha" required pattern="[A-Za-z0-9]{8}" title="Apenas letras e números, 8 caracteres">
            <p id="errormessage" style="color: red; text-align: center;"></p>
            <button type="submit">Registrar</button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            const cpfInput = document.querySelector('input[name="cpf"]');

            form.addEventListener('submit', function(event) {
                if (!isValidCPF(cpfInput.value)) {
                    event.preventDefault();
                    alert('CPF inválido.');
                }
            });

            function isValidCPF(cpf) {
                cpf = cpf.replace(/\D/g, '');
                if (cpf.length !== 11 || /^(\d)\1+$/.test(cpf)) {
                    return false;
                }
                let sum = 0;
                for (let i = 0; i < 9; i++) {
                    sum += parseInt(cpf.charAt(i)) * (10 - i);
                }
                let remainder = 11 - (sum % 11);
                if (remainder === 10 || remainder === 11) {
                    remainder = 0;
                }
                if (remainder !== parseInt(cpf.charAt(9))) {
                    return false;
                }
                sum = 0;
                for (let i = 0; i < 10; i++) {
                    sum += parseInt(cpf.charAt(i)) * (11 - i);
                }
                remainder = 11 - (sum % 11);
                if (remainder === 10 || remainder === 11) {
                    remainder = 0;
                }
                return remainder === parseInt(cpf.charAt(10));
            }
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cpfInput = document.querySelector('input[name="cpf"]');
            const celularInput = document.querySelector('input[name="celular"]');
            const cepInput = document.querySelector('input[name="cep"]');

            cpfInput.addEventListener('blur', function() {
                let cpf = cpfInput.value.replace(/\D/g, '');
                if (cpf.length === 11) {
                    cpfInput.value = cpf.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
                }
            });

            celularInput.addEventListener('blur', function() {
                let celular = celularInput.value.replace(/\D/g, '');
                if (celular.length === 11) {
                    celularInput.value = celular.replace(/(\d{2})(\d{5})(\d{4})/, '($1) $2-$3');
                }
            });

            cepInput.addEventListener('blur', function() {
                let cep = cepInput.value.replace(/\D/g, '');
                if (cep.length === 8) {
                    cepInput.value = cep.replace(/(\d{5})(\d{3})/, '$1-$2');
                }
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cepInput = document.querySelector('input[name="cep"]');

            cepInput.addEventListener('blur', function() {
                let cep = cepInput.value.replace(/\D/g, '');
                if (cep.length === 8) {
                    fetch(`https://viacep.com.br/ws/${cep}/json/`)
                        .then(response => response.json())
                        .then(data => {
                            if (!data.erro) {
                                document.querySelector('input[name="logradouro"]').value = data.logradouro;
                                document.querySelector('input[name="bairro"]').value = data.bairro;
                                document.querySelector('input[name="cidade"]').value = data.localidade;
                                document.querySelector('input[name="estado"]').value = data.uf;
                            } else {
                                alert('CEP não encontrado.');
                            }
                        })
                        .catch(error => {
                            console.error('Erro ao buscar o CEP:', error);
                            alert('Erro ao buscar o CEP.');
                        });
                }
            });
        });
    </script>

</section>
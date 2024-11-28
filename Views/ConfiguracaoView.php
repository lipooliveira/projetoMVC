<section>
    
    <div class="container mt-5">
        <h2 class="mb-4">Configurações da Conta</h2>
        <div class="row">
            <div class="col-md-6">
                <button class="btn btn-primary btn-block mb-3" onclick="window.location.href='<?php echo BASE_URL?>/Usuario/atualizar'">Atualizar Cadastro</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="themeToggle">Modo Escuro/Claro</label>
                    <select class="form-control" id="themeToggle">
                        <option value="light">Claro</option>
                        <option value="dark">Escuro</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="fontSize">Tamanho da Fonte</label>
                    <div class="d-flex">
                        <button class="btn btn-secondary mr-2" id="decreaseFont">Diminuir</button>
                        <button class="btn btn-secondary ml-2" id="increaseFont">Aumentar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('themeToggle').addEventListener('change', function() {
            if (this.value === 'dark') {
                document.body.classList.add('bg-dark', 'text-white');
            } else {
                document.body.classList.remove('bg-dark', 'text-white');
            }
        });

        document.getElementById('decreaseFont').addEventListener('click', function() {
            document.body.style.fontSize = (parseInt(window.getComputedStyle(document.body).fontSize) - 1) + 'px';
        });

        document.getElementById('increaseFont').addEventListener('click', function() {
            document.body.style.fontSize = (parseInt(window.getComputedStyle(document.body).fontSize) + 1) + 'px';
        });
    </script>


</section>
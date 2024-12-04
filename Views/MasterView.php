<section>

    <div class="modal" id="confirmDeleteModal" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="confirmDeleteModalLabel">Confirmar Exclusão</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h3>
                            Tem certeza que deseja excluir este usuário?
                        </h3>
                        <h4 id="username"></h4>
                        <h4 id="cpf"></h4>
                        
                    </div>
                    <div class="modal-footer">
                    <p><strong>
                            Esta ação não poderá ser desfeita.

                        </strong></p>
                        <button type="button" class="btn btn-secondary" id="cancelDeleteBtn">Cancelar</button>
                        <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Excluir</button>
                    </div>
                </div>
            </div>
        </div>

    <div class="container mt-3">
        <h1>Controle de usuários</h1>
        <form class="form-inline" action="<?php echo BASE_URL?>/Master/pesquisar" method="POST">
            <label for="search">Pesquisar usuário:</label>
            <input class="form-control mr-sm-2" type="search" placeholder="Nome, CPF, Email, ID..." aria-label="Pesquisar" name="query" id="query">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="background-color: #f8f9fa;">Pesquisar</button>
        </form>
    </div>

    <script>
    document.getElementById('query').addEventListener('input', function (e) {
        let value = e.target.value;
        if (value.length === 11 && !isNaN(value)) {
            value = value.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
            e.target.value = value;
        }
    });
    </script>

    <div class="container mt-3">
        <h2>Usuários</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">CPF</th>
                    <th scope="col">Email</th>
                    <th scope="col">Perfil</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $dados = json_decode($dados, true);
                    $usuarios = [];
                    foreach ($dados as $dado) {
                        $usuario = new UsuarioModel();
                        $usuario->setId($dado['id']);
                        $usuario->setNome($dado['nome']);
                        $usuario->setCpf($dado['cpf']);
                        $usuario->setEmail($dado['email']);
                        $usuario->setPerfil($dado['perfil']);
                        $usuarios[] = $usuario;
                    }
                    $dados = $usuarios;
                    foreach($dados as $usuario)
                    {
                        echo '<tr>';
                        echo '<td>'.$usuario->getId().'</td>';
                        echo '<td>'.$usuario->getNome().'</td>';
                        echo '<td>'.$usuario->getCpf().'</td>';
                        echo '<td>'.$usuario->getEmail().'</td>';
                        echo '<td>'.($usuario->getPerfil() == 1 ? 'Master' : 'Comum').'</td>';
                        echo '<td><a href="'.BASE_URL.'/Master/editar/'.$usuario->getId().'">Editar</a> | <a class="delete" href="'.BASE_URL.'/Master/excluir/'.$usuario->getId().'">Excluir</a> | <a href="'.BASE_URL.'/Master/log/'.$usuario->getId().'">Log</a></td></td>';
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>

        <script>
            let userIdToDelete = null;

            document.querySelectorAll('.delete').forEach(function(element) {
                element.addEventListener('click', function(event) {
                    event.preventDefault();
                    userIdToDelete = event.target.href.split('/').pop();
                    document.getElementById('confirmDeleteModal').style.display = 'block';
                    document.getElementById('username').innerText = event.target.parentElement.parentElement.children[1].innerText;
                    document.getElementById('cpf').innerText = event.target.parentElement.parentElement.children[2].innerText;
            });
            });

            document.getElementById('confirmDeleteBtn').addEventListener('click', function() {
                if (userIdToDelete) {
                    window.location.href = '<?php echo BASE_URL; ?>/Master/excluir/' + userIdToDelete;
                }
            });

            document.getElementById('cancelDeleteBtn').addEventListener('click', function(){
                document.getElementById('confirmDeleteModal').style.display = 'none';
            })
        </script>
</section>
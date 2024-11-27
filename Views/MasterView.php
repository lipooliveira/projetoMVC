<section>
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
                        echo '<td><a href="'.BASE_URL.'/Master/editar/'.$usuario->getId().'">Editar</a> | <a href="'.BASE_URL.'/Master/excluir/'.$usuario->getId().'">Excluir</a> | <a href="'.BASE_URL.'/Master/log/'.$usuario->getId().'">Log</a></td></td>';
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>
</section>
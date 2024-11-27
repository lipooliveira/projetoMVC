<section>
    <div class="container mt-3">
        <h1>Editar usuário</h1>

        <?php 

            $dado = $dados;

            $usuario = new UsuarioModel();
            $usuario->setId($dado['id']);
            $usuario->setNome($dado['nome']);
            $usuario->setDataNascimento($dado['data_nascimento']);
            $usuario->setNomeMae($dado['nome_mae']);
            $usuario->setCpf($dado['cpf']);
            $usuario->setEmail($dado['email']);
            $usuario->setCelular($dado['celular']);
            $usuario->setCep($dado['cep']);
            $usuario->setLogradouro($dado['logradouro']);
            $usuario->setNumero($dado['numero']);
            $usuario->setComplemento($dado['complemento']);
            $usuario->setBairro($dado['bairro']);
            $usuario->setCidade($dado['cidade']);
            $usuario->setEstado($dado['estado']);
            $usuario->setLogin($dado['login']);
            $usuario->setSenha($dado['senha']);
            $usuario->setPerfil($dado['perfil']);
        ?>
        <form action="<?php echo BASE_URL?>/Master/atualizar" method="POST">
            <input type="hidden" name="id" value="<?php echo $usuario->getId()?>">
            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo $usuario->getCpf()?>" required>
            </div>
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $usuario->getNome()?>" required>
            </div>
            <div class="form-group">
                <label for="data_nascimento">Data de Nascimento:</label>
                <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" value="<?php echo $usuario->getDataNascimento()?>" required>
            </div>
            <div class="form-group">
                <label for="nome_mae">Nome da Mãe:</label>
                <input type="text" class="form-control" id="nome_mae" name="nome_mae" value="<?php echo $usuario->getNomeMae()?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $usuario->getEmail()?>" required>
            </div>
            <div class="form-group">
                <label for="celular">Celular:</label>
                <input type="text" class="form-control" id="celular" name="celular" value="<?php echo $usuario->getCelular()?>" required>
            </div>
            <div class="form-group">
                <label for="cep">CEP:</label>
                <input type="text" class="form-control" id="cep" name="cep" value="<?php echo $usuario->getCep()?>" required>
            </div>
            <div class="form-group">
                <label for="logradouro">Logradouro:</label>
                <input type="text" class="form-control" id="logradouro" name="logradouro" value="<?php echo $usuario->getLogradouro()?>" required>
            </div>
            <div class="form-group">
                <label for="numero">Número:</label>
                <input type="text" class="form-control" id="numero" name="numero" value="<?php echo $usuario->getNumero()?>" required>
            </div>
            <div class="form-group">
                <label for="complemento">Complemento:</label>
                <input type="text" class="form-control" id="complemento" name="complemento" value="<?php echo $usuario->getComplemento()?>">
            </div>
            <div class="form-group">
                <label for="bairro">Bairro:</label>
                <input type="text" class="form-control" id="bairro" name="bairro" value="<?php echo $usuario->getBairro()?>" required>
            </div>
            <div class="form-group">
                <label for="cidade">Cidade:</label>
                <input type="text" class="form-control" id="cidade" name="cidade" value="<?php echo $usuario->getCidade()?>" required>
            </div>
            <div class="form-group">
                <label for="estado">Estado:</label>
                <input type="text" class="form-control" id="estado" name="estado" value="<?php echo $usuario->getEstado()?>" required>
            </div>
            <div class="form-group">
                <label for="perfil">Perfil:</label>
                <select class="form-control" id="perfil" name="perfil" required>
                    <option value="0" <?php echo $usuario->getPerfil() == 0 ? 'selected' : ''?>>Master</option>
                    <option value="1" <?php echo $usuario->getPerfil() == 1 ? 'selected' : ''?>>Usuário</option>
                </select>
            </div>
            <div class="form-group">
                <label for="login">Login:</label>
                <input type="text" class="form-control" id="login" name="login" value="<?php echo $usuario->getLogin()?>" required>
            </div>
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="text" class="form-control" id="senha" name="senha" value="<?php echo $usuario->getSenha()?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
    </div>
</section>
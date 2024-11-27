<section>
    <div class="container mt-3">
        <h2><?php 
            $nome = json_decode($dados, true);
            echo $nome[0];
        ?></h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Data</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $dados = json_decode($dados, true);
                    $logs = [];
                    foreach ($dados[1] as $dado) {
                        $log = new LogModel();
                        $log->setId($dado['id']);
                        $log->setTimestamp($dado['timestamp']);
                        $logs[] = $log;
                    }
                    $dados = $logs;
                    foreach($dados as $log)
                    {
                        echo '<tr>';
                        echo '<td>'.$log->getId().'</td>';
                        echo '<td>'.$log->getTimestamp().'</td>';
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>
    </div>
</section>
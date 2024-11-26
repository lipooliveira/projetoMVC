<?php

class Conexao{
    private static $instancia;
    
    private function __construct(){}
    
    public static function getConexao()
    {
        if (!isset(self::$instancia))
        {
            $dbname = 'projeto2s';
            $host = 'localhost';
            $user = 'root';
            $senha = '';
            //$sqlFile = __DIR__ . '/bdlivraria.sql';

            //************************CARREGANDO O BANCO NO SERVIDOR */
                // // Conectar ao MySQL
                // $pdo = new PDO("mysql:host=$host", $user, $senha);
                // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // // Criar o banco de dados, se não existir
                // $pdo->exec("CREATE DATABASE IF NOT EXISTS $dbname");
                // echo "Banco de dados '$dbname' criado com sucesso!\n";

                // // Selecionar o banco de dados recém-criado
                // $pdo->exec("USE $dbname");

                // // Ler o arquivo .sql
                // $sql = file_get_contents($sqlFile);

                // // Executar o conteúdo do arquivo .sql diretamente
                // $pdo->exec($sql);
                // echo "Dados importados com sucesso do arquivo '$sqlFile'!";
            //*****************

            try{

                self::$instancia = new PDO('mysql:dbname='.$dbname.';host='.$host, $user, $senha);

            }catch (Exception $e)
            {
                echo 'O Erro é: ' . $e;
            }
        }
        return self::$instancia;
    }
}


// $con = Conexao::getConexao();
// if (is_object($con))
//     echo "Conexão estabelecida com sucesso!";
// else 
//     echo "Erro: Não foi possível estabelecer uma conexão.";

?>
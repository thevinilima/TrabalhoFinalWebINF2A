<?php 

Header("Content-type: text/html; charset=utf-8");

define("DB_HOST","localhost");
define("DB_USER","userlegal");
define("DB_PASSWORD","senhalegal");
define("DB_DATABASE","professores");

// Conexão com o localhost
$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
if (!$link)
    die("Conexão falhou: " . mysqli_connect_error());

// Deleta BD se ele existir 
# Acho que essa parte aqui daria pra tirar, deve funcionar do mesmo jeito
if (mysqli_query($link, 'DROP DATABASE IF EXISTS ' . DB_DATABASE))
    printf("Sucesso: Banco de Dados 'professores' foi removido.<br>");
else
    printf("Erro ao remover BD: ".mysqli_error($link));

// Cria BD se já não existir
$sql = "CREATE DATABASE IF NOT EXISTS `professores` 
        DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci";

if (mysqli_query($link, $sql))
    printf("Sucesso: Banco de Dados 'professores' foi criado.<br>");
else
    printf("Erro ao criar BD: ".mysqli_error($link));
    
// Conexão com o BD
$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
if (!$link) {
    die("Conexão falhou: " . mysqli_connect_error());
}

// Seleciona o BD para uso
if (mysqli_query($link, 'USE ' . DB_DATABASE))
    printf("Sucesso: Banco de Dados 'professores' foi usado.<br>");
else
    printf("Erro ao usar BD: ".mysqli_error($link));

// Cria Tabela Alunos
$sql = "CREATE TABLE IF NOT EXISTS `alunos` (
  `id_aluno` int(4)  NOT NULL,
  `nome` varchar(30) NOT NULL,
  `sobrenome` varchar(30) NOT NULL,
  `nota` int(3)  NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;";

if (mysqli_query($link, $sql))
    printf("Sucesso: Tabela \"Alunos\" criada.<br>");
else
    printf("Erro ao criar Tabela! ".mysqli_error($link));

// Insere dados na tabela Alunos
$sql = "INSERT INTO `alunos` (`id_aluno`, `nome`, `sobrenome`,`nota`) VALUES
(5, 'Exemplo1', 'Exemplo12', 45),
(6, 'Exemplo2', 'Exemplo13', 57),
(8, 'Exemplo3', 'Exemplo14', 54),
(7, 'Exemplo4', 'Exemplo15', 74),
(1, 'Exemplo5', 'Exemplo16', 32),
(4, 'Exemplo6', 'Exemplo17', 94),
(3, 'Exemplo7', 'Exemplo18', 88),
(2, 'Exemplo8', 'Exemplo19', 56),
(9, 'Exemplo9', 'Exemplo20', 67),
(11,'Exemplo10','Exemplo21', 78),
(10,'Exemplo11','Exemplo22', 94)";

if ($result = mysqli_query($link, $sql))
    echo "Novo registro criado na tabela \"Alunos\".<br>";
else
    echo "Erro: " . $sql . "<br>" . $link->error;

// Exibição da tabela
echo "<style>table,td,th { border: 1px solid black;} td,th{padding-left:10px;padding-right:10px;}</style>";
echo "<table><tr><th colspan=\"4\"><u>LISTA DE ALUNOS</u></th></tr>";

?>

<?php

require_once "../../vendor/autoload.php";

$conn = new RT\Database\ServicesDB();
$dados = new RT\Database\Dados($conn->conexao());
$produtoCategoria = new RT\ProtudoCategoria();


echo "### DELETANDO TABELA ###\n";
$conn->conexao()->query("DROP TABLE IF EXISTS produtoCategoria;");
echo " - OK\n";

echo "### CRIANDO TABELA ###\n";
$conn->conexao()->query("CREATE TABLE produtoCategoria (
              id INT NOT NULL AUTO_INCREMENT,
              nome VARCHAR(50) NULL,
              PRIMARY KEY (id))
            ENGINE = InnoDB
            DEFAULT CHARACTER SET = utf8
            COLLATE = utf8_general_ci");
echo " - OK\n";

echo "### INSERINDO DADOS NA TABELA ###\n";

$categoria1 = $produtoCategoria->setNome('Tenis');
$dados->persist($categoria1);

$categoria2 = $produtoCategoria->setNome('Sapado');
$dados->persist($categoria2);

$categoria3 = $produtoCategoria->setNome('Chinelo');
$dados->persist($categoria3);

$categoria4 = $produtoCategoria->setNome('Bota');
$dados->persist($categoria4);

$categoria5 = $produtoCategoria->setNome('Chuteira');
$dados->persist($categoria5);

$dados->flush();

echo " - OK\n";
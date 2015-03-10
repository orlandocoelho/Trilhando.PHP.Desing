<?php
require_once "../vendor/autoload.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Design Patterns</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <H1>PRODUTOS</H1>
    <?php

    use \RT\Form;
    use \RT\Request;
    use \RT\Validator;
    use \RT\Database\Dados;
    use \RT\Database\ServicesDB;

    $form = new Form(new Validator(new Request()));

    $nome = $form->createField('Input', 'text', array(
        "id" => 'id',
        "name" => "nomeProduto",
        "class" => "form-control",
        "placeholder" => "Nome do produto",
        "required" => true
    ));

    $valor = $form->createField('Input', 'text', array(
        "id" => 'id',
        "name" => "valor",
        "class" => "form-control",
        "placeholder" => "Valor do produto..",
        "required" => true
    ));

    $descricao = $form->createField('Input', 'text', array(
        "id" => 'id',
        "name" => "descricao",
        "class" => "form-control",
        "placeholder" => "Descrição do produto.",
        "required" => true
    ));

    $categoria = $form->createField('Select', new Dados((new ServicesDB())->conexao()), array(
        "id" => "id",
        "name" => "categoria",
        "class" => "form-control"
     ));

    $button = $form->createField('Button', 'submit', array(
        "id" => 'id',
        "name" => "button",
        "value" => 'Enviar',
        "class" => "btn btn-default"
    ));

    $divider = $form->createField("Divider");

    $fieldSet = $form->createField('FieldSet');

    $fieldSet->addField($nome)
        ->addField($divider)
        ->addField($valor)
        ->addField($divider)
        ->addField($descricao)
        ->addField($divider)
        ->addField($categoria)
        ->addField($divider)
        ->addField($button);

    $form->addField($fieldSet);

    $dados = array(
        'Nome' => 'Tenis de corrida',
        'Valor' => '120,00',
        'Descricao' => 'Descrição do produto contendo ate 200 caracteres'
    );

    $form->popular($dados);

    $form->render();

    ?>

</div>

</body>
</html>
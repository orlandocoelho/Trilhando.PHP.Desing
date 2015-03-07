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
    use \RT\PopulateIterador;

    $form = new Form(new Validator(new Request()));


    $nome = $form->createField('input', 'text', array(
        "id" => 'id',
        "name" => "nome",
        "class" => "form-control",
        "placeholder" => "Nome do produto",
        "required" => true
    ));

    $valor = $form->createField('input', 'text', array(
        "id" => 'id',
        "name" => "valor",
        "class" => "form-control",
        "placeholder" => "Valor do produto..",
        "required" => true
    ));

    $descricao = $form->createField('input', 'text', array(
        "id" => 'id',
        "name" => "descricao",
        "class" => "form-control",
        "placeholder" => "Descrição do produto.",
        "required" => true
    ));

    $categoria = $form->createField('select', null, array(
        "id" => "id",
        "name" => "categoria",
        "class" => "form-control"
    ));

    $button = $form->createField('button', 'submit', array(
        "id" => 'id',
        "name" => "button",
        "value" => 'Enviar',
        "class" => "btn btn-default"
    ));

    $divider = $form->createField("divider");

    $fieldSet = $form->createField('fieldset');

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

    $populator = new PopulateIterador($dados);

    $form->popular($populator);

    $form->render();

    ?>

</div>

</body>
</html>
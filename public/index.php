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

    $button = $form->createField('button', 'submit', array(
        "id" => 'id',
        "name" => "button",
        "value" => 'Enviar',
        "class" => "btn btn-default"
        ));


    $fieldSet = $form->createField('fieldset');

    $fieldSet->addField($nome)->addField($valor)->addField($descricao)->addField($button);

    $form->addField($fieldSet);
    $form->render();

    ?>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
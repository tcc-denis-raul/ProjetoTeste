<?php
$base_nome      = "paloma";
$colecao_cursos = "cursos_idiomas";

$mongo_cliente = new MongoClient();
$db            = $mongo_cliente->$base_nome;

<?php
require_once "funtion.php";
require_once "model/SELECT_cateNoWhere.php";

$SELECT_cateNoWhere = new SELECT_cateNoWhere();
$cates = $SELECT_cateNoWhere->getAll();

require_once "view/header_view.php";

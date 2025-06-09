<?php

require_once "../vendor/autoload.php";

use Meder\ParserProject\Controller\MainController;

$controller = new MainController();
$controller->handle();

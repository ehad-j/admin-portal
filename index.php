<?php
require_once "controller/template.controller.php";
require_once "controller/users.controller.php";
require_once "controller/roles.controller.php";

require_once "model/users.model.php";
require_once "model/roles.model.php";

$template = new ControllerTemplate();
$template -> ctrTemplate();
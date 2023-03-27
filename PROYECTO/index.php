<?php
session_start();
require_once('config.php');
require_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'\PRACTICA-1-TEO1\PROYECTO\controller\indexController.php');
indexController::index();
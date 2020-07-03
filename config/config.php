<?php

error_reporting(E_ALL);
date_default_timezone_set('America/Sao_Paulo');

define('URL_FRIENDLY', explode('/', $_SERVER['REDIRECT_QUERY_STRING'] ?? null));

require_once '../class/AutoLoad.class.php';


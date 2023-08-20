<?php
session_start();
session_destroy();

require_once '../core/functions.php';


redirect('index.php');
die();
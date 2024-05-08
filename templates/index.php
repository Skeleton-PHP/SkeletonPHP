<?php
require_once 'template.php'; // Adjust the path to Template.php

use SkeletonPHP\Templates\Stencil;

// Instantiate the Stencil class
$stencil = new Stencil();

$stencil->view("index.html",[
    'title' => 'My Page Title',
    'content' => 'Hello, world!',
]);


?>
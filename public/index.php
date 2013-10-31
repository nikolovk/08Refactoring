<?php

include '../inc/functions.php';
const TemplatesPath = '../templates/';
const LayoutPath = '../templates/layouts/';
const ModelPath = '../models/';
$page = '';
if (isset($_GET['p'])) {
    switch ($_GET['p']) {
        case 'index':
            $page = 'index';
            break;
        case 'authors':
            $page = 'authors';
            break;
        case 'add_book':
            $page = 'add_book';
            break;
        default:
            $page = 'index';
            break;
    }
} else {
    $page = 'index';
}

$data['content'] = TemplatesPath. $page.'_content.php';
$data['header'] = TemplatesPath. $page.'_header.php';
include ModelPath. $page.'_model.php';

render($data,LayoutPath.'common_layout.php');

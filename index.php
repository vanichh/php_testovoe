<?php
require_once('view/meta.php');
preg_match('#^/(.*)/#', $_SERVER['REQUEST_URI'], $get);
switch ($get[1]) {
  case 'page':
    require_once('controller/posts.php');
    break;
  case 'view':
    require_once('controller/news.php');
    break;
  default:
    require_once('controller/posts.php');
}

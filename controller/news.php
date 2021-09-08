<?php
spl_autoload_register();

use \Data\DatabaseShell as DatabaseShell;
$db = new DatabaseShell('localhost', 'root', 'root', 'test');
$idNews = $_GET['id'];
$getNews = $db->getNews('news', ['title, content'], $idNews);
$rez = mysqli_fetch_assoc($getNews);
$title = $rez['title'];
$content = $rez['content'];
require_once('view/news_post.php');

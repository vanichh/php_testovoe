<?php
spl_autoload_register();

use \Data\DatabaseShell as DatabaseShell;

$getPages = 5;
$numberPages = (int) $_GET['page'] * $getPages;
require_once('view/header.php');
$db = new DatabaseShell('localhost', 'root', 'root', 'test');
$getNews = $db->getPost(
  'news',
  ['id', 'idate', 'title', 'announce'],
  $numberPages,
  $getPages
);
while ($rez = mysqli_fetch_assoc($getNews)) {
  $id = $rez['id'];
  $time =  date('d.m.Y', $rez['idate']);
  $title = $rez['title'];
  $announce = $rez['announce'];
  require('view/post.php');
}
$getNews = $db->getCount('news', 'COUNT(id) as count');
$countPages = (int) mysqli_fetch_assoc($getNews)["count"];
require_once('view/footer.php');

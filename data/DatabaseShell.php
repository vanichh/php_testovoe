<?php

namespace Data;

class DatabaseShell
{
  private $link;

  public function __construct($host, $user, $password, $database)
  {
    $this->link = mysqli_connect($host, $user, $password, $database);
    mysqli_query($this->link, "SET NAMES 'utf8'");
  }

  public function save($table, $data)
  {
    $note = '';
    foreach ($data as $key => $value) {
      $note .= "$key = '$value', ";
    }
    $note = substr($note, 0, -2);
    $query = "INSERT INTO $table SET $note";
    return mysqli_query($this->link, $query);
  }


  public function getPost($tableName, $choice, $number, $limit)
  {
    if (gettype($choice) == 'array') {
      $choice = implode(', ', $choice);
    }
    $query = "SELECT $choice FROM $tableName WHERE";
    $query.= " id>0 ORDER BY idate LIMIT $number, $limit";
    return mysqli_query($this->link, $query);
  }

    public function getCount($tableName, $choice){
    $query = "SELECT $choice FROM $tableName";
    return mysqli_query($this->link, $query);
    }

  public function getNews($tableName, $choice, $number = 0)
  {
    if (gettype($choice) == 'array') {
      $choice = implode(', ', $choice);
    }
    $query = "SELECT $choice FROM $tableName WHERE id = $number";
    return mysqli_query($this->link, $query);
  }
}

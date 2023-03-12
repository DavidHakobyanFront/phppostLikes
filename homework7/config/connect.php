<?php
$connect = mysqli_connect('localhost', 'root', '', 'group0123');
if(!$connect){
    die('Error connect to DataBase');
}
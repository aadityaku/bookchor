<?php

const HOST="localhost";
const USER="root";
const PASS="";
const DB="cws";
$connect=mysqli_connect(HOST,USER,PASS,DB) or die("db fail");
session_start();
?>
<?php
require_once "inc/header.php";
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$sql = "delete from crud where id=?";
	$res = $pdo->prepare($sql);
	$res->execute([$id]);
	header("Location:index.php?delete=success");
}

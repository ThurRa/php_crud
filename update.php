<?php
require_once "inc/header.php";
?>
<?php
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$sql = "select * from crud where id=?";
	$res = $pdo->prepare($sql);
	$res->execute([$id]);
	$data = $res->fetch(PDO::FETCH_ASSOC);
}

?>
<a href="index.php" class="btn btn-sm btn-black">Back</a>
<div class="card">
	<div class="card-body">
		<form action="" method="POST" enctype="multipart/form-data">
			<div class="form-group">
				<label for="">Enter Name</label>
				<input type="text" name="name" class="form-control" value="<?php echo $data['name'] ?>">
			</div>
			<div class="form-group">
				<label for="">Choose File</label>
				<input class="form-control" type="file" name="image">
				<img src="image/<?php echo $data['image'] ?>" alt="" style="border-radius:20%" width="50px"
					height="50px">
			</div>
			<input type="submit" name="submit" value="update" class="btn btn-success btn-sm">
		</form>
	</div>
</div>
<?php
require_once "inc/footer.php";
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// print_r($_FILES);
	$name = $_POST['name'];
	if ($_FILES['image']['tmp_name'] != "") {
		$img_name = $_FILES['image']['name'];
		$tmp_name = $_FILES['image']['tmp_name'];
		$path = "image/" . $img_name;
		move_uploaded_file($tmp_name, $path);
	} else {
		$img_name = $data['image'];
	}
	$sql = "update crud set name=?,image=? where id=?";
	$res = $pdo->prepare($sql);
	$res->execute([$name, $img_name, $id]);
	header("Location:index.php?update=success");
}
?>

<?php
require_once "inc/header.php";
?>

<a href="index.php" class="btn btn-sm btn-black">Back</a>
<div class="card">
	<div class="card-body">
		<form action="" method="POST" enctype="multipart/form-data">
			<div class="form-group">
				<label for="">Enter Name</label>
				<input type="text" name="name" class="form-control">
			</div>
			<div class="form-group">
				<label for="">Choose File</label>
				<input class="form-control" type="file" name="image">
			</div>
			<input type="submit" name="submit" value="Create" class="btn btn-success btn-sm">
		</form>
	</div>
</div>
<?php
require_once "inc/footer.php";
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = $_POST['name'];
	$image_name = $_FILES['image']['name'];
	$tmp_name = $_FILES['image']['tmp_name'];
	$path = "image/" . $image_name;
	move_uploaded_file($tmp_name, $path);


	$sql = "insert into crud (name,image) values (?,?)";
	$res = $pdo->prepare($sql);
	$res->execute([$name, $image_name]);

	header("Location:index.php?create=success");
}
?>

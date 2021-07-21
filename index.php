<?php require_once "inc/header.php";
?>


<a href="create.php" class="btn btn-sm btn-success">Create</a>
<?php
if (isset($_GET['create'])) { ?>
<div class="alert alert-success">
	Create Successfully
</div>
<?php
}
?>

<?php
if (isset($_GET['update'])) { ?>
<div class="alert alert-success">
	Update Successfully
</div>
<?php
}
?>

<?php
if (isset($_GET['delete'])) { ?>
<div class="alert alert-success">
	Delete Successfully
</div>
<?php
}
?>
<table class="table table striped">
	<tr>
		<td>No</td>
		<td>Name</td>
		<td>Image</td>
		<td>Option</td>

	</tr>
	<?php
	$no = 1;
	$sql = "select * from crud";
	$data = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
	foreach ($data as $d) { ?>
	<tr>
		<td><?php echo $no++; ?></td>
		<td><?php echo $d['name']; ?></td>
		<td>
			<img src="image/<?php echo $d['image']; ?>" alt="" style="border-radius:20%" width="50px" height="50x">
		</td>

		<td>
			<a href="update.php?id=<?php echo $d['id']; ?>" class="btn btn-warning btn-sm">Update</a>
			<a href="delete.php?id=<?php echo $d['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
		</td>
	</tr>
	<?php
	}
	?>

</table>
<?php require_once "inc/footer.php";
?>

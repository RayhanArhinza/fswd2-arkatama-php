<?php
include 'conn.php';
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Information</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
	<div class="container mt-3">
        <div class="table-responsive ">
                    <table class="table text-center">
                        <thead class="table-primary">
				<tr>
					<th>Key</th>
					<th>Value</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$sessionVariables = $_SESSION;

				foreach($sessionVariables as $key => $value){
					?>
					<tr>
						<td><?= $key ?></td>
						<td><?php echo $value ?></td>
					</tr>
					<?php
				}
				?>
			</tbody>
		</table>

		<?php
		if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']){
			?>
			<a href="login.php" class="btn btn-primary">Logout</a>
			<?php
		}
		?>
        </div>
	</div>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>

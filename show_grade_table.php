<?php
include_once './config/config.php';
if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('location:../index.php');
    exit;
}
?>

<div class="col-8">
		<div class="card card-outline card-primary">
			<div class="card-header">
				<h3 class="card-title">Oceny</h3>
			</div>
			<!-- /.card-header -->
			<div class="card-body">
				<table id="dTable" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>ID</th>
							<th>Ocena</th>
							<th>Akcje</th>
						</tr>
					</thead>
					<tbody>
						<?php
						
						$sql = "SELECT * FROM grade";
						$result = mysqli_query($conn, $sql);
						$count = 0;
						
						if (mysqli_num_rows($result) > 0) {
							while ($row = mysqli_fetch_assoc($result)) {
								$count++;

						?>
								<tr>
									<td><?php echo $count; ?></td>
									<td id="td1_<?php echo $row['id']; ?>"><?php echo $row['name']; ?></td>
									
									<td>
										<a href="#modalUpdateForm" onClick="updateRecord(this);" class="btn btn-primary btn-xs " data-id="<?php echo $row['id']; ?>" data-toggle="modal">Edytuj</a>
										<a href="#" onClick="deleteRecord(this);" class="btn btn-danger btn-xs " data-id="<?php echo $row['id']; ?>" data-toggle="modal">Usuń</a>
									</td>
								</tr>
						<?php }
						} ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
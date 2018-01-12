<?php
	include "base.php";
// this code allows no user t
	if(!isset($_SESSION["username"])){
		header("Location: ../index.php");
		exit(); 
	}

	$sql = "SELECT * FROM teams WHERE approved ='1'";
	$team_data = mysqli_query($con, $sql);
	$i =1;
?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
	<header class="w3-bar w3-border w3-light-grey">
		<a href="#"  class="w3-bar-item w3-button""><?php echo "<strong>Admin Access</strong> [" .$_SESSION['username']."]";?></a>
		<a href="user_admin.php" class="w3-bar-item w3-button">Main Menu</a>
		<a href="projects.php" class="w3-bar-item w3-button">Available Projects</a>
		<a href="teams.php" class="w3-bar-item w3-button w3-blue">Senior Project Groups</a>
		<a href="create_project.php" class="w3-bar-item w3-button">Create Project</a>
		<a href="create_team.php" class="w3-bar-item w3-button">Create Team</a>
		<a style="float: right;" href="logout.php" class="w3-bar-item w3-button">Logout</a>
	</header>

	<body>
		<h3>List project teams:</h3><br>
			<form>
				<table class="w3-table-all">
					<tr align="center" class="w3-blue">
						<th>Team Name</th>
						<th>Class</th>
						<th>Semester</th>
						<th>Number of Members</th>
						<th>Team Motto</th>
						<th>Mark</th>
						
					</tr>
					<?php
							while ($row = mysqli_fetch_array($team_data)){
								echo "<tr>
									  <td>{$row['tname']}</td>
									  <td>{$row['class']}</td>
									  <td>{$row['semester']}</td>
									  <td>{$row['num_members']}</td>
									  <td>{$row['motto']}</td>
									  <td><input type='checkbox' name='check[$i]' value='".$row['tname']."'></td>
									</tr>";
							}
						?>
				</table>
				<center>
						<!-- <input class="w3-button w3-red" type="submit" name="cancel" value="Delete"> -->
						<input class="w3-button w3-blue" type="submit" name="cancel" value="Cancel">
						<input class="w3-button w3-green" type="submit" name="approve" value="Email">
				</center>
			</form>
	</body>
</html>
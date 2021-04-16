<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/headfoot.css">
		<link rel="stylesheet" type="text/css" href="css/table.css">
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<title>All Customers</title>
	</head>
	<body bgcolor = #F0F8FF>
		<?php
			include 'connection.php';
			$sql = "SELECT * FROM customers";
			$res = mysqli_query($con,$sql);
		?>
		<center>
			<div class = "header">
				<a href = "index.php" class = "logo"> SPARKS FOUNDATION BANK</a>
				<div class = "header-right">
					<a href = "index.php"><i class="fa fa-home"></i> Home</a>
					<a class = "active" href = "transfer.php"><i class="fa fa-user"></i> All Customers</a>
					<a href = "history.php"><i class="fa fa-history fa-fw"></i> History</a>
				</div>
			</div>
			<br><br><br>
			<h2>ALL CUSTOMERS</h2>
			<br><br><br>
            <table id = "customers">
				<thead>
                    <tr>
						<th>ID</th>
						<th>NAME</th>
						<th>E-MAIL ID</th>
						<th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    while($row = mysqli_fetch_assoc($res)){
                ?>
                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['name']?></td>
                        <td><?php echo $row['email']?></td>
                        <td>
							<a href="customer.php?id= <?php echo $row['id'] ;?>">
								<button type="button"><span>Choose this Account</span></button>
							</a>
						</td> 
                    </tr>
                <?php
                    }
                ?>            
                </tbody>
            </table>
			<br><br><br><br><br>
		</center>
		<footer class="footer">
			<center>
				<p>A Project by AVINASH</p>
				<p>For Internship Program by The Sparks Foundation</p>
			</center>
		</footer>
	</body>
</html>
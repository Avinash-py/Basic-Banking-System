<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/headfoot.css">
		<link rel="stylesheet" type="text/css" href="css/table.css">
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<title>Transaction History</title>
	</head>
	<body bgcolor = #F0F8FF>
		<?php
			include 'connection.php';
			$sql = "SELECT * FROM transfers ORDER BY datetime DESC";
			$res = mysqli_query($con,$sql);
		?>
		<center>
			<div class = "header">
				<a href = "index.php" class = "logo"> SPARKS FOUNDATION BANK</a>
				<div class = "header-right">
					<a href = "index.php"><i class="fa fa-home"></i> Home</a>
					<a href = "transfer.php"><i class="fa fa-user"></i> All Customers</a>
					<a class = "active" href = "history.php"><i class="fa fa-history fa-fw"></i> History</a>
				</div>
			</div>
			<br><br><br>
			<h2>TRANSACTION HISTORY</h2>
			<br><br><br>
            <table id = "customers">
				<thead>
                    <tr>
						<th>SENDER</th>
						<th>RECEIVER</th>
						<th>AMOUNT</th>
						<th>DATE & TIME</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    while($rows=mysqli_fetch_assoc($res)){
                ?>
                    <tr>
                        <td><?php echo $rows['sname'] ?></td>
                        <td><?php echo $rows['rname']?></td>
                        <td><?php echo $rows['amount']?></td>
						<td><?php echo $rows['datetime']?></td>
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
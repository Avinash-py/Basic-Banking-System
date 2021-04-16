<?php
include 'connection.php';
if(isset($_POST['submit']))
{
    $sender = $_GET['id'];
    $receiver = $_POST['receiver'];
    $amount = $_POST['amount'];
    $sql = "SELECT * from customers where id = $sender";
    $result = mysqli_query($con,$sql);
    $res1 = mysqli_fetch_array($result);  
    $sql = "SELECT * from customers where id = $receiver";
    $result = mysqli_query($con,$sql);
    $res2 = mysqli_fetch_array($result);
	$newamount = $res1['balance'] - $amount;
    $sql = "UPDATE customers set balance = $newamount where id = $sender";
    mysqli_query($con,$sql);
    $newamount = $res2['balance'] + $amount;
    $sql = "UPDATE customers set balance = $newamount where id = $receiver";
    mysqli_query($con,$sql);
    $send = $res1['name'];
    $receive = $res2['name'];
	$sid = $res1['id'];
	$rid = $res2['id'];
    $sql = "INSERT INTO transfers(sid, rid, sname, rname, amount) VALUES ($sid, $rid, '$send','$receive', $amount)";
    $result = mysqli_query($con,$sql);
	if($result)
	{
		echo "<script> alert('Transaction Successful');
			  window.location='transfer.php';
			  </script>";                
	}
$newamount = 0;
$amount = 0;
}
?>

<!DOCTYPE html>
<html lang = "en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="css/headfoot.css">
		<link rel="stylesheet" type="text/css" href="css/transfer.css">
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<title>Transaction</title>
	</head>
	<body bgcolor = #E6E6FA>
		<center>
			<div class = "header">
				<a href = "index.php" class = "logo"> SPARKS FOUNDATION BANK</a>
				<div class = "header-right">
					<a href = "index.php"><i class="fa fa-home"></i> Home</a>
					<a href = "transfer.php"><i class="fa fa-user"></i> All Customers</a>
					<a href = "history.php"><i class="fa fa-history fa-fw"></i> History</a>
				</div>
			</div>
			<br><br><br>
			<h2>TRANSACTION</h2>
			<br><br><br>
			<?php
				include 'connection.php';
				$sid = $_GET['id'];
				$sql = "SELECT * FROM  customers where id = $sid";
				$res = mysqli_query($con,$sql);
				$row = mysqli_fetch_assoc($res);
			?>
			<form method = "post" name = "transaction"><br>
				<table>
					<tr>
						<th>ID</th>
						<th>NAME</th>
						<th>E-MAIL ID</th>
						<th>BALANCE</th>
					</tr>
					<tr>
						<td><?php echo $row['id'] ?></td>
						<td><?php echo $row['name'] ?></td>
						<td><?php echo $row['email'] ?></td>
						<td><?php echo $row['balance'];
								  $temp = $row['balance']
							?>
						</td>
					</tr>
				</table>
				<br><br><br>
				<select name = "receiver" required>
					<option value="" disabled selected>Transfer Amount To</option>
					<?php
						include 'connection.php';
						$sid = $_GET['id'];
						$sql = "SELECT * FROM customers where id != $sid";
						$res = mysqli_query($con,$sql);
						while($row = mysqli_fetch_assoc($res)) {
					?>
					<option value="<?php echo $row['id'];?>" >                
						<?php echo $row['name'] ;?> [Current Balance: 
						<?php echo $row['balance'] ;?>]               
					</option>
					<?php 
						} 
					?>
				</select>
				<br><br>
				<input type="number" placeholder = "Amount To Transfer" name="amount" min = "1" max = "<?php echo $temp ?>" required>   
				<br><br>
				<button name = "reset" type = "reset"><span>Reset</span></button>
				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				<button name = "submit" type = "submit"><span>Transfer</span></button>
			</form>
			<br><br><br>
		</center>
		<footer class="footer">
			<center>
				<p>A Project by AVINASH</p>
				<p>For Internship Program by The Sparks Foundation</p>
			</center>
		</footer>
    </body>
</html>
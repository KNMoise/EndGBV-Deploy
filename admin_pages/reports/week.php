<?php 
	require '../includes/db.php';
	$today = date("Y-m-d");
?>
<!DOCTYPE html>
<html>
<head>
	<title> Week Report</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.0/jspdf.umd.min.js"></script>

	<style type="text/css">
		 @media print {
            .print-button {
                display: none;
            }
        }
        .print-button {
        	margin-left: 320px;
        }
	</style>
</head>
<body>

<div class="wrapper">
	 <button class="print-button" onclick="printContent()">Print</button>
	<div class="invoice_wrapper">
		<div class="header">
			<div class="logo_invoice_wrap">
				<div class="logo_sec">
					<img src="logo.png" alt="code logo">
					<div class="title_wrap">
						<p class="title bold">Fresh Ink Co.</p>
						<p class="sub_title">Fast And Foremost</p>
					</div>
				</div>
				<div class="invoice_sec">
					<p class="invoice bold">This Week'S REPORT</p>
					<p class="invoice_no">
						<span class="bold">Month</span>
						<span><?php echo date("M"); ?></span>
					</p>
					<p class="date">
						<span class="bold">Date</span>
						<span><?php echo date("d-m-Y") ?></span>
					</p>
					<p class="date">
						<span class="bold">Currency</span>
						<span>RWF</span>
					</p>
				</div>
			</div>
			<div class="bill_total_wrap">
				<div class="bill_sec">
					<p></p> 
	          		<p class="bold name"></p>
			        <span>
			           <br/>
			           
			        </span>
				</div>
				
			</div>
		</div>
		<div class="body">
			<div class="main_table">
				<div class="table_header">
					<div class="row">
						<div class="col col_no">#</div>
						<div class="col col_des">Job</div>
						<div class="col col_des">Earning</div>
						<div class="col col_des">Expenses</div>

					</div>
				</div>
				<div class="table_body">
					<?php

						$sql = "SELECT DISTINCT  j.job_id, j.job_title, SUM(e.amount) AS total_expenses, j.income, j.job_date FROM incomes j LEFT JOIN expenses e ON j.job_id = e.job_linked WHERE WEEK(j.job_date) = WEEK(CURDATE()) GROUP BY j.job_id;";
						$sql2 = mysqli_query($conn, $sql);

						while ($rows = mysqli_fetch_assoc($sql2)) {
							
						


					?>
					<div class="row">
						<div class="col col_no">
							<p><?php echo $rows['job_id']; ?></p>
						</div>
						<div class="col col_des">
							<p class="bold">
								<?php echo $rows['job_title']; ?></p>
						</div>
						<div class="col col_des">
							<p>
								<?php 
									$income = $rows['income'];
									echo number_format($income); 
								?>
							</p>
						</div>
						<div class="col col_des">
							<p>
								<?php 
									$totalExpenses = $rows['total_expenses'];
									echo number_format($totalExpenses); 
								?>
							</p>
						</div>
					</div>
				<?php } ?>
					


				</div>
			</div>
			<div class="paymethod_grandtotal_wrap" style="margin: auto;">
				<div class="paymethod_sec">
					<p class="bold"></p>
					<p></p>
				</div>
				<div class="grandtotal_sec">
					<?php 
						$query = "SELECT SUM(income) as total_earnings FROM incomes  WHERE WEEK(job_date) = WEEK(CURDATE());";
						$query2 = mysqli_query($conn, $query);

						while ($row1 = mysqli_fetch_assoc($query2)) {
							$total_earnings = number_format($row1['total_earnings']);
					?>
			        <p>
			            <span>Total Earnings</span>
			            <span><?php echo $total_earnings; ?></span>
			        </p>
			    	<?php 
						$query = "SELECT SUM(amount) as total_expense FROM expenses WHERE WEEK(expense_date) = WEEK(CURDATE());";
						$query2 = mysqli_query($conn, $query);

						while ($row = mysqli_fetch_assoc($query2)) {
							$total_expense = number_format($row['total_expense']);
					?>
			        <p>
			            <span>- Total Expenses</span>
			            <span><?php echo $total_expense; ?></span>
			        </p>
			        
			       	<p class="bold">
			            <span>
			            	<?php 
			            		$grand = $row1['total_earnings'] - $row['total_expense'];
			            		$grand2 = number_format($grand);
			            		
			            		if ($grand2 > 0) {
			            		 	echo "Profit";
			            		 } else {
			            		 	echo "Loss";
			            		 }
			            		  
			            	?>
			            </span>
			            <span>
			            	<?php 
			            		$grand = $row1['total_earnings'] - $row['total_expense'];
			            		$grand2 = number_format($grand);
			            		echo $grand2;  
			            	?>	
			            </span>
			        </p>
			    <?php }} ?>
				</div>
			</div>
		</div>
		<div class="footer">
			<div class="terms"> 
		        <p style="text-align:center;">" At Fresh Ink Co., we are passionate about providing exceptional screen printing services that leave a lasting impression. As a leading screen printing company, we specialize in delivering high-quality and customized prints for businesses of all sizes! "</p>
		    </div>
		</div>
	</div>
</div>
 
 <script>
        function printContent() {
            window.print();
        }
        
    </script>


</body>
</html>
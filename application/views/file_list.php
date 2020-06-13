<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
	
		box-shadow: 0 0 8px #D0D0D0;
	}
	table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
	</style>
</head>
<body>

<div id="container">
	<h1>File List</h1>

	<div id="body">
		<div>
			<p><?php if(isset($message) && $message != "") echo $message;?></p>
			<p style="float: right;">
				<a href="<?php echo base_url();?>index.php/Filelist/add">Upload New File</a>
			</p>
		</div>
		<table border="1">
			<tr>
				<th>File Name</th>
				<th>Status</th>
				<th>Created Time</th>
				<th>Action</th>
			</tr>
			
			 <?php	
			 if(isset($files) && !empty($files)){
			foreach ($files as $row){ ?>
				<tr>
					<td><?php echo $row['filename'];?></td>
					<td><?php echo $row['status'];?></td>
					<td><?php echo $row['created_at'];?></td>
					<td><a href="<?php echo base_url().'index.php/Filelist/deletefile/'. $row['id'];?>">Delete</a></td>
				</tr>
		<?php 	}
	}?>

		</table>
		<?php echo $links; ?>
		
	</div>
<p class="footer"></p>
	
</div>

</body>
</html>
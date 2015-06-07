<html>
	<head>
		<title>
			Remove
		</title>
	</head>
	<style>
		html{
			font-family: sans-serif;
			font-weight: 300;
		}
		#container{
			margin:0 auto;
			width: 50%;
			padding: 1.5em;
		}
		#delete_button{
			border:none;
			outline:none;
			color:white;
			font-size: 11pt;
			background-color: red;
		}
		#button_wrapper{
			width: 50%;
			margin:0 auto;
		}
		form{
			display: inline-block;
			margin-left: 40%;
			vertical-align: top;
		}
	</style>
	<body>
		<div id="container">
			<h3>Are you sure you want to delete the following course?</h3>
			<p>Name:  <?=$courseinfo[0]['name']?></p>
			<p>Description:  <?=$courseinfo[0]['description']?></p>
		</div>
		<div id="button_wrapper">
			<a href="/">Cancel</a>
			<form action="delete" method="post">
				<input type="hidden" name="confirm_delete" value=<?=$courseinfo[0]['id']?>>
				<button type="submit" id="delete_button">Yes! Delete this course.</button>
			</form>
		</div>
	</body>
</html>
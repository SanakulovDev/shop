<?php 
require_once "db.php";
session_start();
if (isset($_GET['product_id']) && isset($_GET['user_id'])) {
	$product_id = $_GET['product_id'];
	$user_id = $_GET['user_id'];
	$data ='';
	if (isset($_SESSION['comment_text'])&& $_SESSION['comment_text']) {
		$sql_comment_insert = "INSERT INTO comment (user_id, product_id, comment_text, status) 
		VALUES(".$user_id.", ".$product_id.", '".$_SESSION['comment_text']."', 1)";
		$result = mysqli_query($conn, $sql_comment_insert);
		$result = mysqli_fetch_assoc($result);
	}

	$data .= "div class='col-12 col-md-6 bg-light mb-3 rounded pos-relative' style='border: 2px solid #819696;'>";
	$data .="<h1 class='h5 font-bold' style='font-style: italic;'>".$_SESSION['username']."</h1>";
	$data .="<p class='fs-6 fw-lighter' style='display: block;'>".$result['comment_text']."</p>";
	$data .="<p class='fs-6 text-muted' style='float: right; display: block; position: relative;'></p></div>";	
	echo $data;

}

?>
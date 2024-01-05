<?php
session_start();
$_SESSION['login_id'] = $_POST['login_id']; // sunil user
$message = $_POST['message'];
$user_id = $_POST['user_id'];

include_once "db_connect.php";
include_once 'admin_class.php';

	function send_chat($message,$user_id,$login_id,$conn){
		$_SESSION['login_id'] = '5';
		$data = $message;
		$data .= ", user_id = '{$user_id}' ";
		if(empty($convo_id)){
			$cdata = " user_ids = '$user_id,{$_SESSION['login_id']}' ";
			$cdata2 = " user_ids = '{$_SESSION['login_id']},$user_id' ";
			$user_ids = $_SESSION['login_id'].",".$user_id;
			// $chk = $this->db->query("SELECT * from thread where $cdata or $cdata2 ");
			$chk = mysqli_query($conn,"SELECT * from thread where $cdata or $cdata2 ");
			if(mysqli_num_rows($chk) > 0){
				$convo_id = mysqli_fetch_array($chk)['id'];
			}else{
				$thread = mysqli_query($conn,"INSERT INTO thread set $cdata ");
				$convo_id = $conn->insert_id;
			}
		}else{
			
			$qry =mysqli_query($conn,"SELECT * from thread where md5(id) ='$convo_id' ");
			$qry = mysqli_fetch_array($qry);
			$convo_id = $qry['id'];
			$user_ids = $qry['user_ids'];

		}
		$data .= ", convo_id = '$convo_id' ";
		$save = mysqli_query($conn,"INSERT INTO `messages` (`convo_id`, `user_id`, `message`, `status`) values ('".$convo_id."','".$user_id."','".$message."',0)");
	}

$login_id = $_SESSION['login_id'];
$function_call = send_chat($message,$user_id,$login_id,$conn);



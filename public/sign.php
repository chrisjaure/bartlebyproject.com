<?php

$db = new PDO('sqlite:../db/bartleby.sqlite3');

$response = array();

$email = $_POST['email'];

if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
	$ip = sprintf("%u", ip2long($_SERVER['REMOTE_ADDR']));
	$id = md5($email);
	$time = date('M-d-y H:i:s');
	
	$stmt = $db->prepare("SELECT timestamp FROM sigs WHERE longip=:ip ORDER BY timestamp DESC LIMIT 1");
	$stmt->bindValue(':ip', $ip);
	$stmt->execute();
	$last_time = $stmt->fetchColumn();

	if ($last_time && strtotime($time) - strtotime($last_time) < 60) {
		$response['error'] = "Please wait a bit before signing up again.";
	}
	else
	{
		$stmt = $db->prepare("SELECT COUNT(id) FROM sigs WHERE id=:id");
		$stmt->bindValue(':id', $id);
		$stmt->execute();
		$count = (int) $stmt->fetchColumn();
		if ($count > 0) {
			$response['error'] = "It looks like this email address has already been counted.";
		}
		else {
			$stmt = $db->prepare("INSERT INTO sigs (id,longip,timestamp) VALUES (:id,:ip,:time)");
			$stmt->bindValue(':id', $id);
			$stmt->bindValue(':ip', $ip);
			$stmt->bindValue(':time', $time);
			$stmt->execute();
		}
	}
}
else {
	$response['error'] = "Please enter a valid email address. We promise it won't be used for evil :)";
}

echo json_encode($response);

?>

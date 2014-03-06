<?php
	session_start();
	include 'config.php';
	$id = '1610';
	$sec = "w5LQYUCmn3nHUayPezHdb92zstMhjQbG";
	$query = $_GET['code'];
	$url = "https://api.venmo.com/v1/oauth/access_token";

	$fields = array(
		'client_id' => urlencode($id),
		'client_secret' => urlencode($sec),
		'code' => urlencode($query)
	);

	//url-ify the data for the POST
	foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
	rtrim($fields_string, '&');

	//open connection
	$ch = curl_init();

	//set the url, number of POST vars, POST data, and return
	curl_setopt($ch,CURLOPT_URL, $url);
	curl_setopt($ch,CURLOPT_POST, count($fields));
	curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	//execute post
	$result = curl_exec($ch);

	//close connection
	curl_close($ch);

	$result = json_decode($result, true);
	$first = $result['user']['first_name'];
	$last = $result['user']['last_name'];
	$auth = $result['access_token'];
	$id = $result['user']['id'];
	$pic = $result['user']['profile_picture_url'];

	$_SESSION["id"] = $id;

	$mysqli = new mysqli("$dbHost", "$dbUsername", "$dbPass", "$dbName");

	$exists = $mysqli->query("SELECT first, last, id, pic FROM user WHERE id = '$id'");
	$user = $exists->fetch_array(MYSQLI_ASSOC);

	$group = $mysqli->query("SELECT gid FROM link WHERE uid = '$id'");
	$ingroup = $group->fetch_array(MYSQLI_ASSOC);

	if($mysqli->connect_errno)
	{
		echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		return;
	}
	else
	{
		if (sizeof($user) < 4)
		{
			$temp = $mysqli->query("INSERT INTO user (first, last, auth, id, pic) VALUES ('$first', '$last', '$auth', '$id', '$pic')");
			// echo "Success!";
			// redirect to add group join group
			header('Location: groups.php');
		}
		// redirect to main app page
		if (sizeof($ingroup) < 1) 
		{
			header('Location: groups.php');
		}
		else
		{
			$_SESSION["gid"] = $ingroup['gid'];
			header('Location: list.php');
		}
	}
?>



<?php
	require_once __DIR__ . "/db.php";

	$inData = getRequestInfo();
	
	$color = $inData["color"];
	$userId = $inData["userId"];

	$stmt = $conn->prepare("INSERT into Colors (UserId,Name) VALUES(?,?)");
	$stmt->bind_param("ss", $userId, $color);
	$stmt->execute();
	$stmt->close();
	$conn->close();

	function getRequestInfo()
	{
		return json_decode(file_get_contents('php://input'), true);
	}

	function sendResultInfoAsJson( $obj )
	{
		header('Content-type: application/json');
		echo $obj;
	}
?>

<?php

	if(isset($_GET['img'])){
		require "../php/connectToDb.php";

		$id = $_GET['img'];

		$sql = 'SELECT * FROM qrent.ItemImage WHERE itemimageid = ?';

		$stmt = $conn->prepare($sql);
		$stmt->bind_param("d",$id);
		$stmt->execute();

		$res = $stmt->get_result()->fetch_assoc();

		echo $res['imageName'];

	}

?>
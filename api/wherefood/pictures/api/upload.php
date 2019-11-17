<?php
    $target_dir = "../";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $file_save = "pictures/api/" . basename($_FILES["file"]["name"]);
    $response = array('success' => false, 'message' => 'FALSE');

    $data = $_POST['sender_information'];
    $json_data = json_decode($data , true);
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file))
        $response = array('success' => true, 'message' => 'OK');

    $data = $_POST['sender_information'];
    $json_data = json_decode($data , true);
    $sender_name = $json_data['token'];

	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'zulhrqeb_wherefood');
	define('DB_PASSWORD', 'admin123');
	define('DB_NAME', 'zulhrqeb_wherefood');
 
	/* Attempt to connect to MySQL database */
	$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
	// Check connection
	if($conn === false){
    die("ERROR: Could not connect. " . $conn->connect_error );
    }else
        {
    $sql = "INSERT INTO `permalink_picture` (`FCP_ID`, `Token`, `PicturePermalink`) VALUES (NULL, '$sender_name', '$file_save')";
    $run = $conn->query($sql);
    }

    echo json_encode($response);
?>
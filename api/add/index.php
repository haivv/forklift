<?php
$conn = mysqli_connect( 'localhost', 'root', '', 'forklift' );
mysqli_set_charset( $conn, 'utf8' );

$username = $_POST['username'];
$password = $_POST['password'];
$name = $_POST['name'];
$job = $_POST['job'];



$result1 = mysqli_query($conn, "SELECT * FROM account WHERE username = '$username'");
$num1 = mysqli_num_rows( $result1 );
if ($num1 > 0) {
	 $dataToSave = [
            'message' => 'exist'
            
        ];

        $jsonString = json_encode( $dataToSave, JSON_PRETTY_PRINT );
        // You can use JSON_PRETTY_PRINT for pretty formatting

        // Specify the path to the JSON file
        $jsonFilePath = 'data.json';
        // Save the JSON string to the file
        if ( file_put_contents( $jsonFilePath, $jsonString ) ) {
            echo 'username: exist';
        } else {
            echo 'user exist';
        }
}
else{
	$result = mysqli_query($conn, "SELECT * FROM account ORDER BY idAcc DESC LIMIT 1");
	$num = mysqli_num_rows( $result );
	if ($num > 0) {
    while($row = mysqli_fetch_assoc($result)) {
		$idAcc = $row["idAcc"] + 1;
		mysqli_query($conn, "INSERT INTO account (idAcc, username, password, name, job) VALUES ('$idAcc', '$username','$password', '$name', '$job')");
		$dataToSave = [
            'message' => 'added'
        ];

        $jsonString = json_encode( $dataToSave, JSON_PRETTY_PRINT );
        // You can use JSON_PRETTY_PRINT for pretty formatting

        // Specify the path to the JSON file
        $jsonFilePath = 'data.json';
        // Save the JSON string to the file
        if ( file_put_contents( $jsonFilePath, $jsonString ) ) {
            echo 'username: added';
        } else {
            echo 'user added';
        }
  }
}
else{ //empty
    $idAcc = 1;
    mysqli_query($conn, "INSERT INTO account (idAcc, username, password, name, job) VALUES ('$idAcc', '$username','$password', '$name', '$job')");
    $dataToSave = [
        'message' => 'added'
    ];

    $jsonString = json_encode( $dataToSave, JSON_PRETTY_PRINT );
    // You can use JSON_PRETTY_PRINT for pretty formatting

    // Specify the path to the JSON file
    $jsonFilePath = 'data.json';
    // Save the JSON string to the file
    if ( file_put_contents( $jsonFilePath, $jsonString ) ) {
        echo 'username: added';
    } else {
        echo 'user added';
    }
} 
	
	
}


mysqli_close( $conn );

?>


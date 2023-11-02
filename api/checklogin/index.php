<?php
$conn = mysqli_connect( 'localhost', 'root', '', 'forklift' );
mysqli_set_charset( $conn, 'utf8' );

$username = $_POST[ 'username' ];
$password = $_POST[ 'password' ];


$result = mysqli_query( $conn, "SELECT * FROM  account WHERE username='$username'" );
$num = mysqli_num_rows( $result );
if ( $num > 0 ) {
    $result2 = mysqli_query( $conn, "SELECT * FROM  account WHERE username='$username' and password='$password'" );
    $num2 = mysqli_num_rows( $result2 );
    if ( $num2 == 0 ) {
        $dataToSave = [
            'username' => 'exist',
            'login' => 'fail',
        ];

        $jsonString = json_encode( $dataToSave, JSON_PRETTY_PRINT );
        // You can use JSON_PRETTY_PRINT for pretty formatting

        // Specify the path to the JSON file
        $jsonFilePath = 'data.json';
        // Save the JSON string to the file
        if ( file_put_contents( $jsonFilePath, $jsonString ) ) {
            echo 'username: exist, login:fail';
        } else {
            echo 'user exist, login fail';
        }
        
            $dataToSave2 = [
                'idAcc' => "",
                'username' => "",
                'password' => "",
                'name' => "",
                'job' =>""
            ];

            $jsonString2 = json_encode( $dataToSave2, JSON_PRETTY_PRINT );
            // You can use JSON_PRETTY_PRINT for pretty formatting
    
            // Specify the path to the JSON file
            $jsonFilePath2 = 'oneinfor.json';
            // Save the JSON string to the file
            if ( file_put_contents( $jsonFilePath2, $jsonString2 ) ) {
                echo 'save to one info success';
            }


       

    } else {
        $dataToSave = [
            'username' => 'exist',
            'login' => 'success',
        ];

        $jsonString = json_encode( $dataToSave, JSON_PRETTY_PRINT );
        // You can use JSON_PRETTY_PRINT for pretty formatting

        // Specify the path to the JSON file
        $jsonFilePath = 'data.json';
        // Save the JSON string to the file
        if ( file_put_contents( $jsonFilePath, $jsonString ) ) {
            echo 'username: exist, login: success';
        } else {
            echo 'user exist, login success';
        }

        while ($onerow = mysqli_fetch_assoc($result2)) {
            $dataToSave2 = [
                'idAcc' => $onerow["idAcc"],
                'username' => $onerow["username"],
                'password' => $onerow["password"],
                'name' => $onerow["name"],
                'job' => $onerow["job"]
            ];

            $jsonString2 = json_encode( $dataToSave2, JSON_PRETTY_PRINT );
            // You can use JSON_PRETTY_PRINT for pretty formatting
    
            // Specify the path to the JSON file
            $jsonFilePath2 = 'oneinfor.json';
            // Save the JSON string to the file
            if ( file_put_contents( $jsonFilePath2, $jsonString2 ) ) {
                echo 'save to one info success';
            }
        }

    }
} else {
    $dataToSave = [
        'username' => 'not exist',

    ];

    $jsonString = json_encode( $dataToSave, JSON_PRETTY_PRINT );
    // You can use JSON_PRETTY_PRINT for pretty formatting

    // Specify the path to the JSON file
    $jsonFilePath = 'data.json';
    // Save the JSON string to the file
    if ( file_put_contents( $jsonFilePath, $jsonString ) ) {
        echo 'user: not exist';
    }

    
        $dataToSave2 = [
            'idAcc' => "",
            'username' => "",
            'password' => "",
            'name' => "",
            'job' =>""
        ];

        $jsonString2 = json_encode( $dataToSave2, JSON_PRETTY_PRINT );
        // You can use JSON_PRETTY_PRINT for pretty formatting

        // Specify the path to the JSON file
        $jsonFilePath2 = 'oneinfor.json';
        // Save the JSON string to the file
        if ( file_put_contents( $jsonFilePath2, $jsonString2 ) ) {
            echo 'save to one info success';
        }

}

mysqli_close( $conn );

?>

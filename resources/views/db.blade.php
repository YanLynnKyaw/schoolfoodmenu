<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Base</title>
</head>
<body>
    
    <h1>Details</h1>

    <p>

        <?php 

             define('DB_SERVER','localhost');
             define('DB_USERNAME', 'gg');
             define('DB_PASSWORD', '2122');
             define('DB_NAME','laravel');
         
             $connection = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);
        
            // require_once 'config.php';

            $sql = "select email from users";

            $result = $connection ->query ($sql);
            if($result->num_rows >0){
                while ($row = $result -> fetch_assoc()){
                    echo "<span>" .$row['email']. "</span><br>";
                
                }
            } else{
                echo "0 result";
            }

            $sql = "select name from users";

            $result = $connection ->query ($sql);
            if($result->num_rows >0){
                while ($row = $result -> fetch_assoc()){
                    echo "<span>" .$row['name']. "</span><br>";
                
                }
            } else{
                echo "0 result";
            }
        
        ?>

    </p>


</body>
</html>
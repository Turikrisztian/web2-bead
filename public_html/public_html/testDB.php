testDB.php
<?php
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=adatb2', 'adatb2','Turikrisztian1',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        $statement = "Select name, age From users Where age<35";
        $result = $pdo->query($statement);
        foreach ($result as $row)
        	print $row['name'] . " " .$row['age'] . "<br>";
    }
    catch (PDOException $e) {
        echo "Error: ".$e->getMessage();
    }
?>

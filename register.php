<?php
try {
    // open connection to MongoDB server
    $conn = new Mongo('localhost');

    // access database
    $db = $conn->mydb;

    $col = $db->createCollection("users");
    $collection =$db->selectCollection("users");
    $persoana = array('nume' => $_POST['name'],
                      'email' => $_POST['email']);
    $result = $collection->insert($persoana);

    $om = $collection->find();
    foreach ($om as $obj) {
        echo 'Nameul: ' . $obj['nume'] . '<br/>';
        echo 'Mailul: ' . $obj['email'] . '<br/>';
        echo '<br/>';
    }

     $conn->close();
} catch (MongoConnectionException $e) {
    die('Error connecting to MongoDB server');
} catch (MongoException $e) {
    die('Error: ' . $e->getMessage());
}

?>
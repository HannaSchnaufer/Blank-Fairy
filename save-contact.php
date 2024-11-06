<?php
    $body = file_get_contents('php://input');
    $request = json_decode($body, true);

    $pdo = new PDO('mysql:host=localhost;dbname=wumbo', 'root', ''); // Ganti username dan password sesuai kebutuhan
    $query = $pdo->prepare("INSERT INTO grossdeutschland(nama, mail, subjek, message) VALUES(:nama, :mail, :subjek, :message)");
    $query->bindValue(':nama', $request['nama'], PDO::PARAM_STR);
    $query->bindValue(':mail', $request['mail'], PDO::PARAM_STR);
    $query->bindValue(':subjek', $request['subjek'], PDO::PARAM_STR);
    $query->bindValue(':message', $request['message'], PDO::PARAM_STR);

    $result = $query->execute();
    $id = $pdo->lastInsertId();
    
    if ($result) {
        $query = $pdo->prepare("select * from grossdeutschland where id = :id");
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        $students = $query->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($students);
    }
    // header('Location: http://sunupf.test/success.php');
?>
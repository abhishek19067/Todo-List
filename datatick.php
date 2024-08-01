<?php
    session_start();

    $dsn = 'mysql:host=localhost;dbname=todo_list';
    $username = 'root';
    $password = '';
    try {
        $conn = new PDO($dsn, $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
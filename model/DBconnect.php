<?php
    function connect()
    {

        $conn = new mysqli("remotemysql.com", "2gRx0RVjVI", "iqQ6PDjhKM", "2gRx0RVjVI");
        if ($conn->connect_errno) {
            die("Database connection failed......" . $conn->connect_error);
        }
        return $conn;
    }
?>
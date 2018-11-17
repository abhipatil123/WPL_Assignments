<?php

if ($_SERVER['REQUEST_METHOD'] != "GET"){
    http_response_code(405);
    exit();
}

$con = mysqli_connect('localhost','root','root','pw7');
if (!$con) {
    http_response_code(500);
    die('Could not connect: ' . mysqli_error($con));
}

if ($_SERVER['REQUEST_URI'] == "/books" || $_SERVER['REQUEST_URI'] == "/books/"){

    $sql="SELECT book_id, title, price, category from Book";
    $result = mysqli_query($con,$sql);

    $arr = array();
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        array_push($arr, $row);
    }

    mysqli_close($con);
    header('Content-Type: application/json');
    http_response_code(200);
    echo json_encode(array_values($arr));
    exit();
}

else if (dirname($_SERVER['REQUEST_URI']) == "/books"){
    
    $id = basename($_SERVER['REQUEST_URI']);
    
    $sql="SELECT * from Book where Book_id=" . $id;
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if ($row == null){
        http_response_code(404);
        exit();
    }
    
    $sql2="SELECT authors.author_id, authors.author_name from authors join book_authors on authors.author_id = book_authors.Author_id where Book_id=" . $id;
    $result2 = mysqli_query($con,$sql2);

    $arr = array();
    while($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
        array_push($arr, $row2);
    }
    
    $row['authors'] = $arr;
    header('Content-Type: application/json');
    http_response_code(200);
    echo json_encode($row);
    
    mysqli_close($con);
    exit();
}
else{
    http_response_code(404);
    exit();
}
?>
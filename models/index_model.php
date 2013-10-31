<?php
$data['title']= 'Списък';
if (isset($_GET['author_id'])) {
    $data['author_id'] = (int) $_GET['author_id'];
    $q = mysqli_query($db, 'SELECT * FROM authors as a LEFT JOIN 
    books_authors as ba ON a.author_id=ba.author_id LEFT JOIN books as b
     ON b.book_id=ba.book_id WHERE a.author_id='.$author_id);
} else {
    $q = mysqli_query($db, 'SELECT * FROM books as b INNER JOIN 
    books_authors as ba ON b.book_id=ba.book_id INNER JOIN authors as a
     ON a.author_id=ba.author_id');
}


$data['result'] = [];
while ($row = mysqli_fetch_assoc($q)) {
//    echo '<pre>'.print_r($row, true).'</pre>';
    $data['result'][$row['book_id']]['book_title'] = $row['book_title'];
    $data['result'][$row['book_id']]['authors'][$row['author_id']] = $row['author_name'];
}
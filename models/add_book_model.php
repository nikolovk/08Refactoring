<?php

$data['title'] = 'Нова книга';
$data['errors'] = [];
$data['authors'] = getAuthors($db);
if ($data['authors'] === false) {
    $data['fatal_error'] = 'грешка';
}

if ($_POST && !isset($data['fatal_error'])) {

    $book_name = trim($_POST['book_name']);
    if (!isset($_POST['authors'])) {
        $_POST['authors'] = '';
    }
    $authors = $_POST['authors'];
    if (mb_strlen($book_name,'utf-8') < 2) {
        $data['errors'][] = '<p>Невалидно име</p>';
    }
    if (!is_array($authors) || count($authors) == 0) {
        $data['errors'][] = '<p>Не сте избрали автор</p>';
    }
    if (!isAuthorIdExists($db, $authors)) {
        $data['errors'][] = 'невалиден автор';
    }

    if (count($data['errors']) === 0) {
        mysqli_query($db, 'INSERT INTO books (book_title) VALUES("' .
                mysqli_real_escape_string($db, $book_name) . '")');
        if (mysqli_error($db)) {
            $data['fatal_error'] = 'Error';
        } else {
            $id = mysqli_insert_id($db);
            foreach ($authors as $authorId) {
                mysqli_query($db, 'INSERT INTO books_authors (book_id,author_id)
                VALUES (' . $id . ',' . $authorId . ')');
                if (mysqli_error($db)) {
                    $data['fatal_error'] = 'Error<br />';
                    $data['fatal_error'] .= mysqli_error($db);
                }
            }
            $data['success'] = 'Книгата е добавена';
        }
    }
}
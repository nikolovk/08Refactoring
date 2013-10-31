<?php

$data['title'] = 'Автори';
$data['authors'] = [];
if ($_POST) {
    $author_name = trim($_POST['author_name']);
    if (mb_strlen($author_name,'utf-8') < 2) {
        $data['error'] = '<p>Невалидно име</p>';
    } else {
        $author_esc = mysqli_real_escape_string($db, $author_name);
        $q = mysqli_query($db, 'SELECT * FROM authors WHERE
                                 author_name="' . $author_esc . '"');
        if (mysqli_error($db)) {
            $data['fatal_error'] = 'Грешка';
        } else {

            if (mysqli_num_rows($q) > 0) {
                $data['error'] = 'Има такъв автор';
            } else {
                mysqli_query($db, 'INSERT INTO authors (author_name)
                           VALUES("' . $author_esc . '")');
                if (mysqli_error($db)) {
                    $data['fatal_error'] = 'Грешка';
                } else {
                    $data['success'] = 'Книгата е добавена';
                }
            }
        }
    }
}
if (!isset($data['fatal_error'])) {
    $data['authors'] = getAuthors($db);
    if ($data['authors'] === false) {
        $data['fatal_error'] = 'Грешка';
    }
}
?>
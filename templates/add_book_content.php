<?php

if (isset($data['fatal_error'])) {
    echo '<p>' . $data['fatal_error'] . '</p>';
    exit;
}

foreach ($data['errors'] as $v) {
    echo '<p>' . $v . '</p>';
}


if (isset($data['success'])) {
    echo '<p>' . $data['success'] . '</p>';
}
?>
<form method="post" action="index.php?p=add_book">
    Име: <input type="text" name="book_name" />
    <div>Автори:<select name="authors[]" multiple style="width: 200px">
            <?php
            foreach ($data['authors'] as $row) {
                echo '<option value="' . $row['author_id'] . '">
                    ' . $row['author_name'] . '</option>';
            }
            ?>

        </select></div>
    <input type="submit" value="Добави" />    

</form>
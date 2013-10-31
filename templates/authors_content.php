<?php

if (isset($data['fatal_error'])) {
    echo '<p>' . $data['fatal_error'] . '</p>';
    exit;
}

if (isset($data['error'])) {
    echo '<p>' . $data['error'] . '</p>';
}


if (isset($data['success'])) {
    echo '<p>' . $data['success'] . '</p>';
}
?>
<form method="post" action="index.php?p=authors">
    Име: <input type="text" name="author_name" />
    <input type="submit" value="Добави" />    
</form>

<table border='1'>
    <tr><th>Автор</th></tr>

    <?php
    foreach ($data['authors'] as $row) {
        echo '<tr><td>' . $row['author_name'] . '</td></tr>';
    }
    ?>


</table>



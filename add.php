<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>добавление элемента</title>
    <style>
        .root {
        }

        .shift .shift{
            margin-left: 2rem;
            color: grey;
        }
    </style>
</head>
<body>
<h3>добавление элемента</h3>

<form method="post" action="index.php">
    <input type="text" name="new_element" required>
    <input type="hidden" name="id_parent" value="<?=$_GET['id']?>">
    <a href="index.php"><button type="button">Отмена</button></a>
    <input type="submit" value="добавить">
</form>

</body>
</html>

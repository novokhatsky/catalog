<?php

require_once 'config.php';
require_once 'dbconnect.php';
require_once 'catalog.php';

$db = new DbConnect(DB);
$catalog = new Catalog($db);

function getLevel($catalog, $num_level)
{
    $list_level = $catalog->getList($num_level);

    foreach ($list_level as $row) {
        ?>
            <div class="shift">
                <span><?=$row['name']?></span>
                &nbsp;&nbsp;
                <a href="add.php?id=<?=$row['id']?>">+</a>
                <?php getLevel($catalog, $row['id']); ?>
            </div>
        <?php
    }
}

if (isset($_POST['new_element'])) {
    $id_parent = filter_input(
                                INPUT_POST,
                                'id_parent',
                                FILTER_VALIDATE_INT,
                                ['options' => ['default' => -1, 'min_range' => 0]]
    );

    $new_name = htmlspecialchars($_POST['new_element']);

    $catalog->add($id_parent, $new_name);
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Каталог</title>
    <style>
        .shift .shift{
            margin-left: 2rem;
            color: grey;
        }
        
        span {
            cursor: pointer;
        }
    </style>
</head>
<body>
<h3>Каталог</h3>

<a href="add.php?id=0">+</a>

<div>
    <?php
        getLevel($catalog, 0);
    ?>
</div>

<script>

    const items = document.querySelectorAll('span');

    for (let item of items) {
        item.addEventListener('click', function () {
            const parent = item.closest('.shift');
            let nodes = parent.querySelectorAll('.shift');

            for (let node of nodes) {
                node.style.display = (node.style.display == 'none') ? 'block' : 'none';
            }
        });
    }

</script>
    
</body>
</html>

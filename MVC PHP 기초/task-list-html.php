<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
</head>

<body>
    <?php if (($tasks)) : ?>
        <ul>
            <?php foreach ($tasks as $task) : ?>
                <li><?= $task['name'] ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else : ?>
        <p>할 일이 없습니다.</p>
    <?php endif; ?>
</body>

</html>
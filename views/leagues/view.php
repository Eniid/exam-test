<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site chiant : Les ligues </title>
</head>
<body>
<div>
    <a href="index.php">Premier League 2020</a>
    <a href="index.php?action=view&resource=league">Importer des équipes</a>
    </div>
    <?php if(isset($_SESSION['user'])): ?>
    <?php include('./views/partials/navigation.php'); ?>
    <?php else: ?>
    <?php include('./views/partials/admin-links.php'); ?>
    <?php endif; ?>

    <h1>Les ligues</h1>
    <?php foreach($leagues as $key => $league): ?>
        <div>
            <a href="index.php?action=view&resource=team&leagueid=<?php echo $league ?>"><?php echo $key ?></a>
        </div>
    <?php endforeach; ?> 

</body>
</html>
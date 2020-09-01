<?php 
    $leagueName = array_key_first($teams); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site chiant : Les teams </title>
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



    <h1>Les teams de <?php echo $leagueName ?></h1>


    <?php foreach($teams[$leagueName] as $key => $team): ?> 
        <form action="index.php" method="post">
            <input type="submit" name="name" value="<?php echo $team['fullname']; ?>" >
            <input type="hidden" name="logo" value="<?php echo $team['filepath']; ?>" >
            <input type="hidden" name="slug" value="<?php echo $key; ?>" >
            <input type="hidden" name="from" value="api" >
            <input type="hidden" name="action" value="store" >
            <input type="hidden" name="resource" value="team" >



        </form>

    <?php endforeach; ?>



</body>
</html>
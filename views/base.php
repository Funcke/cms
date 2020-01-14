<!-- Basic page template! Please modify but do not delete! -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $params["title"]; ?></title>
</head>
<body>
    <?php if(array_key_exists('loggedin', $request->session)): ?>
        <?php include('views/:logedin_nav.php'); ?>
    <?php else: ?>
        <?php include('views/:guest_nav.php'); ?>
    <?php endif; ?>
    <?php include("views/".$name.".php"); ?>
</body>
</html>

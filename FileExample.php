<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container mx-auto">
        <form method="POST" action="fileWrite.php">
            <div class="form-group">
                <label for="login">Login</label>
                <input type="text" class="form-control" name="login">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email">
            </div>
            <input type="submit" name="accept" value="Create" class="btn btn-dark">
        </form>
        <form method="POST">
            <input type="submit" name="show" value="Show accounts" class="btn btn-dark">
        </form>
    </div>
    <ul class="list-group">
        <?php
        if (isset($_POST["show"])) {
            $accountsStr = mb_substr(htmlentities(file_get_contents("accounts.txt")), 0, -1);
            $accounts = explode("|", $accountsStr);
            foreach ($accounts as $value) {
                $logEmail = explode("&", $value);
                echo "<li class='list-group-item'>Login: " . $logEmail[0] . ",  Email: " . str_replace("amp;", "", $logEmail[1]) . "<li>";
            }
        }

        ?>
    </ul>

</body>

</html>
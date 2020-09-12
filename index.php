<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<!--<script>-->
<!--    function sayHi() {-->
<!--            window.open("dinner.html");-->
<!--    }-->
<!---->
<!--    setTimeout(sayHi, 10000);-->
<!--</script>-->

<?php
$host = '127.0.0.1';
$db = 'test';
$user = 'root';
$pass = 'root';
$charset = 'utf8';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$pdo = new PDO($dsn, $user, $pass);


$statment = $pdo->prepare("SELECT * FROM dinner");
$statment->execute();
$result = $statment->fetchAll(PDO::FETCH_ASSOC);


?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Hello</h1>
            <a href="create.php" class="btn btn-success">Add task</a>
            <table class="table">
                <thead>
                <tr>
                    <th>
                        Id
                    </th>
                    <th>
                        Task
                    </th>
                    <th>
                        Title
                    </th>
                    <th>
                        Actions
                    </th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($result as $task): ?>
                    <? $js = $task['dTime']; ?>
                    <tr>
                        <td>
                            <?= $task['id'] ?>
                        </td>
                        <td>
                            <?= $task['name'] ?>
                        </td>
                        <td>
                            <?= $task['dTime'] ?>
                        </td>
                        <td>
                            <a href="#" class="btn btn-warning">Edit</a>
                            <a href="#" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    function sayHi() {
        window.open("dinner.html");
    }

    var js = '<?php echo $js;?>';

    function sec() {
        x = new Date().toTimeString().replace(/ .*/, '');
        if (js === x) {
            sayHi();
        }
    }

    setInterval(sec, 1000)


</script>
</body>
</html>
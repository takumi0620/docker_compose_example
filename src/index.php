<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
    <div class="container">
        <h1 class="title">nginx + PHP + MySQL</h1>

        <?php
        echo '<p>DATABASE_HOST='. $_ENV['DATABASE_HOST']. '</p>';
        echo '<p>MYSQL_USER='. $_ENV['PHP_MYSQL_USER']. '</p>';
	echo '<p>MYSQL_PASSWORD='. $_ENV['PHP_MYSQL_PASSWORD']. '</p>';
	echo '<p>MYSQL_DATABASE='. $_ENV['MYSQL_DATABASE']. '</p>';
        $mysql = new mysqli($_ENV['DATABASE_HOST'], $_ENV['PHP_MYSQL_USER'], $_ENV['PHP_MYSQL_PASSWORD'], $_ENV['MYSQL_DATABASE']);
        if (!$mysql) {
            echo "Error: Unable to connect to MySQL." . PHP_EOL;
            echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
            exit;
        }
        $sql = "INSERT INTO hoges(created_at) VALUES('" . date('Y-m-d H:i:s') . "')";
        $result = $mysql->query($sql);
        $sql = "SELECT * FROM hoges ORDER BY hoge_id desc limit 1";
        $result = $mysql->query($sql)->fetch_row();
        echo '<pre class="log">';
        var_dump($result);
        echo '</pre>';
        mysqli_close($mysql);
        phpinfo();
        ?>
    </div>
</body>
</html>

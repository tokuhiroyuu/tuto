<?php
$host = "INPUT_HOST";
$user = "INPUT_USER";
$pass = "INPUT_PASSWORD";
$db = "INPUT_DB";

class foo_mysqli extends mysqli {
    public function __construct($host, $user, $pass, $db) {
        parent::__construct($host, $user, $pass, $db);

        if (mysqli_connect_error()) {
            die('Connect Error (' . mysqli_connect_errno() . ') '
                    . mysqli_connect_error());
        }
    }
}

// show input value 

echo "<h3>Input Value</h3>" . "<br />";
echo "<b>name:</b> " . $_POST["name"] . " " . "<br />";
echo "<b>mail</b> " . htmlspecialchars($_POST["mail"]) . " " . "<br />";
echo "<b>birth:</b>" . htmlspecialchars($_POST["year"]) . "-" .  htmlspecialchars($_POST["month"]) . "-" .  htmlspecialchars($_POST["day"]) . "<br />";
echo "<b>tel:</b>" . htmlspecialchars($_POST["tel01"]) . "-" . htmlspecialchars($_POST["tel02"]) . "-" . htmlspecialchars($_POST["tel03"]) . "<br />";

// output by db

echo "<h3>DB Value</h3>";

$db = new foo_mysqli($host, $user, $pass, $db);

if ($result = $db->query("SELECT * FROM test LIMIT 10")) {

    while ($row = $result->fetch_object()){

        echo "<b>name:</b> " . $row->name . " ";
        echo "<b>mail:</b>" . $row->mail . " ";
        echo "<b>birth:</b>" . $row->birth . " ";
        echo "<b>tel:</b>" . $row->tel01 . "-" . $row->tel02 . "-" . $row->tel03 . "<br />";
    }
    $result->close();
}

$db->close();





?>

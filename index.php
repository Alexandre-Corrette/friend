<?php 

require_once 'connec.php';
$pdo = new \PDO(DSN,USER,PASS);
if ($_SERVER['METHOD_REQUEST'] === 'POST') 
{
    $query = "INSERT INTO friend (firstname, lastname) VALUES(:firstname, :lastname)";

    $statement = $pdo->prepare($query);

    $statement->bindValue(':firstname',$_POST['firstname'], PDO::PARAM_STR);
    $statement->bindValue(':firstname',$_POST['firstname'], PDO::PARAM_STR);

    $statement->execute();
    header('location:/index.php');
}


$query = "SELECT * FROM friend";
$statement = $pdo->query($query);
$friends = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach($friends as $friend) {
    echo $friend['id'] .' '. $friend['firstname'] . ' ' . $friend['lastname'] . ' <br>';

}
?>
<form action="" method="post">
    <div>
        <label for="firstname">First Name</label>
        <input type="text" id="firstname" name="firstname" required>
    </div>
    <div>
        <label for="lastname">Last Name</label>
        <input type="text" id="lastname" name="lastname" required>
    </div>
    <button type='submit'>submit</button>
</form>

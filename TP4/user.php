<?php
require_once('config.php');
require_once('dbinit.php');
$connectionString = "mysql:host=". _MYSQL_HOST;
if(defined('_MYSQL_PORT'))
$connectionString .= ";port=". _MYSQL_PORT;
$connectionString .= ";dbname=" . _MYSQL_DBNAME;
$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8' );
try {
$pdo = new PDO($connectionString,_MYSQL_USER,_MYSQL_PASSWORD,$options);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $erreur) {
//myLog('Erreur : '.$erreur->getMessage());
}

$request = $pdo->prepare("select * from users");
$request->execute();
$users = $request->fetchAll();
?>
<table>
  <tr>
    <th>ID</th>
    <th>Nom</th>
    <th>Mail</th>
  </tr>
<?php

foreach($users as $user){
    echo '<tr>';
    echo"<td> {$user['id']} </td>";
    echo"<td> {$user['name']} </td>";
    echo"<td> {$user['email']} </td>";
    echo '</tr>';
}
$pdo = null;
?>
 <form action="insert.php" method="post">
             
             <p>
                            <label for="name">NOM:</label>
                            <input type="text" name="name" id="name">
                         </p>
              
                          
             <p>
                            <label for="email">Email:</label>
                            <input type="text" name="email" id="email">
                         </p>
              
                          
            
                         <input type="submit" value="Submit">
                      </form>
</table>
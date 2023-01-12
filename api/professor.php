<?php

$server = 'localhost';
$username = 'root';
$password = '';
$database = 'unisys';

$connection = new mysqli($server, $username, $password, $database);

if($connection->connect_error)
    die("connection failed" . $connection->connect_error);

$query = '';
if($_POST['type'] == 1)
    $query .= "select p.id, p.`professorCode`, p.name, p.`type`, g.`Name` as groupName from professor p INNER JOIN groups g on g.`Id` = p.`group_Id` WHERE (p.name like '%".$_POST['name']."%' or p.`professorCode` = ".$_POST['code'].")";
else if($_POST['type'] == 2)
    $query .= "select distinct p.id as id, p.`professorCode` as professorCode, p.name as professorName, c.name as courseName, t.description as termName from professor p INNER JOIN term_course tc on tc.professor_id = p.id INNER JOIN course c on c.id = tc.course_id INNER JOIN term t on t.id = tc.term_id WHERE (p.name like '%".$_POST['name']."%' or p.`professorCode` = ".$_POST['code'].")";
else if($_POST['type'] == 3)
    $query .= "select p.id, p.`professorCode`, p.name, p.`type`, g.`Name` as groupName from professor p INNER JOIN groups g on g.`Id` = p.`group_Id`";
$result = $connection->query($query);

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $rows[] = $row;
    }

    print json_encode($rows);
}else{
    print json_encode([]);
}
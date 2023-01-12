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
    $query .= "select s.id, s.`studentCode`, s.name from student s WHERE (s.name like '%".$_POST['name']."%' or s.`studentCode` = ".$_POST['code'].")";
else if($_POST['type'] == 2)
    $query .= "select distinct s.id as id, s.`studentCode` as studentCode, s.name as studentName, c.name as courseName, t.description as termName from student s INNER JOIN term_course tc on tc.student_id = s.id INNER JOIN course c on c.id = tc.course_id INNER JOIN term t on t.id = tc.term_id WHERE (s.name like '%".$_POST['name']."%' or s.`studentCode` = ".$_POST['code'].")";
else if($_POST['type'] == 3)
    $query .= "select s.id, s.`studentCode`, s.name from student s";
$result = $connection->query($query);

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $rows[] = $row;
    }

    print json_encode($rows);
}else{
    print json_encode([]);
}
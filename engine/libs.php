<?php
function CheckSQL($conn,$sql) // Функция проверки запроса в базе
{
    $result = $conn->query($sql);
    $row = $result->fetch_row();
    return (bool)$row;
}
function get_count_SQL($conn,$sql)
{
    $res = $conn->query($sql);
    $row = $res->fetch_row();
    return $row[0];
}

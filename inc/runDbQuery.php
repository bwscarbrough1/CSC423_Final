<?php
function runDbQuery($query)
{
    $conn = getConnection();

    $result = $conn->query($query);

    if(!$result)
    {
        echo "Error: Our query failed to execute and here is why: \n";
        echo "Query: " . $query . "\n";
        echo "Errno: " . $conn->errno . "\n";
        echo "Error: " . $conn->error . "\n";
        $conn->close();
        exit;
    }
    else
    {
        $conn->close();
        return $result;
    }


    // Always close the connection
    $conn->close();
}

function runDbInsertQuery($query)
{
    $conn = getConnection();

    $result = $conn->query($query);

    if(!$result)
    {
        echo "Error: Our query failed to execute and here is why: \n";
        echo "Query: " . $query . "\n";
        echo "Errno: " . $conn->errno . "\n";
        echo "Error: " . $conn->error . "\n";
        $conn->close();
        exit;
    }
    else
    {
        $last_id = $conn->insert_id;
        $conn->close();
        return $last_id;
    }
    // Always close the connection
    $conn->close();
}



function getConnection()
{
    $config = include('./inc/config.php');
    $conn = new mysqli($config['addr'], $config['user'], $config['pass'], $config['db']);
        if($conn->connect_errno){
        echo "Error: Failed to make a MySQL connection, here is why: \n";
        echo "Errno: " . $conn->connect_errno . "\n";
        echo "Error: " . $conn->connect_error . "\n";
        exit;
    }
    return $conn;
}
?>
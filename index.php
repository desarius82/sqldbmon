<?php
$serverName = "dbsrv";
// $connectionInfo = array("Database"=>"DB1");
$conn = sqlsrv_connect($serverName);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQLDB Monitoring Tool</title>
    <style>
        body {
            background-color: #121212; /* background color*/
            color: white; /* text color */
            font-family: Arial, sans-serif;
        }
        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            color: black; /* grid text color */
            font-size: 50px; /* grid text size */
            font-weight: bold
        }
        th, td {
            border: 1px solid #444;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #555;
        }
        .grid-red {
            background-color: #ED2B2A;
        }
        .grid-orange {
            background-color: #FF7D29;
        }
        .grid-green {
            background-color: #4E9F3D;
        }
        h1, h2, h3, h4, h5, h6 {
		display: inline;
	}
    </style>
</head>
<body>
<?php
if($conn === false) {
    die(print_r(sqlsrv_errors(), true));
} else {
    echo " <h1>🛢️ SQLDB Monitoring Tool</h1>";
	echo " <h6>(connection: ✅)</h6>";
	echo " <h1>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</h1>";
	echo " <h3>Last Refreshed Date: </h3>";
	date_default_timezone_set("Asia/Tbilisi");
	echo "<h1>" . date("d-m-Y H:i:s") . "</h1>";
	echo "<p>";
}

?>
</h6>
    <div class="grid-container">
<?php

header('Refresh: 15;');// page refresh every 15s

$queries = array(
    "Query 1" =>  "SELECT count(id) as count_id FROM DB1.dbo.sqltable WITH (NOLOCK) where id = 0",
    "Query 2" =>  "SELECT count(id) as count_id FROM DB1.dbo.sqltable WITH (NOLOCK) where id = 1",
    "Query 3" =>  "SELECT count(id) as count_id FROM DB1.dbo.sqltable WITH (NOLOCK) where id = 3",
    "Query 4" =>  "SELECT count(id) as count_id FROM DB1.dbo.sqltable WITH (NOLOCK) where id = 3",
    "Query 5" =>  "SELECT count(id) as count_id FROM DB1.dbo.sqltable WITH (NOLOCK) where id = 2",
    "Query 6" =>  "SELECT count(id) as count_id FROM DB1.dbo.sqltable WITH (NOLOCK) where id = 0",
    "Query 7" =>  "SELECT count(id) as count_id FROM DB1.dbo.sqltable WITH (NOLOCK) where id = 1",
    "Query 7" =>  "SELECT count(id) as count_id FROM DB1.dbo.sqltable WITH (NOLOCK) where id = 3",
    "Query 8" =>  "SELECT count(id) as count_id FROM DB1.dbo.sqltable WITH (NOLOCK) where id = 3",
    "Query 9" =>  "SELECT count(id) as count_id FROM DB1.dbo.sqltable WITH (NOLOCK) where id = 2",
    "Query 10" => "SELECT count(id) as count_id FROM DB1.dbo.sqltable WITH (NOLOCK) where id = 0",
    "Query 11" => "SELECT count(id) as count_id FROM DB1.dbo.sqltable WITH (NOLOCK) where id = 1",
    "Query 12" => "SELECT count(id) as count_id FROM DB1.dbo.sqltable WITH (NOLOCK) where id = 2",
    "Query 13" => "SELECT count(id) as count_id FROM DB1.dbo.sqltable WITH (NOLOCK) where id = 3",
    "Query 14" => "SELECT count(id) as count_id FROM DB1.dbo.sqltable WITH (NOLOCK) where id = 3",
    "Query 15" => "SELECT count(id) as count_id FROM DB1.dbo.sqltable WITH (NOLOCK) where id = 0"
);

foreach($queries as $name => $query) {
    echo "<div>";
    echo "<h2>$name</h2>";
    $result = sqlsrv_query($conn, $query);
    if($result === false) {
        die(print_r(sqlsrv_errors(), true));
    }
    
    // definition Grid color by alias
$grid_class = "grid-green"; // default class
    while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
        if (isset($row['count_id']) && $row['count_id'] > 0 && $row['count_id'] <= 2) {
            $grid_class = "grid-orange";
            break;
        } elseif (isset($row['count_id']) && $row['count_id'] > 2 && $row['count_id'] <= 3) {
            $grid_class = "grid-red";
            break;
        }
        if (isset($row['count_id']) && $row['count_id'] > 0 && $row['count_id'] <= 2) {
            $grid_class = "grid-orange";
            break;
        } elseif (isset($row['count_id']) && $row['count_id'] > 2 && $row['count_id'] < 3) {
            $grid_class = "grid-red";
            break;
        }
        if (isset($row['count_id']) && $row['count_id'] > 0 && $row['count_id'] <= 2) {
            $grid_class = "grid-orange";
            break;
        } elseif (isset($row['count_id']) && $row['count_id'] > 2 && $row['count_id'] < 3) {
            $grid_class = "grid-red";
            break;
        }
        if (isset($row['count_id']) && $row['count_id'] > 0 && $row['count_id'] <= 2) {
            $grid_class = "grid-orange";
            break;
        } elseif (isset($row['count_id']) && $row['count_id'] > 2 && $row['count_id'] < 3) {
            $grid_class = "grid-red";
            break;
        }
		if (isset($row['count_id']) && $row['count_id'] > 0 && $row['count_id'] <= 2) {
            $grid_class = "grid-orange";
            break;
        } elseif (isset($row['count_id']) && $row['count_id'] > 2 && $row['count_id'] < 3) {
            $grid_class = "grid-red";
            break;
        }
    }
    
    // reset result pointer for retreive data
    sqlsrv_free_stmt($result);
    $result = sqlsrv_query($conn, $query);

    // showing Сolumn and Header 
    /*$fields = sqlsrv_field_metadata($result);*/ //header variable
    echo "<table class='$grid_class'>";
    echo "<tr>";
    /*foreach($fields as $field) {echo "<th>{$field['Name']}</th>";}*/ //showing headers
    echo "</tr>";
    
    // receiving data
    while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
        echo "<tr>";
        foreach($row as $data) {
            echo "<td>$data</td>";
        }
        echo "</tr>";
    }
    echo "</table><br>";
    echo "</div>";
}
?>
</div>
<?php
	$start_time = microtime(true); 
	echo "<center><h6>Page generated: " . round(microtime(true) - $start_time, 1) . " sec.<h6></center>";
?>
    <center>
    <font color="#FFD800" font size = "1em">Created with ♥ by desarius82</font></b>
    </center>
</body>
</html>

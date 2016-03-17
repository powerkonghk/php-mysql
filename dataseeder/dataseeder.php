<?php
include('../db.php');
include('../vars.php');

global $mysqli;

// sql to create table
$sql = "DROP TABLE STOCK";
$result = $mysqli->query($sql);

$sql = "CREATE TABLE STOCK (ID BIGINT NOT NULL, DESCRIPTION VARCHAR(255), IMGSRC VARCHAR(255), PRICE INTEGER, QUAN INTEGER, TITLE VARCHAR(255), PRIMARY KEY (ID))";

$result = $mysqli->query($sql);

if ($result) {
    echo "Table STOCK created successfully. ";
} else {
    echo "Error creating table! ";
}

// Populate the table
$prints = array(
    array(1, "An advanced digital camera with interchangable lenses.",
     'camera01.jpg', 9000, 6, 'Digital Camera'),

    array(2, "This external HDD is compatible with USB 3.0 for fast transfers.",
     'hdd02.jpg', 600, 10, 'External Hard Disk Drive'),
	 
    array(3, "A stylish watch that can pair with your smartphone to show notifications.",
     'watch03.jpg', 100, 0, 'Smart Watch')
    
);

foreach ($prints as $print) {
	$desc = str_replace("'","''",$print[1]);
	$rc = $mysqli->query("INSERT INTO stock (id,  description, imgsrc, price, quan, title) VALUES ( {$print[0]}, '${desc}' , '{$print[2]}', {$print[3]}, {$print[4]}, '{$print[5]}' )");
    if ($rc) {
        print "Insert succeded. ";
    }
	else print "Insert failed! ";
}

$mysqli->close();
?>

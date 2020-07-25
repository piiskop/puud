<?php
ini_set ( 'display_errors', 1 );
error_reporting ( E_ALL & ~ E_DEPRECATED & ~ E_STRICT );
// Siia tuleb panna andmebaasi ühenduse andmed:
$dbEngine = new \mysqli ( 'localhost', 'trees', '85bbe3242761dc38', 'trees' );
$data = json_decode ( file_get_contents ( "php://input", true ) );

// @formatter:off
$query = sprintf(
	'INSERT INTO TreesOnArea SET trees_id = %1$u, amount = 1 ON DUPLICATE KEY UPDATE amount = amount + 1',
	$data->batch[0]->trees_id // 1
);
// @formatter:on

$result = $dbEngine->query ($query);
if (FALSE === $result) {
	throw new \mysqli_sql_exception ( $dbEngine->error, $dbEngine->errno );
	exit ();
}
$resultOfSelecting = $dbEngine->query ( 'SELECT amount FROM TreesOnArea' );

$records = array ();
while ( $record = $resultOfSelecting->fetch_assoc () ) {
	$records [] = $record;
}
echo json_encode ( $records, JSON_FORCE_OBJECT );

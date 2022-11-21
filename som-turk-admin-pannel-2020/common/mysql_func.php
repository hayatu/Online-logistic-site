<?php

error_reporting(E_PARSE | E_ERROR);
/*
Prepared By: Comp. Science Eng. H.Hakan Eryetli
Date : 8.02.2002
Purpose : Some commomly used database functions are coded as such to make the reusability and readability of the code easier.
Needs: A preincluded php script file called db_config.php which defines or gives values to the following variables:
                $DBTYPE
                $DBNAME
                $HOST
                $PORT
                $USERNAME
                $PASSWORD
*/

//Returns an error string
// error_reporting(E_ALL ^ E_DEPRECATED);

function db_error($code)
{
	switch ($code){
		case 0 :
			return $GLOBALS["DB_HOST_NOT_SPECIFIED"];
		case 1 :
			return $GLOBALS["DB_NAME_NOT_SPECIFIED"];
		case 2 :
			return $GLOBALS["DB_TYPE_NOT_SPECIFIED"];
		case 3 :
			return $GLOBALS["DB_USER_NOT_SPECIFIED"];
		case 4 :
			return $GLOBALS["MYSQL_CONN_ERROR"];
		case 5 :
			return $GLOBALS["MYSQL_CLOSE_ERROR"];
		case 6 :
			return $GLOBALS["MYSQL_DB_NOT_SELECTED"];
		case 7 :
			return $GLOBALS["INVALID_MYSQL_QUERY"];
		case 8 :
			return $GLOBALS["UNKNOWN_DB_TYPE"];
		default :
			return $GLOBALS["UNSPECIFIED_ERROR"];
	}
}

//On succes returns a "connection to database" variable
//On failure prints error message and returns 0

function db_connect()
{
	if( $conn = mysql_connect( $GLOBALS["HOST"], $GLOBALS["USERNAME"], $GLOBALS["PASSWORD"] ) ) return $conn;
	else{
		echo mysql_error();
		return 0;
	}
}

//Closes a connection to an MySQL database

function db_close($conn)
{
	if ( mysql_close( $conn ) ) return 1;
	else{
		echo mysql_error();
		return 0;
	}
}

//On success returns a result identifier of a query
//On failure echos an error message and returns 0

function db_query($conn, $query)
{
	mysql_query("SET NAMES utf8");
	if ( !mysql_select_db( $GLOBALS["DBNAME"], $conn ) ){
		return 0;
	}
	if ( $result = mysql_query( $query, $conn) ) return $result;
	else{
		return 0;
	}
}

//On success returns the number of rows of a result identifier
//On failure echos an error message and returns 0

function db_num_rows($result)
{
	return mysql_num_rows($result);
}

//Fetches a row of the result set into an array

function db_fetch_array($result)
{
	return mysql_fetch_array($result);
}

//Frees the memory associated with the result set

function db_free_result($result)
{
	return mysql_free_result($result);
}

//Gets the autoincremented id of the last INSERT operation

function db_insert_id()
{
	return mysql_insert_id();
}

function db_affected_rows($conn)
{
	return mysql_affected_rows($conn);
}

function db_select_query($conn, $query, &$array)
{
	$result = db_query($conn, $query);

	$num_fields = mysql_num_fields($result);

	for($j=0;$j<$num_fields;$j++){
		$field_name[$j] = mysql_field_name($result, $j);
	}

	$i = 0;
	while( $row = db_fetch_array( $result ) ){
		for($k=0;$k<$num_fields;$k++){
			$array[$i][$field_name[$k]] = $row[$k];
		}
		$i++;
	}
	return $i;
}

function db_other_query($conn, $query)
{

	db_query($conn, $query);

	return mysql_affected_rows($conn);
}

function db_get_last_error($conn){
	return mysql_error($conn);
}
?>

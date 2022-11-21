<?php
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
	$connStr = sprintf("(DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = %s)(PORT = %s	)) ) (CONNECT_DATA = (SID = %s) ) )", $GLOBALS['HOST'], $GLOBALS['PORT'], $GLOBALS['SID']);
	
	if ( $conn = ocilogon($GLOBALS['USERNAME'], $GLOBALS['PASSWORD'],$connStr) ) return $conn;
	else{
		$err = ocierror();
		echo "<pre>".$err["message"]."</pre>\n";
		return 0;
	}
}

//Closes a connection to an database

function db_close($conn)
{
	if ( ocilogoff( $conn ) ) return 1;
	else{
		$err = ocierror();
		echo "<pre>".$err["message"]."</pre>\n";
		return 0;
	}
}

function db_query($conn, $query)
{

	if ( !( $stid = @OCIParse($conn, $query) ) ) {
		$err = OCIError($conn);  // For OCIParse errors pass the connection
		echo "<pre>".$err["message"]."</pre>\n";
	}

	if ( !( $result = @OCIExecute($stid) ) ) {
	  $err = OCIError($stid); // For OCIExecute errors pass the statement
	  echo "<pre>".$err["message"]."</pre>\n";
	}
	
	return $stid;
}

function db_num_rows($result)
{
	return ocirowcount($result);
}

function db_num_cols($result)
{
	return ocinumcols($result);
}

function db_result($result, $row, $col)
{
	
}

function db_fetch_array($result)
{
	ora_fetch($result);
}

function db_select_query($conn, $query, &$array)
{
	$result = db_query($conn, $query);
	
	$num_fields = db_num_cols($result);

	for($j=0;$j<$num_fields;$j++){
		$field_name[$j] = ocicolumnname($result, $j);
	}

	$i = 0;
	while( ocifetchinto($result, &$row) ){
		for($k=0;$k<$num_fields;$k++){
			$array[$i][$field_name[$k]] = $row[$k];
		}
		$i++;
	}
	return $i;
}

function db_other_query($conn, $query)
{
	return db_query($conn, $query);
}
?>
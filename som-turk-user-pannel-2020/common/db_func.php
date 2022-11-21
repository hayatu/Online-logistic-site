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

include_once("db_conf.php");

if ( !check_db_variables() ) exit(1);

if ( $LANGUAGE == "ENGLISH" ) include_once("messages_en.php");

if ($DBTYPE == "MYSQL") include_once("mysql_func.php");
if ($DBTYPE == "MYSQLI") include_once("mysqli_func.php");
if ($DBTYPE == "ORACLE") include_once("oracle_func.php");

include_once("general_func.php");
//include_once($SPECIAL_FUNCTIONS_DIRECTORY."/".$SPECIAL_FUNCTIONS_FILE);

?>

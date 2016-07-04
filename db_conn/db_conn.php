 <?php


/*$mysqli = new mysqli('localhost', 'root', '', 'ohd'); */

/*
 * This is the "official" OO way to do it,
 * BUT $connect_error was broken until PHP 5.2.9 and 5.3.0.
 */
/*if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}
*/
// //for error reporting  -------    
// //error_reporting (E_ALL ^ E_NOTICE ^ E_WARNING);


 $con=mysql_pconnect('localhost','root','') or die("cannot connect to server");

mysql_select_db('ohd') or die("cannot connect to database");

 ?>
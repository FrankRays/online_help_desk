
<?php
/**
 * @author Kingster
 * @author SuyashBansal
 * @category SMS
 * @copyright 2015
 * @description Request this page with get or post params
 * @param uid = Way2SMS Username
 * @param pwd = Way2SMS Password
 * @param phone = Number to send to. Multiple Numbers separated by comma (,). 
 * @param msg = Your Message ( Upto 140 Chars)
 */

//include('waysms.php');
include_once('way2sms-api.php');

// if (isset($_REQUEST['uid']) && isset($_REQUEST['pwd']) && isset($_REQUEST['phone']) && isset($_REQUEST['msg'])) {
//     $res = sendWay2SMS($_REQUEST['uid'], $_REQUEST['pwd'], $_REQUEST['phone'], $_REQUEST['msg']);
//     if (is_array($res))
//         echo $res[0]['result'] ? 'true' : 'false';
//     else
//         echo $res;
//     exit;
// }
$new= "8607723883";
sendWay2SMS ('8802840673' , 'mummy111' , '8295605801' , 'Hello World');   
sendWay2SMS ('8802840673' , 'mummy111' ,$new , 'Hello World hi der');
?>
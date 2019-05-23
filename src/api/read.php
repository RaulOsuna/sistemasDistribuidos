<?php
/**
 * Returns the list of calls
 */
require 'database.php';

$llamadas = [];
$sql = "SELECT * FROM cdr";

if($result = mysqli_query($con,$sql))
{
  $i = 0;
  while($row = mysqli_fetch_assoc($result))
  {
    $llamadas[$i]['idsucursal']    = $row['idsucursal'];
    $llamadas[$i]['calldate'] = $row['calldate'];
    $llamadas[$i]['clid'] = $row['clid'];
    $llamadas[$i]['src'] = $row['src'];
    $llamadas[$i]['dst'] = $row['dst'];
    $llamadas[$i]['dcontext'] = $row['dcontext'];
    $llamadas[$i]['channel'] = $row['channel'];
    $llamadas[$i]['dstchannel'] = $row['dstchannel'];
    $llamadas[$i]['lastapp'] = $row['lastapp'];
    $llamadas[$i]['lastdata'] = $row['lastdata'];
    $llamadas[$i]['duration'] = $row['duration'];
    $llamadas[$i]['billsec'] = $row['billsec'];
    $llamadas[$i]['disposition'] = $row['disposition'];
    $llamadas[$i]['amaflags'] = $row['amaflags'];
    $llamadas[$i]['accountcode'] = $row['accountcode'];
    $llamadas[$i]['uniqueid'] = $row['uniqueid'];
    $llamadas[$i]['userfield'] = $row['userfield'];
    $i++;
  }

  echo json_encode($llamadas);
  

}else
{
  http_response_code(404);
}

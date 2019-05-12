<?php
/**
 * Returns the list of calls
 */
require 'database.php';

$llamadas = [];
$sql = "SELECT id, nombre FROM datos";

if($result = mysqli_query($con,$sql))
{
  $i = 0;
  
  while($row = mysqli_fetch_assoc($result))
  {
    $llamadas[$i]['id']    = $row['id'];
    $llamadas[$i]['nombre'] = $row['nombre'];
    $i++;
  }

  echo json_encode($llamadas);
  

}else
{
  http_response_code(404);
}

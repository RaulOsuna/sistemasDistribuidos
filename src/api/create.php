<?php
require 'database.php';

// Get the posted data.
$postdata = file_get_contents("php://input");

if(isset($postdata) && !empty($postdata))
{
  // Extract the data.
  $request = json_decode($postdata);


  // Validate.
  if(trim($request->number) === '' || (float)$request->amount < 0)
  {
    return http_response_code(400);
  }

  // Sanitize.
  $idsucursal = mysqli_real_escape_string($con, (string)$request->idsucursal);
  $calldate = mysqli_real_escape_string($con, (string)$request->calldate);
  $clid = mysqli_real_escape_string($con, (string)$request->clid);
  $src = mysqli_real_escape_string($con, (string)$request->src);
  $dst = mysqli_real_escape_string($con, (string)$request->dst);
  $dcontext = mysqli_real_escape_string($con, (string)$request->dcontext);
  $channel = mysqli_real_escape_string($con, (string)$request->channel);
  $dstchannel = mysqli_real_escape_string($con, (string)$request->dstchannel);
  $lastapp = mysqli_real_escape_string($con, (string)$request->lastapp);
  $lastdata = mysqli_real_escape_string($con, (string)$request->lastdata);
  $duration = mysqli_real_escape_string($con, (string)$request->duration);
  $billsec = mysqli_real_escape_string($con, (string)$request->billsec);
  $disposition = mysqli_real_escape_string($con, (string)$request->disposition);
  $amaflags = mysqli_real_escape_string($con, (string)$request->amaflags);
  $accountcode = mysqli_real_escape_string($con, (string)$request->accountcode);
  $uniqueid = mysqli_real_escape_string($con, (string)$request->uniqueid);
  $userfield = mysqli_real_escape_string($con, (string)$request->userfield);


  // Create.
  $sql = "INSERT INTO `cdr`(
    idsucursal,
    calldate , 
    clid, 
    src, 
    dst, 
    dcontext, 
    channel, 
    dstchannel, 
    lastapp, 
    lastdata, 
    duration, 
    billsec, 
    disposition, 
    amaflags, 
    accountcode, 
    uniqueid, 
    userfield
    ) VALUES ('{$idsucursal}','{$calldate}','{$clid}','{$src}',{'$dst'},{'$dcontext'},{'$channel'},{'$dstchannel'},{'$lastapp'},{'$lastdata'},{'$duration'},{'$billsec'},{'$disposition'},{'$amaflags'},{'$accountcode'},{'$uniqueid'},{'$userfield'})";

  if(mysqli_query($con,$sql))
  {
    http_response_code(201);
    $llamadas = [
      'idsucursal' => $number,
      'calldate' => $amount,
      'clid'    => $clid,
      'src'    => $src,
      'dst'    => $dst,
      'dcontext'    => $dcontext,
      'channel'    => $channel,
      'dstchannel'    => $dstchannel,
      'lastapp'    => $lastapp,
      'lastdata'    => $lastdata,
      'duration'    => $duration,
      'billsec'    => $billsec,
      'disposition'    => $disposition,
      'amaflags'    => $amaflags,
      'accountcode'    => $accountcode,
      'uniqueid'    => $uniqueid,
      'userfield'    => $userfield
    ];
    echo json_encode($llamadas);
  }
  else
  {
    http_response_code(422);
  }
}
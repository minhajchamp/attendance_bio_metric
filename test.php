<?php
error_reporting(0);
include "junction/mmulibrary.php";
// echo 'Library Loaded</br>';
$zk = new MMULibrary('192.168.0.125', 44);
// echo 'Requesting for connection</br>';
$zk->connect();
// echo 'Connected</br>';
$zk->disableDevice();
// echo 'disabling device</br>';
$users = $zk->getUser();
//$dd = $zk->setUser(555, '2233', 'ted', '12345678', 1);
$attendace = $zk->getAttendance();
?>
<table width="100%" border="1" cellspacing="0" cellpadding="0" style="border-collapse:collapse;">
<thead>
  <tr>
    <td width="25">No</td>
    <td>UID</td>
    <td>ID</td>
    <td>Name</td>
    <td>Role</td>
    <td>Password</td>
  </tr>
</thead>

<tbody>
<?php
$no = 0;
foreach($users as $key=>$user)
{
  $no++;
?>

  <tr>
    <td align="right"><?php echo $no;?></td>
    <td><?php echo $key;?></td>
    <td><?php echo $user[0];?></td>
    <td><?php echo $user[1];?></td>
    <td><?php echo $user[2];?></td>
    <td><?php echo $user[3];?></td>
  </tr>

<?php
}
?>

</tbody>
</table>
<br /><br />
<table width="100%" border="1" cellspacing="0" cellpadding="0" style="border-collapse:collapse;">
<thead>
  <tr>
    <td width="25">No</td>
    <td>UID</td>
    <td>ID</td>
    <td>State</td>
    <td>Date/Time</td>
  </tr>
</thead>

<tbody>
<?php
$no = 0;
foreach($attendace as $key=>$at)
{
  $no++;
?>

  <tr>
    <td align="right"><?php echo $no;?></td>
    <td><?php echo $at[0];?></td>
    <td><?php echo $at[1];?></td>
    <td><?php echo $at[2];?></td>
    <td><?php echo $at[3];?></td>
  </tr>

<?php
}
?>

</tbody>
</table>
<?php

//$zk->deleteUser(2);

//$zk->clearAttendance();
//setUser($uid, $userid, $name, $password, $role)
//Reading fingerprint data
//for($i=0;$i<=9;$i++){
//$f = $zk->getUserTemplate(1,6); echo '</br>-----'; print_r($f); echo '</br>';
/*
echo 'FP length: '.$f[0].'</br>';
echo 'UID: '.$f[1].'</br>';
echo 'Finger ID: '.$f[2].'</br>';
echo 'Valid: '.$f[3].'</br>';
echo 'template: '.$f[4].'</br>';
*/

$zk->enableDevice();
$zk->disconnect();

?>

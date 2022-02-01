<?php

define("IP_ADDRESS", '192.168.0.125');
define("PORT", '424');
define("CONNECTION", '');
define("DESTINATION_URL", 'https://outsourcingprojectscrm.com/AttendanceBio/time_in');

$data = new FocalMMU(IP_ADDRESS, CONNECTION, PORT);
$data->connect();
// echo $data->render();
// $url = 'https://outsourcingprojectscrm.com/AttendanceBio/time_in';

// $data = $data->fetchAttendance();

// $postdata = json_encode($data);

// $ch = curl_init($url); 
// curl_setopt($ch, CURLOPT_POST, 1);
// curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
// curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
// $result = curl_exec($ch);
// curl_close($ch);
// print_r ($result);
// exit;
?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" 
integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" 
crossorigin="anonymous"></script>
<script>
  var data = <?= json_encode($data->fetchAttendance()); ?>;

  function pushAtt() {
    $.ajax({
      method: 'POST',
      dataType: 'JSON',
      data: data,
      url: <?= DESTINATION_URL; ?>,
      success: function(response) {
        console.log("Respond was: ", response);
      },
      error: function(request, status, error) {
        console.log("There was an error: ", request.responseText);
      }
    });
  }
  pushAtt();
//   setInterval(pushAtt, 3000);
</script>

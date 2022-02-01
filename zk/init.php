<?php

require 'Focal.php';
require 'main.php';

?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" 
integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" 
crossorigin="anonymous"></script>
<script>
  var data = <?= json_encode($data); ?>;

  function pushAtt() {
    $.ajax({
      method: 'POST',
      dataType: 'JSON',
      data: data,
      url: 'https://outsourcingprojectscrm.com/AttendanceBio/time_in',
      success: function(response) {
        console.log("Respond was: ", response);
      },
      error: function(request, status, error) {
        console.log("There was an error: ", request.responseText);
      }
    });
  }
  pushAtt();
  setInterval(pushAtt, 3000);
</script>
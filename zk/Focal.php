<?php

require __DIR__ . '\junction\mmulibrary.php';

class Focal
{

    private $ip_address;
    private $connection_protocol;
    private $port;
    private $m;

    public function __construct($ip_address, $connection_protocol, $port)
    {
        $this->ip_address = $ip_address;
        $this->connection_protocol = $connection_protocol;
        $this->port = $port;
        $this->m = new MMULibrary($this->ip_address, $this->port);
    }

    public function connect()
    {
        $this->m->connect();
        $this->m->disableDevice();
    }

    public function fetchAttendance()
    {
        $attendace = $this->m->getAttendance();
        $no = 0;
        $data = [];
        $attendnace = array();
        foreach ($attendace as $key => $at) {
            $no++;
            $emp = $at[1];
            $state = $at[2];
            $attendance = $at[3];

            $data[$attendance] = array(
                'emp' => $emp,
                'state' => $state,
                'status' => $state == 0 ? 'in' : 'out',
            );
        }
        return $data;
    }

    private function fetchUser()
    {
        $users = $this->m->getUser();
        return $users;
    }

    private function renderUser()
    {
        $users = $this->fetchUser();

        if (isset($users) && !empty($users)):

            $data = '<table width="100%" border="1" cellspacing="0" cellpadding="0" style="border-collapse:collapse;">
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
        
            <tbody>';
            $no = 0;
            foreach ($users as $key => $user) {
                $no++;

                $data .=  '<tr>
                <td align="right">' . $no . '</td>
                <td>' . $key . '</td>
                <td>' . $user[0] . '</td>
                <td>' . $user[1] . '</td>
                <td>' . $user[2] . '</td>
                <td>' . $user[3] . '</td>
                </tr>';

            }
            $data .= '</tbody></table>';
        else :

            $data = '<h1>Not Found</h1>';

        endif;

        return $data;
    }

    private function renderAttendance()
    {
        $attendace = $this->m->getAttendance();
        
        if (!empty($attendace)) :

            $datas = '<table width="100%" border="1" cellspacing="0" cellpadding="0" style="border-collapse:collapse;">
        <thead>
          <tr>
            <td width="25">No</td>
            <td>UID</td>
            <td>ID</td>
            <td>State</td>
            <td>Date/Time</td>
          </tr>
        </thead>
      
        <tbody>';
            $no = 0;
            $data = [];
            foreach ($attendace as $key => $at) {
                $no++;
                $emp = $at[1];
                $state = $at[2];
                $attendance = $at[3];

                $datas .= '<tr>
              <td align="right">' . $no . '</td>
              <td>' . $at[0] . '</td>
              <td>' . $at[1] . '</td>
              <td>' . $at[2] . '</td>
              <td>' . $at[3] . '</td>
            </tr>';
            }

            $datas .= '</tbody>
        </table>';
        else:
            $datas = '<h1>Not Found</h1>';
        endif;

        return $datas;

    }

    public function render()
    {
        return $this->renderAttendance() . "<br>" . $this->renderUser();
    }
}


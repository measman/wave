<?php
// Checking function already exists or not
if (!function_exists("getClientIpAddress")) {

  function getClientIpAddress()
  {
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //Checking IP From Shared Internet
    {
      $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //To Check IP is Pass From Proxy
    {
      $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
      $ip = $_SERVER['REMOTE_ADDR'];
    }

    return $ip;
  }
}

if (!function_exists("getLateTime")) {
  function getLateTime($login_time)
  {
    $lateTime = round((strtotime($login_time) - strtotime('10:00:00')) / 60, 0);
    return $lateTime > 0 ? $lateTime . ' m' : '0 m';
  }
}
if (!function_exists("getPriorityText")) {
  function getPriorityText($priority)
  {
    return $priority < 3 ? ($priority < 2 ? '<span class="badge bg-red">High</span>' : '<span class="badge bg-info">Normal</span>') : '<span class="badge bg-green">Low</span>';
  }
}

if (!function_exists("getJobDoneStatus")) {
  function getJobDoneStatus($job_done)
  {
    return $job_done < 3 ? ($job_done < 2 ? ($job_done < 1 ? 'Pending' : 'Ongoing')  : 'Hold') : 'Completed';
  }
}

if (!function_exists("getFormatedDateTime")) {
  function getFormatedDateTime($date_time)
  {
    return $date_time == '' ? '' : date('F j, Y, H:i', strtotime($date_time));
  }
}
if (!function_exists("getFormatedTime")) {
  function getFormatedTime($time)
  {
    return $time == '' ? '' : date('H:i', strtotime($time));
  }
}
if (!function_exists("getDayNameFrmDate")) {
  function getDayNameFrmDate($date)
  {
    return $date == '' ? '' : date('l', strtotime($date));
  }
}

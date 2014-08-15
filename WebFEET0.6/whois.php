<?php

// Confirm this is an IP address

$ipaddress = filter_var($_SERVER['REMOTE_ADDR'], FILTER_VALIDATE_IP);

// Use whois to look up the IP address

$output = shell_exec('whois '.$ipaddress);

// Try to match whois result against known managed services

if (preg_match("/PRIVATE-ADDRESS/", $output, $matches)) {
  $managedservice = "Internal address";
} elseif (preg_match("/No whois server is known for this kind of object./", $output, $matches)) {
  $managedservice = "Internal address";
} elseif (preg_match("/Bluecoat Systems/", $output, $matches)) {
  $managedservice = "Bluecoat Systems";
} elseif (preg_match("/Blue Coat Systems/", $output, $matches)) {
  $managedservice = "Bluecoat Systems";
} elseif (preg_match("/Cisco Systems Ironport Division/", $output, $matches)) {
  $managedservice = "Cisco Ironport";
} elseif (preg_match("/Trustwave Holdings/", $output, $matches)) {
  $managedservice = "Trustwave";
} elseif (preg_match("/Websense, Inc/", $output, $matches)) {
  $managedservice = "Websense";
} elseif (preg_match("/MX Logic/", $output, $matches)) {
  $managedservice = "MX Logic = McAfee Web Security SaaS";
} else {
  $managedservice = 'No managed service detected';
}

// Send back a JSON of the results to the client for display client-side

$arr = array('ip' => $ipaddress, 'whois' => $output, 'managedservice' => $managedservice);
echo json_encode($arr);

?>
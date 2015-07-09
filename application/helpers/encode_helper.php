<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    
function toPublicId($id) {
  return $id * 1498158 + 825920496;
}

function toInternalId($publicId) {
  return ($publicId - 825920496) / 1498158;
}


function gettimeleftinexpirationofaccount($createdate,$id="")
{
    $now = time(); // or your date as well
    $your_date = strtotime($createdate);
    $datediff = $now - $your_date;
    $subscription_days = floor($datediff/(60*60*24));
    $remaining_days = 15 - $subscription_days;
    if($remaining_days>=0)
    {
    return " (".$remaining_days." days)";
    }
    else
    {
    return " (expired)<a href='javascript:void(0)' onclick='resettrial(".$id.")'><img src='".base_url()."images/reset.png' height='16' width='16' alt='Reset' title='Reset'/></a>";    
    }
}

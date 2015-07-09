<?php
include_once('./hessianphp/dist/HessianService.php');

class Test{    
  function add($n1,$n2) {        
    return $n1+$n2;    
  }    
  function sub($n1,$n2) {        
    return $n1-$n2;    
  }    
  function mul($n1,$n2) {        
    return $n1*$n2;    
  }    
  function div($n1,$n2) {        
    return $n1/$n2;    
  }
}

$service = &new HessianService();
$service->registerObject(new Test);
$service->displayInfo = true;
$service->service();

?>
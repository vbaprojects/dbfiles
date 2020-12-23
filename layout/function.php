<?php
  function getBuyer($by){
		if($by == 'HO/18'){$wr = 'Devered';}
		if($by == 'HO/21'){$wr = 'Transglobal';}
		if($by == 'HO/22'){$wr = 'Lambton';}
		if($by== 'HO/15'){$wr = 'Tailerman';}
		if($by == 'HO/19'){$wr = 'Munro';}
		return $wr;
  }
  function getWarehouse($a){
		if($a == 'Devered'){$b = 'HO/18';}
		if($a == 'Transglobal'){$b = 'HO/21';}
		if($a == 'Lambton'){$b = 'HO/22';}
		if($a== 'Tailerman'){$b = 'HO/15';}
		if($a == 'Munro'){$b = 'HO/19';}
		return $b;
  }
?>
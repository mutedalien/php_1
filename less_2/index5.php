<?php
function power($val,$pow)
{
 if ($pow)
{
return $val * power ($val, $pow -1);
}
return 1;
}
$val=rand( 1, 10);
$pow=rand( 1, 10);
var_dump (power($val, $pow));

?>

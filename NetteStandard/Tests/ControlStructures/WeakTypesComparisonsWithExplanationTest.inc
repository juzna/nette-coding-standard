<?php

/*****************  good  *****************j*d*/
if ($a !== 2) {
	$a = 2;

} elseif ($a === 3) {
	$a = 4;

} else {
	$a = 7;
}

if ($a != 2) { // intentionally ==
	$a = 2;
}

if ($a == 2) { // intentionally ==
	$a = 2;
}



/*****************  bad  *****************j*d*/

if ($a != 2) {
	$a = 2;
}

if ($a == 2) {
	$a = 2;
}

if ($a != 2) { // intentionally
	$a = 2;
}

if ($a == 2) { // intentionally
	$a = 2;
}

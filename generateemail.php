
<?php

include 'rriconfigs/config.php';

include 'rriconfigs/session.php';

$resvnum = $_GET['BookingId'];

$bravo2 = ('SELECT * FROM reservations WHERE BookingId = "'.$resvnum.'"');
$delta2 = mysqli_query($connect,$bravo2);
$row25 = mysqli_fetch_assoc($delta2);
$InventoryType = $row25['InventoryType'];

$_SESSION['resvnum'] = $resvnum;


if ($InventoryType === 'TA'){
	echo "<script> window.location = '/email_cust_ta.php'</script>"; 
	
}

if ($InventoryType === 'NetRate'){
	echo "<script> window.location = '/email_cust_nr.php'</script>"; 
	
}

if ($InventoryType === 'Allotment'){
	echo "<script> window.location = '/email_cust_allot.php'</script>"; 
	
}










?>
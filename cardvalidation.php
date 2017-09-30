<?php

$number= $_POST['creditcardnumber'];
$expirationdate= $_POST['expiration'];
$securitycode= $_POST['security'];


function validatecard($number)
 {
    global $type;

    $cardtype = array(
        "visa"       => "/^4[0-9]{12}(?:[0-9]{3})?$/",
        "mastercard" => "/^5[1-5][0-9]{14}$/",
        "amex"       => "/^3[47][0-9]{13}$/",
        "discover"   => "/^6(?:011|5[0-9]{2})[0-9]{12}$/",
    );

    if (preg_match($cardtype['visa'],$number))
    {
	$type= "Visa";
        return 'Visa';
	
    }
    else if (preg_match($cardtype['mastercard'],$number))
    {
	$type= "MasterCard";
        return 'MasterCard';
    }
    else if (preg_match($cardtype['amex'],$number))
    {
	$type= "Amex";
        return 'Amex';
	
    }
    else if (preg_match($cardtype['discover'],$number))
    {
	$type= "Discover";
        return 'Discover';
    }
    else
    {
        return false;
    } 
 }

validatecard($number);



if (validatecard($number) !== false)
{
echo "<green> $type Detected. Credit Card number is valid</green>";
}
else
{
echo " <red>Invalid Credit Card</red>";
}

?>

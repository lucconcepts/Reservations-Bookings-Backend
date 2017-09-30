<?php
/**
 * simple method to encrypt or decrypt a plain text string
 * initialization vector(IV) has to be the same when encrypting and decrypting
 * 
 * @param string $action: can be 'encrypt' or 'decrypt'
 * @param string $string: string to encrypt or decrypt
 *
 * @return string
 */
function encrypt_decrypt($action, $string, $iv, $secret_key) {
    $output = false;
    $encrypt_method = "AES-256-CBC";
   #$secret_key = 'brodyisthebestintheworld';
    #$size = mcrypt_get_iv_size(MCRYPT_CAST_256, MCRYPT_MODE_CFB);
    #$secret_iv = mcrypt_create_iv($size, MCRYPT_DEV_RANDOM);
    // hash
    $key = hash('sha256', $secret_key);
    
    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
   // $iv = substr(hash('sha256', $secret_iv), 0, 16);
	
    if ( $action == 'encrypt' ) {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    } else if( $action == 'decrypt' ) {
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }
    return array($output, $iv, $secret_key, $string);
}


#$plain_txt = "This is my plain text";
#echo "Plain Text =" .$plain_txt. "<br>";
#$encrypted_txt = encrypt_decrypt('encrypt', $plain_txt);
#echo "Encrypted Text = " .$encrypted_txt[0]. "<br><br>";
#echo $encrypted_txt[1];
#$decrypted_txt = encrypt_decrypt('decrypt', $encrypted_txt);
#echo "Decrypted Text =" .$decrypted_txt. "\n";
#if ( $plain_txt === $decrypted_txt ) echo "SUCCESS";
#else echo "FAILED";
#echo "\n";
?>
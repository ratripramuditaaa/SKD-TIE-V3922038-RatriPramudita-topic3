<?php
function vigenere_encrypt($plaintext, $key) {
    $plaintext = strtoupper($plaintext);
    $key = strtoupper($key);
    $ciphertext = '';
    $keyLength = strlen($key);
    for ($i = 0, $j = 0; $i < strlen($plaintext); $i++) {
        $char = $plaintext[$i];

        if (ctype_alpha($char)) {
            $shift = ord($key[$j]) - ord('A');
            $encryptedChar = chr(((ord($char) - ord('A') + $shift) % 26) + ord('A'));
            $ciphertext .= $encryptedChar;
            $j = ($j + 1) % $keyLength;
        } else {
            $ciphertext .= $char;
        }
    }

    return $ciphertext;
}

function vigenere_decrypt($ciphertext, $key) {
    $ciphertext = strtoupper($ciphertext);
    $key = strtoupper($key);
    $plaintext = '';

    $keyLength = strlen($key);
    for ($i = 0, $j = 0; $i < strlen($ciphertext); $i++) {
        $char = $ciphertext[$i];

        if (ctype_alpha($char)) {
            $shift = ord($key[$j]) - ord('A');
            $decryptedChar = chr(((ord($char) - ord('A') - $shift + 26) % 26) + ord('A'));
            $plaintext .= $decryptedChar;
            $j = ($j + 1) % $keyLength;
        } else {
            $plaintext .= $char;
        }
    }

    return $plaintext;
}

$plaintext = "Ratri devisi Konsumsi";
$key = "HARI SABTU ADA KEGIATAN PEKAN PSDKU";

$ciphertext = vigenere_encrypt($plaintext, $key);
echo "Plaintext: " . $plaintext . "<br>";
echo "Key: " . $key . "<br>";
echo "Ciphertext: " . $ciphertext . "<br>";

$decryptedText = vigenere_decrypt($ciphertext, $key);
echo "Decrypted Text: " . $decryptedText;
?>

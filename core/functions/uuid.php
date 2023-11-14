<?php

function generateUUID() {
    // Generate 16 bytes of random data
    $data = random_bytes(16);

    // Set the UUID version (4 for random)
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40);

    // Set the UUID variant (RFC 4122)
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

    // Format the UUID as a hexadecimal string
    $uuid = bin2hex($data);

    // Insert hyphens to match the UUID format
    $uuid = substr($uuid, 0, 8) . '-' .
            substr($uuid, 8, 4) . '-' .
            substr($uuid, 12, 4) . '-' .
            substr($uuid, 16, 4) . '-' .
            substr($uuid, 20, 12);

    return $uuid;
}

?>
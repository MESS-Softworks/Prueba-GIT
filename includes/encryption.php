<?php
// Ruta a las claves
define('PUBLIC_KEY_PATH', __DIR__ . '/public_key.pem');
define('PRIVATE_KEY_PATH', __DIR__ . '/private_key.pem');

/**
 * Función para encriptar datos usando la clave pública.
 *
 * @param string $data El texto que deseas encriptar.
 * @return string|false El texto encriptado en base64, o false en caso de error.
 */
function encryptData($data) {
    // Obtener la clave pública desde el archivo
    $public_key = file_get_contents(PUBLIC_KEY_PATH);
    if (!$public_key) {
        return false;
    }
    
    // Encriptar los datos
    if (openssl_public_encrypt($data, $encrypted_data, $public_key)) {
        // Convertir a base64 antes de guardar en la base de datos
        return base64_encode($encrypted_data);
    }
    return false; // Retorna false si falla la encriptación
}

/**
 * Función para desencriptar datos usando la clave privada.
 *
 * @param string $data Encriptado en base64.
 * @return string|false El texto desencriptado o false en caso de error.
 */
function decryptData($data) {
    // Obtener la clave privada desde el archivo
    $private_key = file_get_contents(PRIVATE_KEY_PATH);
    if (!$private_key) {
        return false;
    }
    
    // Descodificar desde base64
    $encrypted_data = base64_decode($data);
    
    // Desencriptar los datos
    if (openssl_private_decrypt($encrypted_data, $decrypted_data, $private_key)) {
        return $decrypted_data;
    }
    return false; // Retorna false si falla la desencriptación
}
?>

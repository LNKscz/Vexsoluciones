<?php
/**
 * Copyright � 2015 Inchoo d.o.o.
 * created by Zoran Salamun(zoran.salamun@inchoo.net)
 */
namespace Vexsoluciones\Linkser\Controller\Payment;

class Criptografia
{
    public $dirKey;
    public $dirKeyPrivate;
    public $dirKeyStore;
    public $dirKeyPrivateL;

    public function __construct($dirKey, $dirKeyPrivate, $dirKeyStore, $dirKeyPrivateL = '')
    {
        $this->dirKey = $dirKey;
        $this->dirKeyPrivate = $dirKeyPrivate;
        $this->dirKeyStore = $dirKeyStore;
        $this->dirKeyPrivateL = $dirKeyPrivateL;
    }

    // devuelve llave publica
    public function getKeyPu()
    {
        return base64_encode(file_get_contents($this->dirKeyStore));
    }

    // firmar datos digitalmente con la llave privada
    public function sing($datos)
    {
        $keyP = openssl_pkey_get_private($this->pkcs8_to_pem_private(file_get_contents($this->dirKeyPrivate)));
        // computar la firma
        openssl_sign($datos, $firma, $keyP);

        // liberar la clave de la memoria
        openssl_free_key($keyP);
        return base64_encode($firma);
    }
   
    // encripta la informacion
    public function EncryptData($source)
    {
        $publicKey =  openssl_pkey_get_public($this->pkcs8_to_pem(file_get_contents($this->dirKey)));
        openssl_public_encrypt($source, $crypttext, $publicKey);
        return(base64_encode($crypttext));
    }

    // desencripta la informacion
    public function DecryptData($source)
    {
        $privateKey =  openssl_pkey_get_private($this->pkcs8_to_pem_private(file_get_contents($this->dirKeyPrivateL)));
        openssl_private_decrypt(base64_decode($source), $crypttext, $privateKey);
        return $crypttext;
    }

    // Crea las llaves RSA
    public function createKeyRSA($dir)
    {
        $res = openssl_pkey_new(array('private_key_bits' => 1024,'private_key_type' => OPENSSL_KEYTYPE_RSA));
        openssl_pkey_export($res, $privKey);
        $pubKey = openssl_pkey_get_details($res);
        $pubKey = $pubKey["key"];
        $data = array(
            "privada.rsa" => $this->pem2der($privKey),
            "publica.rsa" => $this->pem2der($pubKey)
        );

        foreach ($data as $key => $value) {
            $this->printRsaKeys($dir , $key, $value);
        }
    }

    // Guarda las llaves Rsa en la ubicacion q se envie
    private function printRsaKeys($dir, $name, $key) 
    {
        $fp = fopen($dir . "/$name" ,"w");
        fwrite($fp, $key);
        fclose($fp);

    }


    private function pkcs8_to_pem($der) 
    {

        static $BEGIN_MARKER = "-----BEGIN PUBLIC KEY-----";
        static $END_MARKER = "-----END PUBLIC KEY-----";
    
        $value = base64_encode($der);
    
        $pem = $BEGIN_MARKER . "\n";
        $pem .= chunk_split($value, 64, "\n");
        $pem .= $END_MARKER . "\n";
    
        return $pem;
    }

    private function pem2der($pem_data) 
    {
        $begin = "KEY-----";
        $end   = "-----END";
        $pem_data = substr($pem_data, strpos($pem_data, $begin)+strlen($begin));
        $pem_data = substr($pem_data, 0, strpos($pem_data, $end));
        $der = base64_decode($pem_data);
        return $der;
    }


    private function pkcs8_to_pem_private($der) {

        static $BEGIN_MARKER = "-----BEGIN PRIVATE KEY-----";
        static $END_MARKER = "-----END PRIVATE KEY-----";
    
        $value = base64_encode($der);
    
        $pem = $BEGIN_MARKER . "\n";
        $pem .= chunk_split($value, 64, "\n");
        $pem .= $END_MARKER . "\n";
    
        return $pem;
    }
}
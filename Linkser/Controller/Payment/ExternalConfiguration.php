<?php
/*
* Purpose : passing Authentication config object to the configuration
*/
namespace Vexsoluciones\Linkser\Controller\Payment;

require_once __DIR__ . '/cybersource-rest/vendor/autoload.php';
use \CyberSource\Configuration;

class ExternalConfiguration
{
        //initialize variable on constructor
        function __construct($dataConfigCyber)
        {
                $this->authType = "http_signature";//http_signature/jwt
                $this->enableLog = true;
                $this->logSize = "1048576";
                //$this->logFile = "Log";
                //$this->logFilename = "Cybs.log";
                $this->merchantID = $dataConfigCyber['merchantID'];
                $this->apiKeyID = $dataConfigCyber['apiKeyID'];
                $this->secretKey = $dataConfigCyber['secretKey'];
                $this->keyAlias = $dataConfigCyber['merchantID'];
                $this->keyPass = $dataConfigCyber['merchantID'];
                $this->keyFilename = $dataConfigCyber['merchantID'];
                $this->keyDirectory = "Resources/";

                if($dataConfigCyber['opcion'] == 0){
                        $this->runEnv = "cyberSource.environment.SANDBOX";
                }else{
                        $this->runEnv = "cyberSource.environment.PRODUCTION";
                }
                
                $this->merchantConfigObject();
        }
        //creating merchant config object
        function merchantConfigObject()
        {     
                $config = new \CyberSource\Authentication\Core\MerchantConfiguration();
                if(is_bool($this->enableLog))
                      $confiData = $config->setDebug($this->enableLog);

                $confiData = $config->setLogSize(trim($this->logSize));
                //$confiData = $config->setDebugFile(trim(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . $this->logFile));
				//$confiData = $config->setLogFileName(trim($this->logFilename));
                $confiData = $config->setauthenticationType(strtoupper(trim($this->authType)));
                $confiData = $config->setMerchantID(trim($this->merchantID));
                $confiData = $config->setApiKeyID($this->apiKeyID);
                $confiData = $config->setSecretKey($this->secretKey);
                $confiData = $config->setKeyFileName(trim($this->keyFilename));
                $confiData = $config->setKeyAlias($this->keyAlias);
                $confiData = $config->setKeyPassword($this->keyPass);
                $confiData = $config->setKeysDirectory(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . $this->keyDirectory);
                $confiData = $config->setRunEnvironment($this->runEnv);
                $config->validateMerchantData($confiData);

                return $config;
        }

        function ConnectionHost()
        {
                $merchantConfig = $this->merchantConfigObject();
                $config = new Configuration();
                $config = $config->setHost($merchantConfig->getHost());
                $config = $config->setDebug($merchantConfig->getDebug());
                $config = $config->setDebugFile($merchantConfig->getDebugFile() . DIRECTORY_SEPARATOR . $merchantConfig->getLogFileName());
                return $config;
        }

        function FutureDate($format){
                if($format){
                        $rdate = date("Y-m-d",strtotime("+7 days"));
                        $retDate = date($format,strtotime($rdate));
                }
                else{
                        $retDate = date("Y-m",strtotime("+7 days"));
                }
                echo $retDate;
                return $retDate;
        }

        function CallTestLogging($testId, $apiName, $responseMessage){
                $runtime = date('d-m-Y H:i:s');
                $file = fopen("./CSV_Files/TestReport/TestResults.csv", "a+");
                fputcsv($file, array($testId, $runtime, $apiName, $responseMessage));
                fclose($file);
        }

        function downloadReport($downloadData, $fileName){
                $filePathName = __DIR__. DIRECTORY_SEPARATOR .$fileName;
                $file = fopen($filePathName, "w");
                fwrite($file, $downloadData);
                fclose($file);
                return __DIR__.'\\'.$fileName;
        }
}

?>
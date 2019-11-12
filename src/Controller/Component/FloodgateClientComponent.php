<?php
namespace FloodgateCake\Controller\Component;

use Cake\Controller\Component;
use Cake\Core\Configure;
use Cake\Utility\Hash;
use FloodgateSDK\FloodgateClient;

class FloodgateClientComponent extends Component
{
  private $client;

  private $isReady = false;

  public function initialize(Array $config)
  {
    parent::initialize($config);


    $appconfig = (array)Configure::read('Floodgate');
    $sdkkey = Hash::get($appconfig, 'sdkkey');
    if (!$sdkkey) {
      throw new \InvalidArgumentException('Floodgate SDK Key not provided.');
    }

    try {
      if (empty($config)) {
        $this->client = new FloodgateClient($sdkkey);
      }
      else {
        $clientconfig['timeout'] = 10;
  
        if (!empty($config['timeout'])) {
          $clientconfig['timeout'] = $config['timeout'];
        }
  
        if (!empty($config['logpath'])) {
          $clientconfig['logger'] = new \FloodgateSDK\Loggers\FileLogger($config['logpath']);
        }
  
        // new \FloodgateSDK\Cache\FloodgateCache(new \FloodgateSDK\Cache\ArrayCache())
        $clientconfig['cache'] = new \FloodgateSDK\Cache\FloodgateCache(\Cake\Cache\Cache::pool("default"));
  
        $this->client = new FloodgateClient($sdkkey, $clientconfig);

        $this->isReady = true;
      }
    }
    catch(Exception $e) {
      $this->isReady = false;
    }
  }

  public function GetValue($key, $defaultValue, $user = null)
  {
    if (!$this->isReady)
      return $defaultValue;
    
    if (empty($user)) {
      return $this->client->GetValue($key, $defaultValue);
    }
    
    return $this->client->GetValue($key, $defaultValue, $user);
  }
}

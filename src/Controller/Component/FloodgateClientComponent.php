<?php
namespace FloodgateCake\Controller\Component;

use Cake\Controller\Component;
use FloodgateSDK\FloodgateClient;

class FloodgateClientComponent extends Component
{
  private $client;

  public function initialize(Array $config)
  {
    parent::initialize($config);


    $appconfig = (array)Configure::read('Floodgate');
    $sdkkey = Hash::get($appconfig, 'sdkkey');
    if (!$sdkkey) {
      throw new \InvalidArgumentException('Floodgate SDK Key not provided.');
    }

    if (empty($config)) {
      $this->client = new FloodgateClient($sdkkey);
    }
    else {
      // $clientConfig['timeout'] = !empty($config['timeout']) ? $config['timeout'] : 10;
      $timeout = !empty($config['timeout']) ? $config['timeout'] : 10;

      // if (!empty($config['logger'])) {
      //   $clientConfig['logger']
      // }

      $this->client = new FloodgateClient($sdkkey,
      [
        'timeout' => $timeout,
        // 'logger' => new \FloodgateSDK\Loggers\FileLogger('C:\Users\mathe\Source\Repos\floodgate.io\temp\cake-log-plugin.txt'),
        // 'cache' => new \FloodgateSDK\Cache\FloodgateCache(new \FloodgateSDK\Cache\ArrayCache()),
        'cache' => new \FloodgateSDK\Cache\FloodgateCache(\Cake\Cache\Cache::pool("default"))
      ]);
    }
  }

  public function GetValue($key, $defaultValue, $user = [])
  {
    if (empty($user)) {
      return $this->client->GetValue($key, $defaultValue);
    }
    
    return $this->client->GetValue($key, $defaultValue, $user);
  }
}

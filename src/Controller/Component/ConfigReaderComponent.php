<?php
namespace FloodgateCake\Controller\Component;

use Cake\Controller\Component;
use FloodgateSDK\FloodgateClient;

class ConfigReaderComponent extends Component
{
      

    public function initialize(Array $config)
    {
      parent::initialize($config);
      debug('config');

      

      // App::import('Vendor', 'FloodgateCake.FloodgateSDK/filename');

      // $user = new \FloodgateSDK\User('id');
      // $client = new FloodgateClient($sdkkey);
      // // $client = new \FloodgateCake\FloodgateSDK\FloodgateClient\FloodgateClient($sdkkey);

      

      // debug($client);
    }

    public function doComplexOperation($amount1, $amount2)
    {
      debug($this);
      return $amount1 + $amount2;
    }

    public function GetValue($key, $defaultValue, $user = [])
    {

    }
}

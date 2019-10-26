<?php

namespace FloodgateCake;

use Cake\Core\BasePlugin;
use Cake\Core\PluginApplicationInterface;
use Cake\Core\Configure;
use Cake\Utility\Hash;
use FloodgateSDK\FloodgateClient;

/**
 * Plugin for FloodgateCake
 */
class Plugin extends BasePlugin
{
  public $client;

  public function bootstrap(PluginApplicationInterface $app)
  {
    // Add constants, load configuration defaults.
    // By default will load `config/bootstrap.php` in the plugin.
    parent::bootstrap($app);
    
    $config = (array)Configure::read('Floodgate');
    $sdkkey = Hash::get($config, 'sdkkey');
    if (!$sdkkey) {
      throw new \InvalidArgumentException('Floodgate SDK Key not provided.');
    }

    $client = new FloodgateClient($sdkkey);
    debug($client);
  }
}

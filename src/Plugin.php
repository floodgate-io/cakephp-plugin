<?php

namespace FloodgateCake;

use Cake\Core\BasePlugin;
use Cake\Core\PluginApplicationInterface;

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
  }
}

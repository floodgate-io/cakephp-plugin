# CakePHP plugin for Floodgate

CakePHP plugin for [Floodgate](https://floodgate.io), a cloud based feature flag service which provides a centralised management console for managing your application feature flags.

## Installing & Configuring

You can install the CakePHP Floodgate Plugin using Composer

```
composer require floodgate/floodgate-cakephp
```

Load the plugin into your CakePHP application

```
bin\cake plugin load FloodgateCake -b
```

Configure your CakePHP application with your Floodgate SDK Key

```php
// /config/app.php

'Floodgate' => [
  'sdkkey' => 'enter-your-sdk-key'
],
```

Load the Floodgate CakePHP Plugin Component
```php
$this->loadComponent('FloodgateCake.FloodgateClient');
```

## Usage

Below is an example of a simple implementation of getting a single flag value from inside a controller.

```php
// /src/Controller/MyController.php

$result = $this->FloodgateClient->GetValue('feature-flag-key', false);

if ($result) {
  // Do something new and exciting
}
else {
  // Do whatever I usually do
}
```

## About Floodgate

Floodgate is a remote feature management system designed to help engineering teams and product teams work independently. Using feature flags managed by Floodgate you will dramatically reduce the risks software companies face when releasing and deploying new features.

With Floodgate you can use fine grained user targeting to test out new features in your production environment with minimal impact and risk to your existing systems and customers. Floodgate provides a simple to use percentage rollout facility to allow you to perform canary releases with just a few clicks.

To learn more about Floodgate, visit us at https://floodgate.io or contact hello@floodgate.io. To get started with feature flags for free at https://app.floodgate.io/signup.

Floodgate has currently developed following SDKs.

* .Net Framework [GitHub](https://github.com/floodgate-io/dotnet-framework-sdk)
* PHP [GitHub](https://github.com/floodgate-io/php-sdk)
* Node [GitHub](https://github.com/floodgate-io/node-sdk)
* JavaScript [GitHub](https://github.com/floodgate-io/javascript-sdk)
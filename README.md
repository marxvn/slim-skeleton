# Slim Framework Application Skeleton

[![LICENSE](https://img.shields.io/packagist/l/projek-xyz/slim-skeleton.svg?style=flat-square)](LICENSE.md)
[![VERSION](https://img.shields.io/packagist/v/projek-xyz/slim-skeleton.svg?style=flat-square)](https://github.com/projek-xyz/slim-skeleton/releases)
[![Build Status](https://img.shields.io/travis/projek-xyz/slim-skeleton/master.svg?style=flat-square)](https://travis-ci.org/projek-xyz/slim-skeleton)
[![Coveralls](https://img.shields.io/coveralls/projek-xyz/slim-skeleton/master.svg?style=flat-square)](https://coveralls.io/github/projek-xyz/slim-skeleton)
[![SensioLabs Insight](https://img.shields.io/sensiolabs/i/de272fe6-fcb7-4dad-b8d5-28e9d4ee86f6.svg?style=flat-square)](https://insight.sensiolabs.com/projects/de272fe6-fcb7-4dad-b8d5-28e9d4ee86f6)

## Prerequisites

- PHP 5.5.x or newer, since Slim v3.x depends on it.
- Node.JS 0.12.x or newer, required for development only.
- HTTP Server, e.g. NginX or Apache either.
- MySQL Server 5.x or newer for main database.

## Installation

I've make this package available to install via `composer create-project` so make sure you've already have [composer](https://getcomposer.org/download/) installed globally.

```bash
$ composer create-project -n -s dev projek-xyz/slim-skeleton my-app
```

then enter `my-app` directory you just create and run the server.

```bash
$ cd my-app
$ php -S 0.0.0.0:8888 -t public public/index.php
```

Now, you should open [http://localhost:8888](http://localhost:8888) in your favorite web browser.

## Directories and Files structure

```
├── app/                  // Root for application codes
│   ├── cache/            // cache directory
│   ├── logs/             // Log directory fror Monolog
│   ├── src/              // Class files within `App` namespace
│   │   ├── Actions/      // Router Actions directory
│   │   └── Providers/    // Service Providers directory
│   ├── views/            // View templates directory for Plates
│   ├── .env.sample       // Sample .env file for phpdotenv
│   ├── dependencies.php  // Services for Pimple
│   ├── middlewares.php   // Middlewares declaration
│   ├── routers.php       // Application routes
│   └── settings.php      // Application settings
├── asset/                // Assets directory
│   ├── database/         // Database directory
│   └── uploads/          // Uploaded files directory
├── public/               // Webroot directory
│   ├── images/           // Static images directory
│   ├── styles/           // Stylesheets directory
│   ├── favicon.ico       // Sample favicon
│   ├── .htaccess.sample  // Sample .htaccess file for apache2
│   └── index.php         // Entry point to application
├── tests/                // Test suites directory
└── phpunit.xml           // Sample phpunit configuration file
```

## Testing

I need to make sure everything's works fine before it ready to use, so I put all test cases are available in [**tests**](tests) directory.

```bash
phpunit
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

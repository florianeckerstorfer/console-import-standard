Console Import Standard Edition
===============================

> A boilerplate for console-based data import scripts using [symfony/console](https://github.com/symfony/Console) and
[ddeboer/data-import](https://github.com/ddeboer/data-import).


Installation
------------

You need [Composer](https://getcomposer.org) to create a new data import script:

```shell
$ curl -s http://getcomposer.org/installer | php
```

After you have installed Composer you can create a new project using the following command:

```shell
$ php composer.phar create-project florianeckerstorfer/console-import-standard-edition path/to/install
```

The sample classes provided in this project reside in the `Acme\DemoImport` namespace. However, since this project uses
[PSR-4](http://www.php-fig.org/psr/psr-4/) I can place the classes directly in the `src/` directory. Currently only the
`Command` directory contains a file and you should open it and change the namespace according to your needs. You
 also have to adapt the namespace in `composer.json` in the `autoload.psr-4` option.


Usage
-----

After implementing your import logic in a command you can run the application:

```shell
$ php bin/app.php
```

This will give you a list of all available commands. The demo command is called `import` and you need to call it the
name of a CSV file.

```shell
$ php bin/app.php import ~/my-data.csv
```

### Adding Additional Commands

You can add additional commands to the application by creating a command and adding it to the application. Learn more
about creating commands in the [Console](http://symfony.com/doc/current/components/console/introduction.html)
documentation.

```php
# bin/app.php

$console->add(new \Acme\DemoImport\Command\ImportCommand());
$console->add(new \Acme\DemoImport\Command\OtherCommand());
```


Author
------

Developed by [Florian Eckerstorfer](https://florian.ec) in Vienna, Europe. I am
[@Florian_](https://twitter.com/Florian_) on Twitter. I post updates for my open source projects using the
Twitter handle [@braincrafted](https://twitter.com/braincrafted).

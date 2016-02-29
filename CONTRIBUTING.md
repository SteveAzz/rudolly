# Contributing to rudolly

Please note that this project is released with a
[Contributor Code of Conduct](http://contributor-covenant.org/version/1/2/0/).
By participating in this project you agree to abide by its terms.

## Installation from Source

Prior to contributing to rudolly, you must be able to run the test suite.
To achieve this, you need to acquire the project source code:

1. Run `git clone https://github.com/steveazz/rudolly.git`
2. Get [composer](https://getcomposer.org/)
3. `cd rudolly && composer install`

Composer will take care of installing all required dependencies.
Watch the command output to spot errors.

The project uses [robo](http://robo.li/) for a task runner.  
You can execute the test suite by running `vendor/bin/robo test` or `vendor/bin/phpunit`
when inside the rudolly directory.

> You can install [robo](http://robo.li/) globally for convenience,
> to just run `robo test`

Robo also allows you to watch files during development. Run `robo watch` when inside the project
directory and leave that window open. Change a file in `src` or `test` to see the test suite auto-run.

Feel free to add useful tasks to the `RoboFile.php` in the project root.

## Contributing policy

Fork the project, create a feature branch, and send us a pull request.

To ensure a consistent code base, you should make sure the code follows
the [PSR-2 Coding Standards](http://www.php-fig.org/psr/psr-2/). You can also
run [php-cs-fixer](https://github.com/FriendsOfPHP/PHP-CS-Fixer) with the
configuration file that can be found in the project root directory.

If you would like to help, take a look at the [list of open issues](https://github.com/steveazz/rudolly/issues).

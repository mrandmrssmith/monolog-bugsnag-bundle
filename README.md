# Monolog Bugsnag Bundle
A Bugsnag Handler Bundle for Symfony Monolog

It is compatible and tested with;

- PHP 8.1, 8.2 & Symfony 5.4 LTS
- PHP 8.1, 8.2 & Symfony 6.2, 6.3



## Installation

:building_construction:

1. If you haven't already, create a [Bugsnag](https://www.bugsnag.com) account.
2. Add this package to your project.
    ```shell
    composer require mrandmrssmith/monolog-bugsnaghandler
    ```
3. Enable the bundle
    ```php
   // config/bundles.php
   
   return [
       //...
       \MrAndMrsSmith\MonologBugsnagBundle\MonologBugsnagBundle::class => ['all' => true],
   ];
   ```

## Usage

:notebook_with_decorative_cover:

### Configure bugsnag

Find the `bugsnag.yaml` file in `config/packages` and fill the API key provided in the bugsnag project settings.

### Add a new monolog handler

Find the `monolog.yaml` and add a new handler like:

```yaml
monolog:
    handlers:
        # ... other handlers definitions
        bugsnag:
            type: service
            id: 'monolog.bugsnag_handler'

```

We cannot configure a minimum level for service's handler. The default min-level is `WARNING`. Plan is to be able to parametrize it at some point.

### Test it

```php
/** @var LoggerInterface $logger **/
$logger->error('Error message');
```

## Support

:hugs: Please consider contributing if you feel you can improve this package, otherwise submit an issue via the GitHub page and include as much
information as possible, including steps to reproduce, platform versions and anything else to help pinpoint the root cause.

## Contributing

:+1: If you do contribute, we thank you, but please review the [CONTRIBUTING](CONTRIBUTING.md) document to help us ensure the project
is kept consistent and easy to maintain.

## Versioning

:hourglass: This project will follow [Semantic Versioning 2.0.0](https://semver.org/spec/v2.0.0.html).

## Changes

:hammer_and_wrench: All project changes/releases are noted in the GitHub releases page and in the [CHANGELOG](CHANGELOG.md) file.

Following conventions laid out by [keep a changelog](https://keepachangelog.com/en/1.1.0/).

## Credits

:pray: Thanks to the contributors of [MonoSnag](https://github.com/meadsteve/MonoSnag/) from which this library is highly inspired.

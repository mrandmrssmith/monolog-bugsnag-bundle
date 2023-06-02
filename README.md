# Monolog Bugsnag Bundle
A Bugsnag Handler Bundle for Symfony Monolog

## Installation

## Usage

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

## Credits

Thanks to the contributors of [MonoSnag](https://github.com/meadsteve/MonoSnag/) from which this library is highly inspired.

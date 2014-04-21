# PreserialiserServiceProvider

A Silex Service Provider for the [Preserialiser](https://github.com/porkchopsandwiches/preserialiser) library.

```php
use PorkChopSandwiches\PreserialiserServiceProvider\PreserialiserServiceProvider;

$app -> register(new PreserialiserServiceProvider(), array(
	"preserialiser.default_args"    => array()
));

$result = $app["preserialiser"] -> preserialise(...);
```

Also includes a trait for simple shortcut methods and code completion

```php
class MyApplication extends \Silex\Application {
	use PorkChopSandwiches\PreserialiserServiceProvider\PreserialiserTrait;
}

$app = new MyApplication();

$app -> get("/", function () {

	# Access Preserialiser instance
	$app -> getPreserialiser() -> addDefaultArgs(array("foo" => true)) -> preserialise(...);

	# Invoke preserialise() directly
	$result = $app -> preserialise(...);
});
```

## Install via Composer
```js
{
	"require": {
		"porkchopsandwiches/preserialiserserviceprovider"
	}
}
```

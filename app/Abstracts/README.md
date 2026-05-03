# Abstract Classes

I've added a couple of abstract classes for extension. These include:

- [Repository](./Repository.php)

## Repository Class

This class is used as base for extention by a number of repositories used within service classes, Documentation contracts is [here](../Contracts/README.md)

### Methods:

The constructor of the Repository is used to inject the model, this will be injected by each provider for each Repository respectively - documentation for the Providers is [here](../Providers/README.md)

```php
    public function __construct(protected Model $model)
```

```php
public function create(array $data): Model
```

```php
public function update(int $id, array $data): Model
```

```php
public function delete(int $id, array $data): Model
```



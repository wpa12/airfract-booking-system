# Controllers

- [DashboardController](#dashboard-controller)
- [LoginController](#logincontroller)
- [LogoutController]()

## DashboardController

The [DashboardController](../Controllers/DashboardController.php) Holds the methods for handling requests and returning the dashboard views

### Mathods:

```php
public function index(): View
```

## LoginController

The [LoginController](./LoginController.php) holds some basic auth to simply log a user in and either redirect them to the dashboard or the login.

### Methods:

```php 
public function login(): RedirectResponse
```

## LogoutController

The [LogoutController](./LogoutController.php) Logs a user out, invalidates their session and redirects them to the login page.

### Methods:

```php 
public function logout(): RedirectResponse
```

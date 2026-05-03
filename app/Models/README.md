# Models

- [Address](#address-model)
- [Aircraft](./Aircraft.php)
- [Airport](./Airport.php)
- [Booking](./Booking.php)
- [EngineType](./EngineType.php)
- [FlightSchool](./FlightSchool.php)
<!-- - [Instructor](./Instructor.php) To be added-->
- [FuelType](./FuelType.php)
- [PilotCredential](./PilotCredential.php)
- [TechLog](./TechLog.php)


## Address Model
The [Address](./Address.php) has been created merely for the purposes of creating an address in the database

## Aircraft Model

The [Aircraft](./Aircraft.php) implements a [BookableContract](../Contracts/BookableContract.php) 

### Relationships

```php
public function bookings(): MorphMany
public function engineType(): BelongsTo
public function flightSchool(): BelongsTo
public function scopeAircraftAvailable(Builder $query): Builder
```

# Factories

This README is relating to the factories. There are a number of them which are listed below.

- [AddressFactory](#address-factory-model-address)
- [AircraftFactory](#aircraftfactory-model-aircraft)
- [AirportFactory](#airportfactory-modelairport)
- [BookingFactory](#bookingfactory-model-booking)
- [EngineTypeFactory](#enginetypefactory-model-enginetype)
- [FlightSchoolFactory](#flightschoolfactory-model-flightschool)
- [FuelTypeFactory]()
- UserFactory (standard with Laravel)

## Address Factory (*Model*: [Address](../../app/Models/Address.php))

The AddressFactory is simply creates addresses in the database inline with the [Address](../migrations/2026_04_01_132039_create_addresses_table.php).

## AircraftFactory (*Model*: [Aircraft](../../app/Models/Aircraft.php))

The [AircraftFactory](./AircraftFactory.php) has 2 additional private methods that i added. Rather than simply fake some strings for the aircraft, I collated some realworld aircraft makes and models.

### Methods:
In realworld Aviation, aircraft has a string of numbers, letters, or a combination of both located near the tail. This mark is the registration, and denotes the nation of which the aircraft is registered in. European aircraft following the 'XY-WXYZ' format whereas American registered aircraft follow an `N12345' Format, whilst Japanese registration is 'J-XYZ'

```php
private function generateRegistrationCodeFormat(): array
```

The above method will generate a random number and depending on which number is generated, depends which regex will be used to generate a registration (we do have many american general aviation aircraft registered in the UK)

```php
private function aircraftTypes(): array
```

The above method returns an array of realworld aircraft makes and multi, separated by the engine type they possess, these engine types are `single`, `multi`,`jet`, `twinjet`, `turboprop`, and `twinturboprop`

```php
private function randomMakeClassificationAndModel(): array
```

The `randomMakeClassificationAndModel()` make and model method essentially returns the make and model of aircraft based on the engine classification. It makes use of recursion to rerun if the classifcation for say 'jet' is empty as some aircraft manufacturers don't have jets.

Probably a little over-engineered, but this has legs, soley to provide a set of data conducive to that of the realworld.

This method is called in the `definition()` method and deconstructed for use in the rest of the factory.

## AirportFactory (*Model*: [Airport](../../app/Models/Airports.php))

The [AirportFactory](./AirportsFactory.php) creates some basic airport data.
In aviation airports publish their landing fee (the cost every time the wheels touch the runway) which is crucial for pilots to know if they're practicing take-offs and landings. In addition they also publish their fuel costs.

### Methods:

```php
public static function ukAirportCatalog(): array
```
This method simply returns an array of airport data within the UK with their associated ICAO code (Internation Civil Aviation Organisation code) this is merely a code that is used by pilots and aircraft systems to identify the airport.

The method is called in the `definition()` method and broken apart to fill the data for the factory.

It is also called in the [AirportSeeder](../seeders/AirportSeeder.php) and looped through so that all airports in the list are seeded into the database.

In addition when an airport is created the AddressFactory is run to create a new address and populate the `fK_address_id` field.

## BookingFactory (*Model*: [Booking](../../app/Models/Booking.php))

The [BookingFactory](./BookingFactory.php) is used to create a book

### Methods:

The following static method is called in the BookingSeeder to seed some bookings with those that are a BookableContract type

```php
public static function bookableTypes(): array
```

## EngineTypeFactory (*Model*: [EngineType](../../app/Models/EngineType.php))

The [EngineFactory](./EngineTypeFactory.php) is simply used to create the engine type data (single, multi, jet, twinjet, turboprop, twinturboprop)

### Methods:

```php
public static function engineTypeCatalog(): array
```
The above is used to create the engine types, matching each engine type to it's correct fuel type.

## FlightSchoolFactory (*Model*: [FlightSchool](../../app/Models/FlightSchool.php))

The [FlightSchoolFactory](../factories/FlightSchoolFactory.php) merely creates a Flight School in the database.

## FuelTypeFactory (*Model*: [FuelType](../../app/Models/FuelType.php))

The [FuelTypeFactory](../factories/FuelTypeFactory.php) is used to create two different types of fuel in within the Aviation industry.

### Methods:

The following method returns and array of fuel types which is called in the `definition()` method and used to populate the fuel types at an airport.

```php
public static function fuelTypeCatalog(): array
```
This method is called in the [FuelTypeSeeder](../seeders/FuelTypeSeeder.php) when seeding engine type data.

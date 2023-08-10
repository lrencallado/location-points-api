## About Location Points API

A single restful API endpoint which should return Location points for a region on a map. It returns a response of all
locations that fall within the given radius, latitude and longitude.

It uses Haversine formula to calculates the distance between two points on the surface of a sphere, given their latitudes and longitudes.

## Project Setup

```sh
composer install
```

```sh
php artisan migrate --seed
```

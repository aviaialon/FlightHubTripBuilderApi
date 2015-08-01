## Synopsis
A simple RESTFul API built with Laravel to manage trips

## RESTful URLs
#### List all airports (Ordered alphabeticaly by city and name):<br />

> **GET** `/airports/list`<br />
**Example:** `curl -i -X GET '<REST SERVICE IP>:8080/airports/list?pretty'`<br />
___


#### List all available trips<br />
> **GET** `/trips/list`<br />
**Example:** `curl -i -X GET '<REST SERVICE IP>:8080/trips/list?pretty'`<br />

___

#### List all flights associated to a trip:<br />
> **GET** `/trips/{trip_id}/flights`<br />

| Param Name | Description          |
| ------------- | ----------- |
| `trip_id`      | The trip's id.|
**Example:** `curl -i -X GET '<REST SERVICE IP>:8080/trips/1/flights?pretty'`<br />
___

#### Create a new trip<br />
> **POST** `/trips?name={name}`<br />

| Param Name | Description          |
| ------------- | ----------- |
| `name`      | (Optional) The new trips name.|
**Example:** `curl -i -X POST '<REST SERVICE IP>:8080/trips?pretty' -d 'name=Im making a trip!'`<br />

___

#### Rename a trip<br />
> **PUT** `/trips/{trip_id}/?name={name}`<br />

| Param Name | Description          |
| ------------- | ----------- |
| `trip_id`      | The trip's id.|
| `name`      | The trip's new name.|
**Example:** `curl -i -X PUT '<REST SERVICE IP>:8080/trips/1?pretty' -d 'name=My Cool New Name'`<br />
___

#### Delete a flight for a trip<br />
> **DELETE** `/trips/{trip_id}/flight/{flight_id}`<br />

| Param Name | Description          |
| ------------- | ----------- |                                              
| `trip_id`      | The trip id.|
| `flight_id`      | The flight id associate to the trip.|
**Example:** `curl -i -X DELETE '<REST SERVICE IP>:8080/trips/1/flights/1?pretty'`<br />
___

#### Add a flight to a trip<br />
> **POST** `/trips/{trip_id}/flights/{origin_id}/{destination_id}`<br />

| Param Name | Description          |
| ------------- | ----------- |
| `trip_id`      | The trip's id.|
| `origin_id`      | The origin airport id.|
| `destination_id`      | The destination airport id.|
**Example:** `curl -i -X POST '<REST SERVICE IP>:8080/trips/1/flights/6/5?pretty'`<br />
___

#### Delete a trip (and associated flights)<br />
> **DELETE** `/trips/{trip_id}`<br />

| Param Name | Description          |
| ------------- | ----------- |
| `trip_id`      | The trip's id.|
**Example:** `curl -i -X DELETE '<REST SERVICE IP>:8080/trips/1?pretty'`<br />


### Installation

From your terminal, execute the following commands:

1. `git clone https://github.com/aviaialon/FlightHubTripBuilderApi.git`
2. `cd FlightHubTripBuilderApi`
3. `composer install`
4. edit `/app/config/database.php` to add the database connection info.
5. `php artisan migrate`
6. `php artisan db:seed`
7. `php artisan serve --port 8080`

The service should then be running and ready for use.

### Still to do
**TESTS**!!! - These should have been done **BEFORE** writing a single line of code, but because of lack of time.. (not making excuses.. just sayin..)

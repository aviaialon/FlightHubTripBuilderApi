## Synopsis
A simple RESTFul API to manage trips

## RESTful URLs
### List all airports (Ordered alphabeticaly by city and name):
**GET** `/airports/list`
**Example:** `curl -i -X GET <REST SERVICE IP>:8080/airports/list`

### List all flights associated to a trip:
**GET** `/trips/{trip_id}/flights`
**{trip_id}** is the trip's primary key
**Example:** `curl -i -X GET <REST SERVICE IP>:8080/trips/1/flights`

### Create a new trip
**POST** `/trips/{trip_name}`
**{trip_name}** (Optional) The trips name
**Example:** `curl -i -X POST <REST SERVICE IP>:8080/trips/My cool new trip`

### Rename a trip
**PUT** `/trips/{trip_id}/{trip_name}`
**{trip_id}** is the trip's primary key
**{trip_name}** is the trip's new name
**Example:** `curl -i -X PUT <REST SERVICE IP>:8080/trips/1/i want this name`

### Delete a flight for a trip
**DELETE** `/trips/{trip_id}/flight/{flight_id}`
**{trip_id}** is the trip's primary key
**{flight_id}** is the flight id associate to the trip
**Example:** `curl -i -X DELETE <REST SERVICE IP>:8080/trips/1/flight/1`

### Add a flight to a trip
**POST** `/trips/{trip_id}/flights/{origin_id}/{destination_id}`
**{trip_id}** is the trip's primary key
**{origin_id}** is the origin airport id
**{destination_id}** is the destination airport id
**Example:** `curl -i -X POST <REST SERVICE IP>:8080/trips/1/flight/6/5`

### Delete a trip (and associated flights)
**DELETE** `/trips/{trip_id}`
**{trip_id}** The trip id
**Example:** `curl -i -X DELETE <REST SERVICE IP>:8080/trips/1`


### Installation

From your terminal, execute the following commands:

1. `git clone https://github.com/aviaialon/FlightHubTripBuilderApi.git`
2. `cd FlightHubTripBuilderApi`
3. `composer install`
4. edit **/FlightHubTripBuilderApi/app/config/database.php** to add the database connection info.
5. `php artisan migrate`
6. `php artisan db:seed`
7. `php artisan serve --port 8080`

The service should then be running and ready for use.

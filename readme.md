## Synopsis
A simple RESTFul API to manage trips

## RESTful URLs
### List all airports (Ordered alphabeticaly by city and name):<br />
**GET** `/airports/list`<br />
**Example:** `curl -i -X GET <REST SERVICE IP>:8080/airports/list`<br />

### List all flights associated to a trip:<br />
**GET** `/trips/{trip_id}/flights`<br />
**{trip_id}** is the trip's primary key<br />
**Example:** `curl -i -X GET <REST SERVICE IP>:8080/trips/1/flights`<br />

### Create a new trip<br />
**POST** `/trips/{trip_name}`<br />
**{trip_name}** (Optional) The trips name<br />
**Example:** `curl -i -X POST <REST SERVICE IP>:8080/trips/My cool new trip`<br />

### Rename a trip<br />
**PUT** `/trips/{trip_id}/{trip_name}`<br />
**{trip_id}** is the trip's primary key<br />
**{trip_name}** is the trip's new name<br />
**Example:** `curl -i -X PUT <REST SERVICE IP>:8080/trips/1/i want this name`<br />

### Delete a flight for a trip<br />
**DELETE** `/trips/{trip_id}/flight/{flight_id}`<br />
**{trip_id}** is the trip's primary key<br />
**{flight_id}** is the flight id associate to the trip<br />
**Example:** `curl -i -X DELETE <REST SERVICE IP>:8080/trips/1/flight/1`<br />

### Add a flight to a trip<br />
**POST** `/trips/{trip_id}/flights/{origin_id}/{destination_id}`<br />
**{trip_id}** is the trip's primary key<br />
**{origin_id}** is the origin airport id<br />
**{destination_id}** is the destination airport id<br />
**Example:** `curl -i -X POST <REST SERVICE IP>:8080/trips/1/flight/6/5`<br />

### Delete a trip (and associated flights)<br />
**DELETE** `/trips/{trip_id}`<br />
**{trip_id}** The trip id <br />
**Example:** `curl -i -X DELETE <REST SERVICE IP>:8080/trips/1`<br />


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

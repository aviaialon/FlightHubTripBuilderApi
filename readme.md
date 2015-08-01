## URLS
GET    /airports/list					List all airports
GET    /trips/{trip id}/flights				List all flights for a trip
POST   /trips/{trip name}				Create a trip
PUT    /trips/{trip id}/My new name			rename a trip
DELETE /trips/{trip id}/flight/{flight id}		delete a flight
POST   /trips/{trip id}/flights/{originId}/{destId}	add a flight to a trip
DELETE /trips/{trip id}					delete a trip

## STEPS
git clone
cd FlightHubTripBuilderApi
composer install
edit /FlightHubTripBuilderApi/app/config/database.php (add the database connection info)
php artisan migrate
php artisan db:seed

php artisan serve --host 192.168.2.15 --port 8080

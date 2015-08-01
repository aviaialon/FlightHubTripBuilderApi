<?php 
/**
 * IOC Bindings
 */
App::bind('\\App\\Repositories\\AirportInterface', '\\App\\Repositories\\Airport');
App::bind('\\App\\Repositories\\TripInterface', '\\App\\Repositories\\Trip');
App::bind('\\App\\Repositories\\FlightInterface', '\\App\\Repositories\\Flight');
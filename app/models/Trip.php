<?php
/**
 * Trip model
 *
 * @namespace    App\Models
 * @package      App
 * @subpackage   Models
 * @author       Avi Aialon <aviaialon@gmail.com>
 *
 */
namespace App\Models;

use Eloquent;

/**
 * Trip model
 *
 * @package    App
 * @subpackage Models
 * @author     Avi Aialon <aviaialon@gmail.com>
 * @license    GNU General Public License, version 3
 */


class Trip extends Eloquent
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'trip';
	
	/**
	 * Fillable fields
	 *
	 * @var array
	 */
	protected $fillable = ['name'];
	
	/**
	 * Guarded fields
	 * 
	 * @var array
	 */
	protected $guarded = ['id'];
	
	/**
	 * Timestamp (updated_at, created_at)
	 *
	 * @var boolean
	 */
	public $timestamps = false;

	/**
	 * Get the flights for a trip
	 *
	 * @return \App\Model\Flight[]
	 */
	public function flights()
	{
		return $this->hasMany('App\\Models\\Flight', 'tripId');
	}
	
	/**
	 * Removes a flight from the current trip
	 *
	 * @param  integer $flightId The flight id to detach
	 * @return boolean
	 */
	public function removeFlight($flightId)
	{
		return (bool) $this->flights()->where(array(
			'flight.id' => (int) $flightId
		))->delete();
	}
	
	/**
	 * gets the airport list for the current trip
	 *
	 * @return array
	 */
	public function getFlightAirports()
	{
		$airports = array();
		
		foreach ($this->flights()->get() as $flight) {
			$airports[] = array(
				'flight_id'	  => $flight->id,
				'origin' 	  => $flight->originAirport()->get(),
				'destination' => $flight->destinationAirport()->get()
			);
		}
		
		return $airports;
	}
	
	/**
	 * Checks if a trips has a flight with origin and dest airport scheduled
	 *
	 * @param  \App\Models\Airport $originAirport      The origin airport
	 * @param  \App\Models\Airport $destinationAirport The destination airport
	 * @return boolean
	 */
	public function flightExists(\App\Models\Airport $originAirport, \App\Models\Airport $destinationAirport)
	{
		return (bool) $this->flights()->where(array(
			'flight.originAirportId' => (int) $originAirport->id,
			'flight.destAirportId'   => (int) $destinationAirport->id
		))->count();
	}
	
	/**
	 * Adds a flight to a trip
	 *
	 * @param  \App\Models\Airport $originAirport      The origin airport
	 * @param  \App\Models\Airport $destinationAirport The destination airport
	 * @return boolean
	 */
	public function addFlight(\App\Models\Airport $originAirport, \App\Models\Airport $destinationAirport)
	{
		$flight = new \App\Models\Flight(array(
			'originAirportId' => (int) $originAirport->id,
			'destAirportId'   => (int) $destinationAirport->id
		));
		
		return $this->flights()->save($flight);
	}
}

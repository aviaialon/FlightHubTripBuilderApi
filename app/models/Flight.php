<?php
/**
 * Flight model
 *
 * @namespace    App\Models
 * @package      App
 * @subpackage   Models
 * @author       Avi Aialon <aviaialon@gmail.com>
 *
 */
namespace App\Models;

use Eloquent;
use DB;

/**
 * Flight model
 *
 * @package    App
 * @subpackage Models
 * @author     Avi Aialon <aviaialon@gmail.com>
 * @license    GNU General Public License, version 3
 */
class Flight extends Eloquent
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'flight';
	
	/**
	 * Fillable fields
	 *
	 * @var array
	 */
	protected $fillable = ['tripId', 'originAirportId', 'destAirportId'];
	
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
	 * Associates the origin airport
	 * 
	 * @param  \App\Models\Airport $airport The origin airport
	 * @return void
	 */
	public function setOrigin(\App\Models\Airport $airport)
	{
		$this->originAirport->associate($airport);
	}
	
	/**
	 * Associates the destination airport
	 *
	 * @param  \App\Models\Airport $airport The origin airport
	 * @return void
	 */
	public function setDestination(\App\Models\Airport $airport)
	{
		$this->destAirport->associate($airport);
	}
	
	/**
	 * get the trip
	 * 
	 * @return \App\Models\Trip
	 */
	public function trip()
	{
		return $this->hasOne('App\\Models\\Trip', 'trip', 'id', 'id');
	}
	
	/**
	 * get the origin airport
	 *
	 * @return \App\Models\Airport
	 */
	public function originAirport()
	{
		return $this->_getAirport('originAirportId');
	}
	
	/**
	 * get the destination airport
	 *
	 * @return \App\Models\Airport
	 */
	public function destinationAirport()
	{
		return $this->_getAirport('destAirportId');
	}
	
	/**
	 * Gets the associated airport
	 * 
	 * @param  string $scope
	 * @return \App\Models\Airport
	 */
	private function _getAirport($scope)
	{
		return $this->hasOne('App\\Models\\Airport', 'id', $scope);
	}
}

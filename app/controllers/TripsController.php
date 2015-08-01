<?php
/**
 * Trips Controller
 */

class TripsController extends BaseController 
{
	/**
	 * Trips repository
	 * 
	 * @var \App\RepositoriesAirportInterface
	 */
	private $_tripsRepo;
	
	/**
	 * Class constructor
	 * 
	 * @param App\Repositories\FlightsInterface $tripsRepo
	 */
	public function __construct(App\Repositories\TripInterface $tripsRepo)
	{
		$this->_tripsRepo = $tripsRepo;
	}
	
	/**
	 * Creates a new trip
	 * 
	 * @param  string $tripName (Optional) The trip name
	 * @return void
	 */
	public function create($tripName = null)
	{
		if (preg_match('/[^a-zA-Z\d\s-_]/', $tripName) === 1) {
			$this->respond(array(), 400, 'Your trip name contains invalid characters.');
		}
		
		if (strlen($tripName) > 255) {
			$this->respond(array(), 400, 'Your trip is too long, please limit it 250 characters.');
		}
		
		$this->respond($this->_tripsRepo->create($tripName));
	}
	
	/**
	 * Renames a trip
	 *
	 * @param  integer $tripId   The trip id
	 * @param  string  $tripName The new trip name
	 * @return void
	 */
	public function edit($tripId, $tripName)
	{
		/* @var $trip \App\Models\Trip */
		$trip = $this->_tripsRepo->getById($tripId);
		$data = array();
		
		if (empty($trip) === true) {
			$this->respond($data, 400, 'Invalid trip selected');
		}
		
		$trip->name = $tripName;
		$trip->save();
		
		$this->respond($trip);
	}
	
	/**
	 * Delete a trip
	 *
	 * @param  integer $tripId The trip id
	 * @return void
	 */
	public function delete($tripId)
	{
		/* @var $trip \App\Models\Trip */
		$trip = $this->_tripsRepo->getById($tripId);
		$data = array('deleted' => false);
		
		if (empty($trip) === true) {
			$this->respond($data, 400, 'Invalid trip selected');
		}
		
		$this->respond(array(
			'deleted' => $trip->delete()
		));
	}
}
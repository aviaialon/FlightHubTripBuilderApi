<?php
/**
 * Flights Controller
 */

class FlightsController extends BaseController 
{
	/**
	 * Trips repository
	 * 
	 * @var \App\Repositories\AirportInterface
	 */
	private $_tripsRepo;
	
	/**
	 * Flights repository
	 *
	 * @var \App\Repositories\FlightInterface
	 */
	private $_flightsRepo;
	
	/**
	 * Airport repository
	 *
	 * @var \App\Repositories\AirportInterface
	 */
	private $_airportsRepo;
	
	/**
	 * Class constructor
	 * 
	 * @param App\Repositories\FlightsInterface $tripsRepo
	 */
	public function __construct(App\Repositories\TripInterface $tripsRepo, 
				App\Repositories\FlightInterface $flightsRepo,
				App\Repositories\AirportInterface $airportRepo)
	{
		$this->_tripsRepo    = $tripsRepo;
		$this->_flightsRepo  = $flightsRepo;
		$this->_airportsRepo = $airportRepo;
	}
	
	/**
	 * Lists the flights for a trip
	 * 
	 * @param  integer $tripId The associated trip id
	 * @return void
	 */
	public function flights($tripId)
	{
		/* @var $trip \App\Models\Trip */
		$trip = $this->_tripsRepo->getById($tripId);
		$data = array();
		
		if (empty($trip) === true) {
			$this->respond($data, 400, 'Invalid trip selected');
		}
		
		$data['flights'] = $trip->getFlightAirports();
		
		$this->respond($data);
	}
	
	/**
	 * Removes a flight for a trip
	 *
	 * @param  integer $tripId   The associated trip id
	 * @param  integer $flightId The associated flight id
	 * @return void
	 */
	public function delete($tripId, $flightId)
	{
		/* @var $trip \App\Models\Trip */
		$trip = $this->_tripsRepo->getById($tripId);
		$data = array();
		
		if (empty($trip) === true) {
			$this->respond($data, 400, 'Invalid trip selected');
		}

		$this->respond(array(
			'removed' => $trip->removeFlight($flightId),	
			'flights' => $trip->getFlightAirports()
		));
	}
	
	/**
	 * Adds a fligt to a trip
	 * 
	 * @param integer $tripId        The trip id
	 * @param integer $originId      The origin airport id
	 * @param integer $destinationId The destination airport id
	 */
	public function addFlight($tripId, $originId, $destinationId)
	{
		/* @var $trip \App\Models\Trip */
		/* @var $originAirport \App\Models\Airport */
		/* @var $destAirport \App\Models\Airport */
		$trip          = $this->_tripsRepo->getById((int) $tripId);
		$originAirport = $this->_airportsRepo->getById((int) $originId);
		$destAirport   = $this->_airportsRepo->getById((int) $destinationId);
		$data          = array(
			'added'   => false,
			'flights' => $trip->getFlightAirports()
		);
		
		if (empty($trip) === true) {
			$this->respond($data, 400, 'Invalid trip selected');
		}
		
		if (empty($originAirport) === true) {
			$this->respond($data, 400, 'Invalid origin airport selected');
		}
		
		if (empty($destAirport) === true) {
			$this->respond($data, 400, 'Invalid destination airport selected');
		}
		
		if ($originAirport->id === $destAirport->id) {
			$this->respond($data, 400, 'Origin airport and destination airport cannot be the same.');
		}
		
		if (true === $trip->flightExists($originAirport, $destAirport)) {
			$this->respond($data, 400, 'This trip already has this flight scheduled.');
		}
		
		$flight = $trip->addFlight($originAirport, $destAirport);
		
		$this->respond(array(
			'added'   => (empty($flight) === false),
			'flights' => $trip->getFlightAirports()
		));
	}
}
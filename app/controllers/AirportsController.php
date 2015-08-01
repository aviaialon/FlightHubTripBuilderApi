<?php
/**
 * Airports Controller
 */

class AirportsController extends BaseController 
{
	/**
	 * Airport repository
	 * 
	 * @var \App\RepositoriesAirportInterface
	 */
	private $_airportRepo;
	
	/**
	 * Class constructor
	 * 
	 * @param App\Repositories\AirportInterface $airportRepo
	 */
	public function __construct(App\Repositories\AirportInterface $airportRepo)
	{
		$this->_airportRepo = $airportRepo;
	}
	
	/**
	 * List action - lists airports in alphabetical order
	 */
	public function all()
	{
		$this->respond($this->_airportRepo->getAll());
	}
}
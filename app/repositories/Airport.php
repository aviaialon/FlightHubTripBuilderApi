<?php
/**
 * Airport Repo
 *
 * @namespace    App\Repositories
 * @package      App
 * @subpackage   Repositories
 * @author       Avi Aialon <aviaialon@gmail.com>
 *
 */
namespace App\Repositories;

use Cache;

/**
 * Airport Repo
 *
 * @package    App
 * @subpackage Repositories
 * @author     Avi Aialon <aviaialon@gmail.com>
 * @license    GNU General Public License, version 3
 */

class Airport
	extends RepositoryBase implements AirportInterface
{
	/**
	 * Returns the record by id
	 *
	 * @param  integer $id
	 * @return \App\Models\Trip
	 */
	public function getById($id)
	{
		return \App\Models\Airport::find((int) $id);
	}
	
	/**
	 * Gets all the available airports
	 * 
	 * @return \App\Models\Airport[]
	 */
	public function getAll()
	{
		return Cache::remember('airports', 2, function() {
		    return \App\Models\Airport::orderBy('city', 'ASC')->orderBy('name', 'ASC')->get(array('*'));
		});
	}
	
	/**
	 * Gets an airport by code
	 * 
	 * @param  string $code The airport code
	 * @return Illuminate\Database\Query\Buildert
	 */
	public function getByCode($code)
	{
		return \App\Models\Airport::where('code', '=', $code);
	}
}
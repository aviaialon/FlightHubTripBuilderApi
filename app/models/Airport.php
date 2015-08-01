<?php
/**
 * Airport model
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
 * Airport model
 *
 * @package    App
 * @subpackage Models
 * @author     Avi Aialon <aviaialon@gmail.com>
 * @license    GNU General Public License, version 3
 */
class Airport extends Eloquent
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'airport';
	
	
	/**
	 * Fillable fields
	 * 
	 * @var array
	 */
	protected $fillable = ['code', 'name', 'city'];
	

	/**
	 * Timestamp (updated_at, created_at)
	 *
	 * @var boolean
	 */
	public $timestamps = false;
}

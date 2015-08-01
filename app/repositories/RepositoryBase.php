<?php
/**
 * Base Repo class
 *
 * @namespace    App\Repositories
 * @package      App
 * @subpackage   Repositories
 * @author       Avi Aialon <aviaialon@gmail.com>
 *
 */
namespace App\Repositories;

/**
 * Base Repo class
 *
 * @package    App
 * @subpackage Repositories
 * @author     Avi Aialon <aviaialon@gmail.com>
 * @license    GNU General Public License, version 3
 */
abstract class RepositoryBase
{
	/**
	 * Magic mutator method for finding by column. Just cause im lazy to write the \App\Models\MyModel::where('foo', '=', 'bar')->get()
	 * 
	 * @param  string $functionName The getter called
	 * @param  array  $arguments    The arguments
	 * @return Illuminate\Database\Query\Builder
	 */
	/*
	public function __call($functionName, array $arguments)
	{
		$model  = sprintf('\\App\Models\\%s', (new \ReflectionClass(get_called_class()))->getShortName());
		
		$column = strtolower(ltrim($functionName, 'getBy'));
		array_unshift($arguments, $column, '=');

		return call_user_func_array(array($model, 'where'), $arguments);
	}
	*/
}
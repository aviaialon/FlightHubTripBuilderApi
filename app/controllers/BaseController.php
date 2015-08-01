<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}
	
	/**
	 * Responds to the api call in JSON format
	 *
	 * @param mixed   $data       (Optional) Output data
	 * @param integer $httpStatus (Optional) http status code
	 * @param string  $message    (Optional) Output message to the consumer
	 */
	public function respond($data = null, $httpStatus = 200, $message = '')
	{
		$response = array(
				'status'  => $httpStatus,
				'error'   => 200 <> (int) $httpStatus,
				'message' => $message,
				'data'    => $data
		);
		
		$pretty = null;
		if (true === isset($_GET['pretty'])) {
			$pretty = JSON_PRETTY_PRINT;
		}

		Response::json($response, (int) $httpStatus, array(), $pretty)->send();
		exit();
	}
}

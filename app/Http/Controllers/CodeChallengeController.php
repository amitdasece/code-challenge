<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Exception;
use Illuminate\Support\Facades\DB;
use Validator;

// class that extends the main API controller class ///

class CodeChallengeController extends ApiController
{
	public function codeChallenge(Request $request)
	{
		
		 // Function to print the desired output using the given input (RAW JSON data) //
		
		$json = $request->getContent();
		$params = json_decode($json, true); 
		$rate = $params['rate'];
		$cdr = $params['cdr'];
		
		// Declare and define validation rules //
		
		$data = [
               'energy'    		=> $rate['energy'],
			   'time'    		=> $rate['time'],
			   'transaction'    => $rate['transaction'],
			   'meterStart'    	=> $cdr['meterStart'],
			   'meterStop'    	=> $cdr['meterStop'],
			   'timestampStart' => $cdr['timestampStart'],
			   'timestampStop'  => $cdr['timestampStop'],
            ];

		$validator = Validator::make($data,[
			'energy'      		=> 'required|numeric',
			'time'        		=> 'required|numeric',
			'transaction' 		=> 'required|numeric',
			'meterStart' 		=> 'required|numeric',
			'meterStop' 		=> 'required|numeric|after_or_equal:meterStart',
			'timestampStart'  	=> 'required|date',
			'timestampStop'    	=> 'required|date|after_or_equal:timestampStart'
		]);
		
		
		
		 if ($validator->fails()) {
			  // all errors are logged in laravel log file //
			  
			  \Log::info(1, [$validator->errors()]);			  
			  return $this->sendError($validator->errors());
         }
		 else {
			try{	
				if(!empty($rate) && !empty($cdr))	{
				
				// Declare Variable and assign value //
				
					$energy = $rate['energy'];
					$time = $rate['time'];
					$transaction = $rate['transaction'];
					$meterStart = $cdr['meterStart'];
					$meterStop = $cdr['meterStop'];
					
					// Code to calculate difference between start and stop timestamps and convert in hours, minutes and seconds using standard timezone //
					
					$timestampStart  = new Carbon($cdr['timestampStart']);
					$timestampStop   = new Carbon($cdr['timestampStop']);
					$meterDiff = $meterStop-$meterStart;
					$interval = $timestampStart->diff($timestampStop);
					
					$hrs = $interval->format('%H');
					$mins = $interval->format('%i');
					$secs = $interval->format('%s');
					$totHrs = round(($hrs+($mins/60)+($secs/3600)),3);
					
					$totEnergy = round(($energy*($meterDiff/1000)),3);
					$totTime = round(($time*$totHrs),3);
					
					// calculate the overall Charging Process Rating //
					
					$overall = round(($totEnergy+$totTime+$transaction),2);
					
					// assigning the components based on the desired output //
					
					$components = array("energy" => $totEnergy, "time" => $totTime, "transaction" => $transaction);
					return $this->sendResponse(
						[
							'overall' => $overall,
							'components' => $components
						]
					);
					
				}
		 
				else {
					// all errors are logged in laravel log file //
					
					\Log::info(1, ['Rate & CDR not Present!!']);
					return $this->sendError('Rate & CDR not Present!!');					
				}
			}
			catch (Exception $e) {
				// all errors are logged in laravel log file //
				
				\Log::info(1, [$e->getMessage()]);				
				return $this->sendError($e->getMessage());
			}
		}
	}
	
	
	
	/**
        * @OA\Post(
        * path="/api/V1/codeChallengeFormData",
        * operationId="codeChallengeFormData",
        * tags={"codeChallengeFormData"},
        * summary="codeChallengeFormData",
        * description="codeChallengeFormData",
        *     @OA\RequestBody(
        *         @OA\JsonContent(),
        *         @OA\MediaType(
        *            mediaType="multipart/form-data",
        *            @OA\Schema(
        *               type="object",
        *               required={"energy", "time","transaction"},
        *               @OA\Property(property="energy", type="integer"),
        *               @OA\Property(property="time", type="integer"),
						@OA\Property(property="transaction", type="integer")
        *            ),
        *        ),
        *    ),
        *      @OA\Response(
        *          response=201,
        *          description="output Successfully",
        *          @OA\JsonContent()
        *       ),
        *      @OA\Response(
        *          response=200,
        *          description="output Successfully",
        *          @OA\JsonContent()
        *       ),
        *      @OA\Response(
        *          response=422,
        *          description="Unprocessable Entity",
        *          @OA\JsonContent()
        *       ),
        *      @OA\Response(response=400, description="Bad request"),
        *      @OA\Response(response=404, description="Resource Not Found"),
        * )
        */
	
	
	
	
	public function codeChallengeFormData(Request $request)
	{
		
		// Function to print the desired output using the given input (FORM data with key and value pair) //
		
		// Declare Variable and assign value //
		
		$energy = $request->energy;
		$time = $request->time;
		$transaction = $request->transaction;
		$meterStart = $request->meterStart;
		$meterStop = $request->meterStop;
		$timestampStart = $request->timestampStart;
		$timestampStop = $request->timestampStop;
		
		// Declare and define validation rules //
		
		$data = [
               'energy'    		=> $energy,
			   'time'    		=> $time,
			   'transaction'    => $transaction,
			   'meterStart'    	=> $meterStart,
			   'meterStop'    	=> $meterStop,
			   'timestampStart' => $timestampStart,
			   'timestampStop'  => $timestampStop,
            ];

		$validator = Validator::make($data,[
			'energy'      		=> 'required|numeric',
			'time'        		=> 'required|numeric',
			'transaction' 		=> 'required|numeric',
			'meterStart' 		=> 'required|numeric',
			'meterStop' 		=> 'required|numeric|after_or_equal:meterStart',
			'timestampStart'  	=> 'required|date',
			'timestampStop'    	=> 'required|date|after_or_equal:timestampStart'
		]);
		
		 if ($validator->fails()) {
			  
			   // all errors are logged in laravel log file //
			  
			  \Log::info(1, [$validator->errors()]);			  
			  return $this->sendError($validator->errors());
         }
		 else {
			try{	
					// Code to calculate difference between start and stop timestamps and convert in hours, minutes and seconds using standard timezone //
					
					$timestampStart  = new Carbon($timestampStart);
					$timestampStop   = new Carbon($timestampStop);
					$meterDiff = $meterStop-$meterStart;
					$interval = $timestampStart->diff($timestampStop);
					
					$hrs = $interval->format('%H');
					$mins = $interval->format('%i');
					$secs = $interval->format('%s');
					$totHrs = round(($hrs+($mins/60)+($secs/3600)),3);
					
					$totEnergy = round(($energy*($meterDiff/1000)),3);
					$totTime = round(($time*$totHrs),3);
					
					// calculate the overall Charging Process Rating //
					
					$overall = round(($totEnergy+$totTime+$transaction),2);
					
					// assigning the components based on the desired output //
					
					$components = array("energy" => $totEnergy, "time" => $totTime, "transaction" => $transaction);
					return $this->sendResponse(
						[
							'overall' => $overall,
							'components' => $components
						]
					);
			}
			catch (Exception $e) {
				// all errors are logged in laravel log file //
				
				\Log::info(1, [$e->getMessage()]);	
				return $this->sendError($e->getMessage());
			}
		}
	}
}
?>
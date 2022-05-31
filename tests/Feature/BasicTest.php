<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BasicTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return desired output
     */
   
	public function test_code()
    {
		
		// Sample input data which we can change to get the desired output //
		
		$data = [
			"rate" => array(
				"energy" => 0.3,
				"time" => 2,
				"transaction" => 1
			),
			"cdr" => array(
				"meterStart" => 1204307,
				"timestampStart" => "2021-04-05T10:04:00Z",
				"meterStop" => 1215230,
				"timestampStop" => "2021-04-05T11:27:00Z"
		)];
		
		// calling the actual function to get the output //
		
		$response = $this->json('POST', '/api/V1/codeChallenge',$data);
		
		// Test Response are logged in laravel log file //
		
		\Log::info(1, [$response->getContent()]);
		
		// output the tests passes with status along with time//
		
		$response->assertStatus(200);
		
		// check whether the output has all the required array and keys as defined in the response structure //
		
		$response->assertJsonStructure($this->getResponseStructure(
			[
				'overall',
				'components' => ['energy','time','transaction'],
			],
		));
		
		// check whether the output has all the correct calculations with exact matching as defined in the response structure //		
		
		$outputArray = [
   		"success" => true, 
		   "data" => [
				 "overall" => 7.04, 
				 "components" => [
					"energy" => 3.277, 
					"time" => 2.766, 
					"transaction" => 1 
				 ] 
			  ], 
		   "message" => "OK" 
		]; 
		$response->assertJson($outputArray);
    }
}

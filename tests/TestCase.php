<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
	
	/**
     * response method.
     *
     * @param $result
     * @param $message
     *
     * @return JsonResponse
     */
	
	public function getResponseStructure($data)
    {
        return array_merge([
            'success',
            'message',
        ], ['data' => $data]);
    }
}

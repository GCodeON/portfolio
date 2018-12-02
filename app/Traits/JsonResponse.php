<?php namespace App\Traits;

trait JsonResponse
{
    protected function ok($data)
    {
        $responseData = array_merge($data, [
            'ok' => true
        ]);

        return response()->json($responseData);

    }

    protected function fail($message)
    {
        return response()->json([
            'ok' => false,
            'error' => $message
        ]);
    }


}
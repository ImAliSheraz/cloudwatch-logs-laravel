<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Log;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Example method to log different messages.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logExamples(Request $request)
    {

        // If Log Channel set in .env

        // Log an info message
        Log::info('This is an info message.');

        // Log a warning message
        Log::warning('This is a warning message.');

        // Log an error message with additional context
        $userId = auth()->id();
        Log::error('Error occurred for user ' . $userId, ['request' => $request->all()]);

        // Log a debug message
        Log::debug('This is a debug message.');

        // Log a custom log level message
        Log::log('custom', 'This is a custom log level message.');


        // If Log Channel not set in .env

        // Log an info message
        Log::channel('cloudwatch')->info('This is an info message.');

        // Log a warning message
        Log::channel('cloudwatch')->warning('This is a warning message.');

        // Log an error message with additional context
        $userId = auth()->id();
        Log::channel('cloudwatch')->error('Error occurred for user ' . $userId, ['request' => $request->all()]);

        // Log a debug message
        Log::channel('cloudwatch')->debug('This is a debug message.');

        // Log a custom log level message
        Log::channel('cloudwatch')->log('custom', 'This is a custom log level message.');

        // Return a response
        return response()->json(['message' => 'Examples logged successfully.']);
    }
}

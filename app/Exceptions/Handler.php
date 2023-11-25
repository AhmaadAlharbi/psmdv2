<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Swift_TransportException;

class Handler extends ExceptionHandler
{
    public function render($request, Throwable $e)
    {
        // Check if it's a Swift_TransportException
        if ($e instanceof Swift_TransportException) {
            // Log the error
            \Log::error('Error sending email: ' . $e->getMessage());

            // Show a custom error message and redirect to the index page
            return redirect()->route('dashboard.userIndex')->with('error', 'An issue occurred while attempting to send the email. However, your data has been successfully saved.');
        }

        // Continue with the default Laravel exception handling
        return parent::render($request, $e);
    }
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
}

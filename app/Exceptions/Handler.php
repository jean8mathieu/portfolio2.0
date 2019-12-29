<?php

namespace App\Exceptions;

use App\Notifications\ExceptionHandlerNotification;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Prophecy\Exception\Doubler\MethodNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Exception
     */
    public function render($request, Exception $exception)
    {
        //API
        if (request()->is('api') || request()->is('api/*')) {
            //dd(get_class($exception));
            if ($exception instanceof NotFoundException
                || $exception instanceof ModelNotFoundException
                || $exception instanceof NotFoundHttpException
            ) {
                return response()->json([
                    'error' => true,
                    'message' => 'We could not find what you want. Please try again...'
                ], 404);
            }
            if ($exception instanceof MethodNotFoundException) {
                return response()->json([
                    'error' => true,
                    'message' => 'You\'re not allowed to use this method...'
                ], 500);
            }

            if ($exception instanceof AuthenticationException) {
                return response()->json([
                    'error' => true,
                    'message' => "You're currently not logged in... Please log in on the website and try again."
                ], 403);
            }

            if ($exception instanceof AuthorizationException) {
                return response()->json([
                    'error' => true,
                    'message' => "You do not have permission to access this...",
                ], 403);
            }

            /*return response()->json([
                'error' => true,
                'message' => 'Something went wrong... Please try again later :)'
            ], 500);*/
        }

        return parent::render($request, $exception);
    }
}

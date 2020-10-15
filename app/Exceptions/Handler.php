<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Bugsnag\BugsnagLaravel\Facades\Bugsnag;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use PDOException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Config;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
        Bugsnag::notifyException($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     */
    public function render($request, Exception $exception)
    {
        // if($exception instanceof NotFoundHttpException){
        //     return returnResponse([Config::get('responsecode.error.notFound')], false, 404);
        // }

        // if($exception instanceof PDOException){
        //     return serverError($exception);
        // }

        // if($exception instanceof QueryException){
        //     return serverError($exception);
        // }

        // return serverError($exception);

        return parent::render($request, $exception);
    }
}

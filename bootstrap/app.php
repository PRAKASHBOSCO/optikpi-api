<?php

require_once __DIR__.'/../vendor/autoload.php';

(new Laravel\Lumen\Bootstrap\LoadEnvironmentVariables(
    dirname(__DIR__)
))->bootstrap();

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| Here we will load the environment and create the application instance
| that serves as the central piece of this framework. We'll use this
| application as an "IoC" container and router for this framework.
|
*/

$app = new Laravel\Lumen\Application(
    dirname(__DIR__)
);

// $app->register(Jenssegers\Mongodb\MongodbServiceProvider::class);

 $app->withFacades();

 $app->withEloquent();

/*
|--------------------------------------------------------------------------
| Register Container Bindings
|--------------------------------------------------------------------------
|
| Now we will register a few bindings in the service container. We will
| register the exception handler and the console kernel. You may add
| your own bindings here if you like or you can make another file.
|
*/

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);

/*
|--------------------------------------------------------------------------
| Register Middleware
|--------------------------------------------------------------------------
|
| Next, we will register the middleware with the application. These can
| be global middleware that run before and after each request into a
| route or middleware that'll be assigned to some specific routes.
|
*/

$app->middleware([
    LumenMiddlewareTrimOrConvertString\TrimStrings::class,
    LumenMiddlewareTrimOrConvertString\ConvertEmptyStringsToNull::class,
 ]);

$app->routeMiddleware([
    // 'maintainanceMode'  => App\Http\Middleware\CheckMaintananceMode::class,
    // 'hashCheck'         => App\Http\Middleware\HashCheckMiddleware::class,
    'auth'              => App\Http\Middleware\Authenticate::class,
    // 'ipcheck'           => App\Http\Middleware\IpMiddleware::class,
    // 'authUser'          => App\Http\Middleware\UserAuthenticateMiddleware::class,
    // 'csp'               => App\Http\Middleware\ContentSecurityPolicyHeaders::class,
    // 'noCache'           => App\Http\Middleware\NoCache::class,
    // 'securityHeaders'   => App\Http\Middleware\SecurityHeaders::class,
    // 'throttleRequests'  => App\Http\Middleware\ThrottleRequests::class,
    // 'responseHeader'    => App\Http\Middleware\ResponseHeaderMiddleware::class,
    // 'trustedHandshake'  => App\Http\Middleware\TrustedHandshakeMiddleware::class,
    // 'trustProxies'      => App\Http\Middleware\TrustProxies::class,
    // 'tracking'          => App\Http\Middleware\TrackingMiddleware::class,
    // 'versioning'        => App\Http\Middleware\Versioning::class,
]);

/*
|--------------------------------------------------------------------------
| Register Service Providers
|--------------------------------------------------------------------------
|
| Here we will register all of the application's service providers which
| are used to bind services into the container. Service providers are
| totally optional, so you are not required to uncomment this line.
|
*/

$app->register(App\Providers\AppServiceProvider::class);
$app->register(App\Providers\AuthServiceProvider::class);
$app->register(App\Providers\EventServiceProvider::class);
// $app->register(Illuminate\Mail\MailServiceProvider::class);
// $app->register(Illuminate\Redis\RedisServiceProvider::class);

$app->register(Bugsnag\BugsnagLaravel\BugsnagServiceProvider::class);

// $app->register(Orumad\ConfigCache\ServiceProviders\ConfigCacheServiceProvider::class);

// $app->register(Stevebauman\Location\LocationServiceProvider::class);
// $app->configure('location');

// $app->register(Fideloper\Proxy\TrustedProxyServiceProvider::class);
// $app->configure('trustedproxy');

/*
|--------------------------------------------------------------------------
| Load The Application Routes
|--------------------------------------------------------------------------
|
| Next we will include the routes file so that they can all be added to
| the application. This will provide all of the URLs the application
| can respond to, as well as the controllers that may handle them.
|
*/

$app->router->group([
    'namespace' => 'App\Http\Controllers',
], function ($router) {
    require __DIR__.'/../routes/web.php';
    require __DIR__.'/../routes/api.php';
});


/** Url Configuration
 * Author : Prakash
 */
// $app->configure('url');

/** Response Code Configuration
 * Author : Prakash
 */
$app->configure('responsecode');
$app->configure('responseMessages');

/** Session Configuration
 * Author : Prakash
 */
// $app->configure('session');

// $app->register(Illuminate\Session\SessionServiceProvider::class);

// $app->bind(Illuminate\Session\SessionManager::class, function ($app) {
//     return $app->make('session');
// });

// $app->middleware([
//     'Illuminate\Session\Middleware\StartSession'
// ]);

/** Mail Configuration
 * Author : Prakash
 */
// $app->configure('mail');
// $app->alias('mailer', Illuminate\Mail\Mailer::class);
// $app->alias('mailer', Illuminate\Contracts\Mail\Mailer::class);
// $app->alias('mailer', Illuminate\Contracts\Mail\MailQueue::class);

return $app;

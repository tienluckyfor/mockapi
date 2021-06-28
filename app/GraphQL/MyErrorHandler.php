<?php

namespace App\GraphQL;

use Closure;
use GraphQL\Error\Error;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Support\Arr;
use Nuwave\Lighthouse\Exceptions\RendersErrorsExtensions;
use Nuwave\Lighthouse\Execution\ErrorHandler;
use ErrorException;
/**
 * Report errors through the default exception handler configured in Laravel.
 */
class MyErrorHandler implements ErrorHandler
{
    /**
     * @var \Illuminate\Contracts\Debug\ExceptionHandler
     */
    protected $exceptionHandler;

    public function __construct(ExceptionHandler $exceptionHandler)
    {
        $this->exceptionHandler = $exceptionHandler;
    }

    public function __invoke(?Error $error, Closure $next): ?array
    {

        $underlyingException = $error->getPrevious();
        if ($underlyingException instanceof RendersErrorsExtensions) {
            try {
                $defaultMessage = Arr::first(Arr::first(Arr::first($underlyingException->extensionsContent())));
            } catch (ErrorException $e) {
                $defaultMessage = $error->getMessage();
            }
            $error = new Error(
                $defaultMessage,
                $error->nodes,
                $error->getSource(),
                $error->getPositions(),
                $error->getPath(),
                $underlyingException,
                $underlyingException->extensionsContent()
            );
        }
        return $next($error);
    }
}

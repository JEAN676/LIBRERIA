<?php

namespace App\Utils;
use Illuminate\Support\Facades\Log;
use ReflectionClass;

class LogHelper
{
    /**
     * Create a new class instance.
     */
    public static function logError($object, \Exception $e) {
        $reflector = new ReflectionClass($object);
        $className = $reflector->getShortName();
        $trace = debug_backtrace();
        $methodName = $trace[1]['function'];
 
        Log::Error("{$className}@{$methodName}: " . $e->getMessage());
    }

    public function __construct()
    {
        //
    }
}

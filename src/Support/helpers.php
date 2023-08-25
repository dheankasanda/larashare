<?php

use PsiMikroskil\Larashare\Http\Request;
use PsiMikroskil\Larashare\Support\Pagination;

if (!function_exists('get_class_name')) {
    /**
     * Get classname from given namespace
     *
     * @param string $called_class
     * @param string|null $separator
     * @return string
     */
    function get_class_name(string $called_class, ?string $separator = null): string
    {
        $namespace = explode('\\', $called_class);
        return explode($separator, array_pop($namespace))[0];
    }
}


if (!function_exists('camel_to_snake')) {
    /**
     * Convert camel case styling name to snake case
     *
     * @param string $word
     * @return string
     */
    function camel_to_snake(string $word): string
    {
        return strtolower(preg_replace("/([a-z])([A-Z])/", "$1_$2", $word));
    }
}

if (!function_exists('get_class_current_directory')) {
    /**
     * Ex: Level1/Level2/ClassName
     * This going to return Level2
     *
     * @param string $called_class
     * @return string
     */
    function get_class_current_directory(string $called_class): string
    {
        $namespace = explode('\\', $called_class);
        array_pop($namespace);
        return array_pop($namespace);
    }
}

if (!function_exists('paginate')) {
    /**
     * Paginate response
     *
     * @param Request $request
     * @param int $total
     * @return array|null
     */
    function paginate(Request $request, int $total): ?array
    {
        return Pagination::paginate($request, $total);
    }
}
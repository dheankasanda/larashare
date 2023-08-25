<?php

namespace PsiMikroskil\Larashare\Support;

use PsiMikroskil\Larashare\Http\Request;

class Pagination
{
    /**
     * Paginate response
     *
     * @param Request $request
     * @param int $total
     * @return array|null
     */
    public static function paginate(Request $request, int $total): ?array
    {
        $result = null;
        if (($limit = $request->get('limit', 10)) == 'all') return null;
        $offset = $request->get('offset', 0);
        $parameters = Pagination::getParameter($request->except('offset', 'limit'));
        $url = $request->url();


        if ($offset + $limit < $total) {
            $next_offset = $offset + $limit;
            $next_limit = ($next_offset + $limit > $total ? $total - $next_offset : $limit);

            $result['_next'] = $url . '?offset=' . $next_offset . '&limit=' . $next_limit . $parameters;
        }

        if ($offset >= 1) {
            $previous_offset = (max($offset - $limit, 0));
            $previous_limit = ($previous_offset + $limit > $offset ? $offset - $previous_offset : $limit);

            $result['_previous'] = $url . '?offset=' . $previous_offset . '&limit=' . $previous_limit . $parameters;
        }

        return $result;
    }

    /**
     * Get parameter from url
     *
     * @param array $parameters
     * @return string
     */
    private static function getParameter(array $parameters = []): string
    {
        $result = '';

        foreach ($parameters as $key => $value) {
            if (!is_array($value)) {
                $result .= '&' . $key . '=' . $value;
                continue;
            }
            foreach ($value as $data) {
                $result .= '&' . $key . '[]=' . $data;
            }
        }

        return $result;
    }
}

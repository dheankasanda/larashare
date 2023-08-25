<?php

namespace PsiMikroskil\Larashare\Http;

use Illuminate\Http\JsonResponse;

class Response
{
    /**
     * @param $data
     * @param string|null $message
     * @param string|null $title
     * @param int|null $total
     * @param array|null $pagination
     * @return JsonResponse
     */
    static function jsonSuccess($data, ?string $message = null, ?string $title = null, ?int $total = null, ?array $pagination = []): JsonResponse
    {
        $response = ['data' => $data];

        if (!is_null($title)) $response['title'] = $title;
        if (!is_null($message)) $response['message'] = $message;
        if (!is_null($total)) $response['_total'] = $total;
        if (!empty($pagination)) $response['_pagination'] = $pagination;

        return response()->json($response);
    }


    /**
     * @param int $code
     * @param string|null $message
     * @param string|null $title
     * @return JsonResponse
     */
    public static function jsonError(int $code, ?string $message = null, ?string $title = null): JsonResponse
    {
        $message = empty($message) ? null : $message;

        $errors = ['400' => [trans('responses.400.title'), trans('responses.400.message')], '401' => [trans('responses.401.title'), trans('responses.401.message')], '403' => [trans('responses.403.title'), trans('responses.403.message')], '404' => [trans('responses.404.title'), trans('responses.404.message')], '405' => [trans('responses.405.title'), trans('responses.405.message')], '410' => [trans('responses.410.title'), trans('responses.410.message')], '422' => [trans('responses.422.title'), trans('responses.422.message')], '500' => [trans('responses.500.title'), trans('responses.500.message')],];

        $response = ['error' => ['title' => $title = $title ?? array_key_exists($code, $errors) ? $errors[$code][0] : $code . " Code Error !", 'message' => $message ?? ($errors[$code][1] ?? $title)]];

        return response()->json($response, $code);
    }
}

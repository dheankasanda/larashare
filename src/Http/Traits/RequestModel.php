<?php

namespace PsiMikroskil\Larashare\Http\Traits;

use Illuminate\Support\Arr;
use PsiMikroskil\Larashare\Http\Request;

/**
 * @mixin Request
 */
class RequestModel
{
    /**
     * Get grouping parameters
     *
     * @param array $result
     * @return array
     */
    public function getGroupBy(array $result = []): array
    {
        $groups = $this->get('group_by', []);
        $groups = is_array($groups) ? $groups : [$groups];
        foreach ($groups as $group) $result[] = $group;
        return $result;
    }

    /**
     * Add ordering parameters
     *
     * @param array $result
     * @return array
     */
    public function getOrderBy(array $result = []): array
    {
        $orders = $this->get('order_by', []);
        $orders = is_array($orders) ? $orders : [$orders];

        foreach ($orders as $order) {
            @[$field, $value] = explode('|', $order);
            $value = strtolower($value) == "desc" ? "desc" : "asc";
            if ($field != "") $result[$field] = $value;
        }
        return $result;
    }

    /**
     * Get request limit
     *
     * @param string|null $default
     * @return string|null
     */
    public function getLimit(?string $default = null): ?string
    {
        return $this->get('limit', $default);
    }

    /**
     * Get current offset
     *
     * @param int|null $default
     * @return int|null
     */
    public function getOffset(?int $default = null): ?int
    {
        return $this->get('offset', $default);
    }

    /**
     * Get special parameters
     *
     * @return array
     */
    public function getSpecialParameters(): array
    {
        return $this->only($this->specialParameter());
    }

    /**
     * Special parameter that require special processing logic
     *
     * @return array
     */
    protected function specialParameter(): array
    {
        return [];
    }

    /**
     * Get request parameters
     *
     * @param array $params
     * @return array
     */
    public function getParameters(array $params = []): array
    {
        foreach ($this->validated() as $key => $value) {
            $params[str_replace('-', '.', $key)] = $value;
        }

        return Arr::except($params, array_merge(['group_by', 'order_by', 'offset', 'limit'], $this->specialParameter()));
    }

    /**
     * Tell's the validator that this is collection request
     * and add default collection rules
     *
     * @param array $rules
     * @return array
     */
    protected function collectionRules(array $rules = []): array
    {
        if (!is_null($this->get('group_by'))) $rules['group_by'] = '';
        if (!is_null($this->get('order_by'))) $rules['order_by'] = '';
        if (!is_null($this->get('offset'))) $rules['offset'] = '';
        if (!is_null($this->get('limit'))) $rules['limit'] = '';

        return $rules;
    }

}
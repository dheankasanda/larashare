<?php

namespace PsiMikroskil\Larashare\Databases\Traits;

use PsiMikroskil\Larashare\Exceptions\NotFoundException;
use stdClass;

trait PsiExclusiveMethod
{

    /**
     * Find some records with and return it with the total amount of records
     * @param array $selects
     * @param array $where
     * @param string|array $order_by
     * @param string|array $group_by
     * @param string|null $limit
     * @param int|null $offset
     * @param array $special_parameters
     * @param bool $distinct
     * @return array
     * @package "Special PSI Method"
     *
     */
    public function findManyBy(
        array        $selects = [],
        array        $where = [],
        string|array $order_by = [],
        string|array $group_by = [],
        ?string      $limit = null,
        ?int         $offset = null,
        array        $special_parameters = [],
        bool         $distinct = true
    ): array
    {
        if (empty($selects)) $selects = $this->defaultSelect();

        $this->createFindQuery(
            $selects,
            $where,
            $order_by,
            $group_by,
            'all',
            $offset,
            $special_parameters
        )->addDefaultJoinClause();

        $distinct ? $this->builder()->distinct() : $this->builder();

        return [
            'total' => $this->builder()->count(),
            'data' => $this->addLimitClause($limit)->addOffsetClause($offset)->builder()->get()
        ];
    }

    /**
     * Find one data
     * @param array $selects
     * @param array $where
     * @param string|array $order_by
     * @param string|array $group_by
     * @param string|null $limit
     * @param int|null $offset
     * @param array $special_parameters
     * @param bool $allow_null_result
     * @return stdClass|null
     * @package "Special PSI Method"
     */
    public function findOneBy(
        array        $selects = [],
        array        $where = [],
        string|array $order_by = [],
        string|array $group_by = [],
        ?string      $limit = null,
        ?int         $offset = null,
        array        $special_parameters = [],
        bool         $allow_null_result = false
    ): ?stdClass
    {
        return $this->first(
            $selects,
            $where,
            $order_by,
            $group_by,
            $limit,
            $offset,
            $special_parameters,
            $allow_null_result
        );
    }

    /**
     * @param array $selects
     * @param array $where
     * @param string|array $order_by
     * @param string|array $group_by
     * @param string|null $limit
     * @param int|null $offset
     * @param array $special_parameters
     * @param bool $allow_null_result
     * @return stdClass|null
     * @package "Special PSI Method"
     */
    public function first(
        array        $selects = [],
        array        $where = [],
        string|array $order_by = [],
        string|array $group_by = [],
        ?string      $limit = null,
        ?int         $offset = null,
        array        $special_parameters = [],
        bool         $allow_null_result = false
    ): ?stdClass
    {
        if (empty($selects)) $selects = $this->defaultSelect();

        $this->createFindQuery(
            $selects,
            $where,
            $order_by,
            $group_by,
            $limit,
            $offset,
            $special_parameters
        )->addDefaultJoinClause()->builder();

        $result = $this->builder()->first();

        if ($result || $allow_null_result) {
            return $result;
        }

        throw new NotFoundException('Data ' . $this->table_name . ' dengan parameter yang diberikan tidak ditemukan');
    }

    /**
     * Get one records by its id
     *
     * @param int $id
     * @param array $selects
     * @param bool $allow_null_result
     * @return stdClass|null
     * @package "Special PSI Method"
     */
    public function findById(int $id, array $selects = [], bool $allow_null_result = false): ?stdClass
    {
        return $this->first($selects, ['id' => $id], $allow_null_result);
    }
}
<?php

namespace PsiMikroskil\Larashare\Support\Facades;

use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;
use PsiMikroskil\Larashare\Databases\Repository as FacadeSubject;
use PsiMikroskil\Larashare\Support\Patterns\Facade;
use stdClass;

/**
 * @mixin FacadeSubject
 * @method static array findManyBy(array $selects = [], array $where = [], string|array $order_by = [], string|array $group_by = [], ?string $limit = null, ?int $offset = null, array $special_parameters = [], bool $distinct = true)
 * @method static null|StdClass findOneBy(array $selects = [], array $where = [], string|array $order_by = [], string|array $group_by = [], ?string $limit = null, ?int $offset = null, array $special_parameters = [], bool $distinct = true)
 * @method static null|StdClass first(array $selects = [], array $where = [], string|array $order_by = [], string|array $group_by = [], ?string $limit = null, ?int $offset = null, array $special_parameters = [], bool $allow_null_result = false)
 * @method static null|StdClass findById(int $id, array $selects = [], bool $allow_null_result = false)
 * @method static FacadeSubject addDefaultSelect(array $merge_select = [])
 * @method static void truncate()
 * @method static FacadeSubject|Collection update(array $updated_data = [], array $where = [], bool $return_data = true, bool $force_empty_where = false)
 * @method static FacadeSubject|Collection delete(array $parameters = [], bool $return_data = true, bool $force_empty_where = false)
 * @method static FacadeSubject|Collection function create(array $data = [], bool $return_data = true)
 * @method static FacadeSubject addJoinClauseArray(array $join_clause = [])
 * @method static FacadeSubject createFindQuery(array $selects = [], array $where = [], string|array $order_by = [], string|array $group_by = [], ?string $limit = null, ?int $offset = null, array $special_parameters = [])
 * @method static FacadeSubject connection(string $connection_name = 'default')
 * @method static FacadeSubject table(string $table_name)
 * @method static FacadeSubject createBuilder(?string $table_name = null, ?string $connection_name = null)
 * @method static Builder builder(bool $fresh = false)
 * @method static Collection find(array $selects = [], array $where = [], string|array $order_by = [], string|array $group_by = [], ?string $limit = null, ?int $offset = null, array $special_parameters = [], bool $distinct = true)
 *
 */
class Repository extends Facade
{
    /**
     * @inheritDoc
     */
    protected static function getClassSubject(): string
    {
        return FacadeSubject::class;
    }
}
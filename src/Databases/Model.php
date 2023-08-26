<?php

namespace PsiMikroskil\Larashare\Databases;

use Closure;
use Illuminate\Database\Eloquent\Builder;


/**
 * @method static static make(array $attributes = [])
 * @method static static create(array $attributes = [])
 * @method static static forceCreate(array $attributes = [])
 * @method static firstOrNew(array $attributes = [], array $values = [])
 * @method static firstOrFail(array $columns = ['*'])
 * @method static firstOrCreate(array $attributes, array $values = [])
 * @method static firstOr($columns = ['*'], Closure $callback = null)
 * @method static firstWhere(array $column, string $operator = null, string $value = null, string $boolean = 'and')
 * @method static updateOrCreate(array $columns = ['*'])
 * @method null|static first($columns = ['*'])
 * @method static self findOrFail($id, array $columns = ['*'])
 * @method static static findOrNew($id, array $columns = ['*'])
 * @method static null|static find($id, array $columns = ['*'])
 * @method static self where($column, $operator = null, $value = null, $boolean = 'and')
 * @method static self whereNotIn($column, $values, $boolean = 'and')
 * @method static self orWhereNotIn($column, $values)
 * @method static Builder select(mixed $columns = ['*'])
 * @mixin Builder
 */
class Model extends \Illuminate\Database\Eloquent\Model
{

}
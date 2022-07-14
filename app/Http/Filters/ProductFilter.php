<?php


namespace App\Http\Filters;


use Illuminate\Database\Eloquent\Builder;

class ProductFilter extends AbstractFilter
{
    public const CATEGORIES = 'categories';
    public const TAGS = 'tags';
    public const COLORS = 'colors';
    public const PRICES = 'prices';


    protected function getCallbacks(): array
    {
        return [
            self::CATEGORIES => [$this, 'categories'],
            self::TAGS => [$this, 'tags'],
            self::COLORS => [$this, 'colors'],
            self::PRICES => [$this, 'prices'],
        ];
    }
    public function categories(Builder $builder, $value)
    {
        $builder->whereIn('category_id', $value);
    }
    public function tags(Builder $builder, $value)
    {
        $builder->whereHas('tags', function($b) use ($value)
        {
            $b->whereIn('tag_id', $value);
        });
    }
    public function colors(Builder $builder, $value)
    {
        $builder->whereHas('colors', function($b) use ($value)
        {
            $b->whereIn('color_id', $value);
        });
    }
    public function prices(Builder $builder, $value)
    {
        $builder->whereBetween('price', $value);
    }
}

<?php


namespace App\Http\Filters;


use Illuminate\Database\Eloquent\Builder;

class ProductFilter extends AbstractFilter
{
    public const TITLE = 'title';
    public const DESCRIPTION = 'description';
    public const CONTENT = 'content';
    public const CATEGORIES = 'categories';
    public const TAGS = 'tags';
    public const COLORS = 'colors';
    public const PRICE = 'price';


    protected function getCallbacks(): array
    {
        return [
            self::TITLE => [$this, 'title'],
            self::DESCRIPTION => [$this, 'description'],
            self::CONTENT => [$this, 'content'],
            self::CATEGORIES => [$this, 'categories'],
            self::TAGS => [$this, 'tags'],
            self::COLORS => [$this, 'colors'],
            self::PRICE => [$this, 'price'],
        ];
    }

    public function title(Builder $builder, $value)
    {
        $builder->where('title', 'like', "%{$value}%");
    }
    public function description(Builder $builder, $value)
    {
        $builder->where('description', 'like', "%{$value}%");
    }
    public function content(Builder $builder, $value)
    {
        $builder->where('content', 'like', "%{$value}%");
    }
    public function categories(Builder $builder, $value)
    {
        $builder->where('category_id', $value);
    }
    public function tags(Builder $builder, $value)
    {
        $builder->whereHas('tags', function($b) use ($value){
            $b->whereIn('tag_id', $value);
        });
    }
    public function colors(Builder $builder, $value)
    {
        $builder->where('color_id', $value);
    }
    public function price(Builder $builder, $value)
    {
        $builder->whereBetween($value['from'], $value['to']);
    }
}

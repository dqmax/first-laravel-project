<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class PostFilter extends AbstractFilter
{
    public const TITLE = 'title';
    public const CONTENT = 'content';
    public const CATEGORY_ID = 'category_id';

    public function __construct(Request $request)
    {
        parent::__construct(array_filter($request->all()));
    }

    protected function getCallbacks(): array
    {
        return [
            self::TITLE => [$this, 'title'],
            self::CONTENT => [$this, 'content'],
            self::CATEGORY_ID => [$this, 'categoryId'],
        ];
    }

    public function title(Builder $builder, $value)
    {
        $builder->where('title', 'like', "%{$value}%");
    }

    public function content(Builder $builder, $value)
    {
        $builder->where('content', 'like', "%{$value}%");
    }

    public function categoryId(Builder $builder, $value)
    {
        $builder->where('category_id', $value);
    }
}

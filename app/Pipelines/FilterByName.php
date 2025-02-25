<?php

namespace App\Pipelines;

use Closure;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Log;

class FilterByName
{


  public function handle(Builder $builder, Closure $next)
  {
    $name = request()->input('name');
    if ($name) {
      Log::info("FilterByName: $name");
      $builder->where('name', 'like', "%$name%");
    }
    return $next($builder);
  }
}

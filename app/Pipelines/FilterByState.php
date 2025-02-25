<?php

namespace App\Pipelines;

use Closure;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Log;

class FilterByState
{

  public function handle(Builder $builder, Closure $next)
  {
    $state = request()->input('state');
    if ($state === '0' || $state === '1') {
      Log::info("FilterByState: $state");
      $builder->where('state', $state);
    }
    return $next($builder);
  }
}

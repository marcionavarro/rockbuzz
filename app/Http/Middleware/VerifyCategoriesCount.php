<?php

namespace App\Http\Middleware;

use Closure;
use App\Category;

class VerifyCategoriesCount
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Category::all()->count() === 0) {
            session()->flash('error', 'Voçê precisa cadatrar uma categoria para criar o post');
            return redirect()->route('categorias.create');
        }

        return $next($request);
    }
}

<?php

namespace Guptarakesh198\Panelhelper\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Helpers\SidebarHelper;
use Illuminate\Support\Facades\Auth;

class PanelHelperMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::guard('backend')->user()->hasRole('developer')){

            $sidebar = new SidebarHelper();
            $sidebar->add_menu_item('MetricaDeveloper',[
                'name' => 'Tinker',
                'class' => 'tinker',
                'route' => '/tinker',
                'extra' => 'target="_blank"'
            ]);
            $sidebar->init();
        }

        return $next($request);
    }
}

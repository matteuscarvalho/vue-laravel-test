<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;
use Tightenco\Ziggy\Ziggy;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request)
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request)
    {
        return array_merge(parent::share($request), [
            'auth' => [
                'user' => $request->user(),
            ],
            'ziggy' => function () use ($request) {
                return array_merge((new Ziggy)->toArray(), [
                    'location' => $request->url(),
                ]);
            },
            'flash' => [
                'success' => $request->session()->get('success'),
            ],
            'menus' => [
                [
                    'label' => 'Home',
                    'url' => route('home'),
                    'isActive' => $request->routeIs('home'),
                    'isVisible' => true,
                ],
                [
                    'label' => 'Dashboard',
                    'url' => route('dashboard'),
                    'isActive' => $request->routeIs('dashboard'),
                    'isVisible' => true,
                ],
                [
                    'label' => 'Permissões',
                    'url' => route('permissions.index'),
                    'isActive' => $request->routeIs('permissions.*'),
                    'isVisible' => $request->user()?->can('view permissions module'),
                ],
                [
                    'label' => 'Roles',
                    'url' => route('roles.index'),
                    'isActive' => $request->routeIs('roles.*'),
                    'isVisible' => $request->user()?->can('view roles module'),
                ],
                [
                    'label' => 'Users',
                    'url' => route('users.index'),
                    'isActive' => $request->routeIs('users.*'),
                    'isVisible' => $request->user()?->can('view users module'),
                ],
                [
                    'label' => 'Categorias',
                    'url' => route('categories.index'),
                    'isActive' => $request->routeIs('categories.*'),
                    'isVisible' => $request->user()?->can('view categories module'),
                ],
                [
                    'label' => 'Produtos',
                    'url' => route('products.index'),
                    'isActive' => $request->routeIs('products.*'),
                    'isVisible' => $request->user()?->can('view products module'),
                ],
                [
                    'label' => 'Marcas',
                    'url' => route('brands.index'),
                    'isActive' => $request->routeIs('brands.*'),
                    'isVisible' => $request->user()?->can('view brands module'),
                ],
            ],
        ]);
    }
}

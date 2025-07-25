<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Inspiring;
use Illuminate\Http\Request;
use Inertia\Middleware;
use Tighten\Ziggy\Ziggy;
use Illuminate\Support\Facades\Auth; 

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        [$message, $author] = str(Inspiring::quotes()->random())->explode('-');

        // Inisialisasi array auth dengan nilai default null
        $authData = [
            'user' => null,
            'guard' => null,
            'role' => null,
        ];

        // Periksa apakah pengguna Dosen/Admin terautentikasi (menggunakan guard 'web')
        if (Auth::guard('web')->check()) {
            $user = Auth::guard('web')->user();
            $authData['user'] = $user->toArray();
            $authData['guard'] = 'web';
            // Asumsi ada kolom 'role' di tabel 'users' untuk Dosen/Admin
            $authData['role'] = $user->role ?? null;
        }
        // Periksa apakah pengguna Mahasiswa terautentikasi (menggunakan guard 'mahasiswa')
        elseif (Auth::guard('mahasiswa')->check()) {
            $user = Auth::guard('mahasiswa')->user();
            $authData['user'] = $user->toArray();
            $authData['guard'] = 'mahasiswa';
            // Untuk mahasiswa, kita bisa secara eksplisit menetapkan role 'mahasiswa'
            $authData['role'] = 'mahasiswa';
        }

        return [
            ...parent::share($request),
            'name' => config('app.name'),
            'quote' => ['message' => trim($message), 'author' => trim($author)],
            'auth' => [
                'user' => $request->user(),
            ],
            'ziggy' => [
                ...(new Ziggy)->toArray(),
                'location' => $request->url(),
            ],
            'sidebarOpen' => ! $request->hasCookie('sidebar_state') || $request->cookie('sidebar_state') === 'true',
        ];
    }
}

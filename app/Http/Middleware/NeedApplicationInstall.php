<?php

namespace App\Http\Middleware;

use Closure;
use App\CompanySetting;

class NeedApplicationInstall
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
        $filename = storage_path("installed");
        if (file_exists($filename)) {
            $this->global = CompanySetting::first();
            if ($this->global === null) {
                unlink($filename);
                return redirect('/install');
            }
        } else {
            $this->global = CompanySetting::first();
            if ($this->global === null) {
                return redirect('/install');
            }
        }
    }
}

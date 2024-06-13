<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Hash::extend('pbkdf2_mcf', function () {
            return new class {
                public function make($value, array $options = [])
                {
                    $salt = $options['salt'] ?? bin2hex(random_bytes(16));
                    $iterations = $options['iterations'] ?? 1000;
                    $hash = hash_pbkdf2('sha256', $value, $salt, $iterations, 64);
                    return sprintf('$pbkdf2-sha256$%d$%s$%s', $iterations, $salt, $hash); // MCF形式
                }
                
                public function check($value, $hashedValue, array $options = [])
                {
                if (preg_match('/^\$pbkdf2-sha256\$(\d+)\$(.+)\$(.+)$/', $hashedValue, $matches)) {
                    list(, $iterations, $salt, $hash) = $matches;
                    $hashedInput = hash_pbkdf2('sha256', $value, $salt, (int)$iterations, 64);
                    return hash_equals($hash, $hashedInput);
                }
                return false;
            }
        };
    });
    }
}
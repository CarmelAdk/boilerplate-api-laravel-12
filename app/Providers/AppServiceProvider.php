<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;

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
        $this->configurePasswordRules();
        $this->configureCommands();
        $this->configureBlueprints();
        $this->configureModels();

        if(App::isLocal()) {
            DB::enableQueryLog();

            Route::macro('log', function () {
                dd(DB::getQueryLog());
            });

            DB::whenQueryingForLongerThan(1, function ($connection) {
                Log::warning(
                    'Query took longer than 1 second.',
                    $connection->getQueryLog()
                );
            });
        }
    }

    /**
     * Configure the default password validation rules.
     */
    private function configurePasswordRules(): void
    {
        Password::defaults(function () {
            $rule = Password::min(8);

            return App::isProduction()
                        ? $rule->mixedCase()->numbers()->symbols()->uncompromised()
                        : $rule;
        });
    }

    /**
     * Disable destructive database commands in production.
     *
     * This enforces "read-only" mode for the database in production.
     *
     */
    private function configureCommands(): void
    {
        DB::prohibitDestructiveCommands(App::isProduction());
    }

    /**
     * Configure Eloquent models.
     *
     */
    private function configureModels(): void
    {
        Model::unguard();
        Model::shouldBeStrict();
    }

    private function configureBlueprints(): void
    {
        // Blueprint::macro('organization', function () {
        //     return $this->foreignId('organization_id')->constrained()->cascadeOnDelete();
        // });
    }
}

<?php

namespace Nisimpo\Auth;

use Illuminate\Console\Command;
use InvalidArgumentException;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'ui:auth')]
class AuthCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ui:auth
                    { type=bootstrap : The preset type (bootstrap) }
                    {--views : Only scaffold the authentication views}
                    {--force : Overwrite existing views by default}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scaffold basic login and registration views and routes';

    /**
     * The views that need to be exported.
     *
     * @var array
     */
    protected $views = [
        'auth/login.stub' => 'auth/login.blade.php',
        'auth/passwords/confirm.stub' => 'auth/passwords/confirm.blade.php',
        'auth/passwords/email.stub' => 'auth/passwords/email.blade.php',
        'auth/passwords/reset.stub' => 'auth/passwords/reset.blade.php',
        'auth/register.stub' => 'auth/register.blade.php',
        'auth/verify.stub' => 'auth/verify.blade.php',
        'home.stub' => 'home.blade.php',
        'layouts/app.stub' => 'layouts/app.blade.php',
    ];

    /**
     * Execute the console command.
     *
     * @return void
     *
     * @throws \InvalidArgumentException
     */
    public function handle()
    {
        if (static::hasMacro($this->argument('type'))) {
            return call_user_func(static::$macros[$this->argument('type')], $this);
        }

        if (! in_array($this->argument('type'), ['bootstrap'])) {
            throw new InvalidArgumentException('Invalid preset.');
        }

        $this->ensureDirectoriesExist();
        $this->exportViews();

        if (! $this->option('views')) {
            $this->exportBackend();
        }

        $this->components->info('Authentication scaffolding generated successfully.');
    }

    /**
     * Create the directories for the files.
     *
     * @return void
     */
    protected function ensureDirectoriesExist()
    {
        if (! is_dir($directory = $this->getViewPath('layouts'))) {
            mkdir($directory, 0755, true);
        }

        if (! is_dir($directory = $this->getViewPath('auth/passwords'))) {
            mkdir($directory, 0755, true);
        }
    }

    /**
     * Export the authentication views.
     *
     * @return void
     */
    protected function exportViews()
    {
        foreach ($this->views as $key => $value) {
            if (file_exists($view = $this->getViewPath($value)) && ! $this->option('force')) {
                if (! $this->components->confirm("The [$value] view already exists. Do you want to replace it?")) {
                    continue;
                }
            }

            copy(
                __DIR__.'/Auth/'.$this->argument('type').'-stubs/'.$key,
                $view
            );
        }
    }

    /**
     * Export the authentication backend.
     *
     * @return void
     */
    protected function exportBackend()
    {
        $this->callSilent('ui:controllers');

        $controller = app_path('Http/Controllers/HomeController.php');

        if (file_exists($controller) && ! $this->option('force')) {
            if ($this->components->confirm("The [HomeController.php] file already exists. Do you want to replace it?")) {
                file_put_contents($controller, $this->compileStub('controllers/HomeController'));
            }
        } else {
            file_put_contents($controller, $this->compileStub('controllers/HomeController'));
        }

        $baseController = app_path('Http/Controllers/Controller.php');

        if (file_exists($baseController) && ! $this->option('force')) {
            if ($this->components->confirm("The [Controller.php] file already exists. Do you want to replace it?")) {
                file_put_contents($baseController, $this->compileStub('controllers/Controller'));
            }
        } else {
            file_put_contents($baseController, $this->compileStub('controllers/Controller'));
        }

        if (! file_exists(database_path('migrations/create_users_table.stub'))) {
            copy(
                __DIR__.'/../stubs/migrations/2014_10_12_100000_create_password_resets_table.php',
                base_path('database/migrations/2014_10_12_100000_create_password_resets_table.php')
            );
        }

        if ( file_exists(database_path('migrations/create_users_table.stub'))) {
            copy(
                __DIR__.'/../stubs/migrations/0001_01_01_000000_create_users_table.php',
                base_path('database/migrations/0001_01_01_000000_create_users_table.php')
            );
        }

        file_put_contents(
            base_path('routes/web.php'),
            file_get_contents(__DIR__.'/Auth/stubs/routes.stub'),
            FILE_APPEND
        );

        if (! file_exists(base_path('routes/auth_routes.php'))) {
            copy(
                __DIR__.'/Auth/stubs/auth_routes.php',
                base_path('routes/auth_routes.php')
            );
        }
    }

    /**
     * Compiles the given stub.
     *
     * @param  string  $stub
     * @return string
     */
    protected function compileStub($stub)
    {
        return str_replace(
            '{{namespace}}',
            $this->laravel->getNamespace(),
            file_get_contents(__DIR__.'/Auth/stubs/'.$stub.'.stub')
        );
    }

    /**
     * Get full view path relative to the application's configured view path.
     *
     * @param  string  $path
     * @return string
     */
    protected function getViewPath($path)
    {
        return implode(DIRECTORY_SEPARATOR, [
            config('view.paths')[0] ?? resource_path('views'), $path,
        ]);
    }
}

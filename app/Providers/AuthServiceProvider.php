<?php

namespace App\Providers;
use App\Models\User;
//use App\Models\Task;
//use App\Policies\TaskPolicy;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        //Task::class => TaskPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
       // Gate::define('tasks_create', function(User $user) {return  $user->is_admin; } ); //Same as below 
            // Gate::define('tasks_create', fn(User $user)=> $user->is_admin);
            // Gate::define('tasks_edit', fn(User $user)=> $user->is_admin);
            // Gate::define('tasks_delete', fn(User $user)=> $user->is_admin);

        // now we have created policy So comment above Gates
    }
}

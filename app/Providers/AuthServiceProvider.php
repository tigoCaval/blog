<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Content;
use App\Models\Section;
use App\Policies\UserPolicy;
use App\Policies\ContentPolicy;
use App\Policies\SectionPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        Content::class => ContentPolicy::class,
        User::class => UserPolicy::class,
        Section::class => SectionPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}

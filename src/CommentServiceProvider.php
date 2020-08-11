<?php

namespace Tir\Comment;

use Illuminate\Support\ServiceProvider;

class CommentServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (! config('app.installed')) {
            return;
        }

        $this->loadRoutesFrom(__DIR__ . '/Routes/admin.php');
        $this->loadRoutesFrom(__DIR__ . '/Routes/public.php');

        $this->loadMigrationsFrom(__DIR__ . '/Database/Migrations');

        $this->loadTranslationsFrom(__DIR__ . '/Resources/Lang/', 'comment');

        //Add menu to admin panel
        $this->adminMenu();

    }



    private function adminMenu()
    {
        $menu = resolve('AdminMenu');
        $menu->item('content')->title('comment::panel.content')->link('#')->add();
        $menu->item('content.comments')->title('comment::panel.comments')->route('comment.index')->add();

    }
}

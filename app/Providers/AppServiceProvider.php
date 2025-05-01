<?php

namespace App\Providers;

use App\Models\Blog;
use App\Models\CategoryBlog;
use Illuminate\Support\Str;
use App\Models\ExtracurricularOffer;
use App\Models\Lesson;
use App\Models\Workshop;
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
        ExtracurricularOffer::creating(function ($model) {
            $model->slug = Str::slug($model->title);
        });
        ExtracurricularOffer::updating(function ($model) {
            $model->slug = Str::slug($model->title);
        });


        Workshop::creating(function ($model) {
            $model->slug = Str::slug($model->name);
        });

        Workshop::updating(function ($model) {
            $model->slug = Str::slug($model->name);
        });


        Lesson::creating(function ($model) {
            $model->slug = Str::slug($model->title);
        });

        Lesson::updating(function ($model) {
            $model->slug = Str::slug($model->title);
        });

        Blog::creating(function ($model) {
            $model->slug = Str::slug($model->title);
        });

        Blog::updating(function ($model) {
            $model->slug = Str::slug($model->title);
        });

        CategoryBlog::creating(function ($model) {
            $model->slug = Str::slug($model->title);
        });

        CategoryBlog::updating(function ($model) {
            $model->slug = Str::slug($model->title);
        });
    }
}

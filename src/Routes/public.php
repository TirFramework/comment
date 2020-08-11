<?php

// Add web middleware for use Laravel feature
Route::group(['middleware' => 'web'], function () {

    //add admin prefix and middleware for admin area
        Route::post('/comment/submit', 'Tir\Comment\Http\Controllers\PublicCommentController@submit')->name('comment.submit');

});
<?php

namespace Tir\Comment\Entities;

use Tir\Crud\Support\Eloquent\CrudModel;
use Tir\Store\Category\Entities\Category;
use Tir\User\Entities\User;

class Comment extends CrudModel
{

    /**
     * The attribute show route name
     * and we use in fieldTypes and controllers
     *
     * @var string
     */
    public static $routeName = 'comment';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['status','user_id','email', 'name', 'rate', 'phone', 'body','parent_id' ];



    /**
     * This function return an object of field
     * and we use this for generate admin panel page
     * @return array
     */
    public function getFields()
    {
        return [
            [
                'name'    => 'basic_information',
                'type'    => 'group',
                'visible' => 'ce',
                'tabs'    => [
                    [
                        'name'    => 'comment_information',
                        'type'    => 'tab',
                        'visible' => 'ce',
                        'fields'  => [
                            [
                                'name'    => 'id',
                                'type'    => 'text',
                                'visible' => 'io',
                            ],
                            [
                                'name'    => 'name',
                                'type'    => 'text',
                                'visible' => 'ie',
                            ],
                            [
                                'name'    => 'email',
                                'type'    => 'text',
                                'visible' => 'e',
                            ],
                            [
                                'name'    => 'user_id',
                                'type'    => 'relation',
                                'relation' => ['user', 'name'],
                                'visible' => 'e',
                            ],
                            [
                                'name'    => 'phone',
                                'type'    => 'text',
                                'visible' => 'e',
                            ],
                            [
                                'name'    => 'body',
                                'type'    => 'textarea',
                                'visible' => 'e',
                            ],
                            [
                                'name'    => 'rate',
                                'type'    => 'select',
                                'data'    => [
                                    '1' => "1 trans('comment::panel.star')",
                                    '2' => "2 trans('comment::panel.star')",
                                    '3' => "3 trans('comment::panel.star')",
                                    '4' => "4 trans('comment::panel.star')",
                                    '5' => "5 trans('comment::panel.star')",
                                ],
                                'visible' => 'e',
                            ],
                            [
                                'name'    => 'created_at',
                                'type'    => 'text',
                                'visible' => 'i',
                            ],
                            [
                                'name'    => 'status',
                                'type'    => 'select',
                                'validation' => 'required',
                                'data'    => [
                                              'published'   => trans('comment::panel.published'),
                                              'unpublished' => trans('comment::panel.unpublished')
                                ],
                                'visible' => 'ief',
                            ],


                        ]
                    ],
                ]
            ]
        ];
    }

    //

    public function getCratedAtAttribute($value)
    {
        if( config('app.locale') =='fa' ){
            return jdate($value)->format('%H:%M %A %d %B %Y');
        }
        if( config('app.locale') =='en' ){
             return date('M D , Y', strtotime( $value ));

        }
    }

    //Additional methods //////////////////////////////////////////////////////////////////////////////////////////////


    //Relations methods ///////////////////////////////////////////////////////////////////////////////////////////////

    public function commentable()
    {
        return $this->morphTo();
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function answer()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

}

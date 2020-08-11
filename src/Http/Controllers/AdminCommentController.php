<?php

namespace Tir\Comment\Http\Controllers;

use Tir\Comment\Entities\Comment;
use Tir\Crud\Controllers\CrudController;

class AdminCommentController extends CrudController
{
    protected $model = Comment::Class;
}

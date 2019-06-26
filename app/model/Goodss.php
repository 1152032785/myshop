<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Goodss extends Model
{
    //定义主键id
    protected $primaryKey = 'id';

     /**
     * 模型的连接名称
     *
     * @var string
     */
    protected $connection = 'shop';

    /**
     * 与模型关联的表名x
     *
     * @var string
     */
    protected $table = 'goodss';

    /**
     * 指示模型是否自动维护时间戳
     *
     * @var bool
     */
    public $timestamps = false;
}

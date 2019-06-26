<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
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
    protected $table = 'shopp';

    /**
     * 指示模型是否自动维护时间戳
     *
     * @var bool
     */
    public $timestamps = false;

    protected $primaryKey = 'id';

}

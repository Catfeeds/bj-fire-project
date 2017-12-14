<?php

namespace app\admin\model;

use think\Model;

class Message extends Model
{
    // 表名
    protected $name = 'message';
    
    // 自动写入时间戳字段
    protected $autoWriteTimestamp = false;

    // 定义时间戳字段名
    protected $createTime = false;
    protected $updateTime = false;

    // 定义题目类型
    protected $messageType = [0 => '消防工程师', 1 => '消防员'];

    // 追加属性
    protected $append = [
        'time_text'
    ];

    public function getTimeTextAttr($value, $data)
    {
        $value = $value ? $value : $data['time'];
        return is_numeric($value) ? date("Y-m-d", $value) : $value;
    }

    protected function setTimeAttr($value)
    {
        return $value && !is_numeric($value) ? strtotime($value) : $value;
    }

    /**
     * 读取消息类型
     * @return array
     */
    public function getTypeList()
    {
        return $this->messageType;
    }


}

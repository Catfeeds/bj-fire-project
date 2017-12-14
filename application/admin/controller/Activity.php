<?php

namespace app\admin\controller;

use app\common\controller\Backend;

use think\Controller;
use think\Request;

/**
 * 
 *
 * @icon fa fa-circle-o
 */
class Activity extends Backend
{
    
    /**
     * Activity模型对象
     */
    protected $model = null;

    /**
     * 搜索字段
     */
    protected $searchFields = 'id,type,time,title,describe,content';

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('Activity');

        $this->view->assign("typeList", $this->model->getTypeList());

    }

    /**
     * 获取活动类型列表
     */
    public function getTypeListAjax()
    {
        $list = $this->model->getTypeList();
        $searchlist = [];
        foreach ($list as $key => $value)
        {
            $searchlist[] = ['id' => $key, 'name' => $value];
        }
        $data = ['searchlist' => $searchlist];
        $this->success('', null, $data);
    }
}

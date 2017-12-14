<?php

namespace app\api\controller\pdfile;

use app\common\controller\Api;


/**
 * 
 *
 * @icon fa fa-circle-o
 */
class Pdfilelist extends Api
{
    protected $model = null;
    protected $categorylist = [];

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('Pdfilelist');
    }


    public function getList()
    {
        $ids = input('ids');

        $list = model('Category')->with('pdfilelist')->where('pid', $ids)->select();

        foreach ($list as $k=>$v){
            if (count($v['pdfilelist'])){
                foreach ($v['pdfilelist'] as $key=>$value){
                    $value['url'] = 'http://fire.mcykj.com/PDFuploads/'.$value['url'];
                }
            }
        }

        return api_json('0', 'ok', $list);

    }

}

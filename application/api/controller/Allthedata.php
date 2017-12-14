<?php

namespace app\api\controller;

use app\common\controller\Api;

use app\api\controller\Category;
use app\api\controller\Questions;
use app\api\controller\papers\Rule;
use app\api\model\Papers;
use app\api\model\PapersQuestions;

use think\Controller;
use think\Request;

/**
 * 
 *
 * @icon fa fa-circle-o
 */
class Allthedata extends Api
{


    public function getList()
    {
        $uid = input('uid');
        $data = [];

        $category         = new Category();
        $data['category'] = $category->getChaptersCategoryList();

        $questions = new Questions();
        $data['questions'] = $questions->getAllList();

        $papers = new Rule();
        $data['papers'] = $papers->getPaperRuleList();

        $data['papersCategory'] = $category->getPaperCaetgory();

        $data['userData'] = model('QuestionsUser')->where('uid', $uid)->select();

        $data['version'] = model('Config')->where('name', 'version')->value('value');
        $data['pdfversion'] = model('Config')->where('name', 'pdfversion')->value('value');

        return api_json('0', 'ok', $data);
    }

    /**
     * 获取服务器当前版本号
     * @return mixed
     */
    public function getVersion()
    {
        $data['version'] = model('Config')->where('name', 'version')->value('value');
        $data['pdfversion'] = model('Config')->where('name', 'pdfversion')->value('value');
        return api_json('0', 'ok', $data);
    }

    public function saveTest()
    {
        $data = [
            'uid'      => input('uid'),
            'data'   => input('data')
        ];
        if ($id = model('test')->where('uid', $data['uid'])->value('id')){
            if (model('test')->save(['data' => $data['data']], ['uid' => $data['uid']])){
                return api_json('0', '同步成功', null);
            }
        }else{
            if (model('test')->save($data)){
                return api_json('0', '同步成功', null);
            }
        }
        return api_json('1', '同步失败', null);
    }

    public function getTest()
    {
        $uid = input('uid');
        return api_json('0', 'ok', model('test')->where('uid', $uid)->value('data'));
    }



}

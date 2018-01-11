<?php
/**
 * Created by PhpStorm.
 * User: wangcailin
 * Date: 2017/10/30
 * Time: 下午4:42
 */
namespace app\api\controller;

use app\common\controller\Api;
use think\Validate;
use app\common\library\Alidayu;

class User extends Api
{

    /**
     * Teacher模型对象
     */
    protected $model = null;

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('User');

    }

    /**
     * 会员登录接口
     */
    public function login()
    {
        $mobile    = input('mobile');
        $password  = input('password');

        $data = [
            'mobile'    => $mobile,
            'password'  => $password
        ];
        $res = $this->model->loginCheck($data);
        if ($res == 0){
            return api_json('1', '手机号不存在', $data);
        }elseif ($res == 1){
            return api_json('1', '密码错误', $data);
        }else{
            return api_json('0', '登录成功', $res);
        }
    }

    /**
     * 会员注册接口
     */
    public function register()
    {

        $mobile    = input('mobile');
        $password  = input('password');
        $string    = input('string');

        $rule = [
            'mobile'  => 'require|length:11',
        ];
        $data = [
            'mobile'  => $mobile,
        ];
        $validate = new Validate($rule);
        $result = $validate->check($data);
        if (!$result)
        {
            return api_json('1', '请输入11位手机号', null);
        }
        $res = $this->model->where($data)->count();
        if ($res){
            return api_json('1', '手机号已存在', null);
        }

        $data = [
            'mobile'    => $mobile,
            'username'  => $mobile,
            'password'  => $password,
            'string'    => $string
        ];

        if ($this->model->save($data))
        {
            return api_json('0', '注册成功', $data);
        }

        return api_json('1', '注册失败', null);
    }

    /**
     * 修改密码
     * @return \think\response\Json
     */
    public function passwordCheck()
    {
        $mobile   = input('mobile');
        $password = input('password');
        $string   = input('string');

        $res = $this->model->save(
            ['password' => $password],
            ['mobile'   => $mobile],
            ['string'   => $string]
        );
        if ($res){
            return api_json('0', '修改成功', null);
        }
        return api_json('1', '修改失败', null);
    }

    /**
     * 发送短信验证码接口
     */
    public function sendSms()
    {
        $type   = input('type');
        $mobile = input('mobile');
        $code = create_code();
        $alidayu = new Alidayu;
        $res = $this->model->forgetPasswordCheck($mobile);

        switch ($type){
            case '1': // 找回密码
                if ($res){
                    if ($alidayu::send($mobile, $code, 'SMS_109690327')){
                        return api_json('1', '验证码发送失败', null);
                    }
                    return api_json('0', '验证码发送成功', $code);
                }
                return api_json('1', '手机号不存在', null);
                break;
            case '2': // 注册
                if (!$res){
                    if ($alidayu::send($mobile, $code, 'SMS_109690329')){
                        return api_json('1', '验证码发送失败', null);
                    }
                    return api_json('0', '验证码发送成功', $code);
                }
                return api_json('1', '手机号已存在', null);
                break;
            default:
                return false;
        }

    }

}

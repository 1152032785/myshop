<?php

namespace App\Http\Controllers\Pay;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class AliPayController extends Controller
{
    public $app_id;
    public $gate_way;
    public $notify_url;
    public $return_url;
    public $rsaPrivateKeyFilePath = '';  //路径
    public $aliPubKey = '';  //路径
    public $privateKey = 'MIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQCbumoyp6mVDuAuIYf4x1ypC9agez9xUvyCTwyhOakOfl9VjTEs3NVCaQJER+J6pf94RFdpcHnIniorQ2H8MUJEb9cimMTp/24iFrO9giQ/0XYaM5J9+OiP9Nx9U8VJr/dmvO4AhnC2WOKBRljhHGBeY/ifgbBa+wZyLticEpkDlRmI+Psr5Y4JCTSi7bIT8ksA6XZkeMzm88fT4xzxql18x0xMb96R/KtLO34cZlG5QTn3U44Vsop78jzpHsWKfEI3QDcVOTZkj5UspKGAkudTcl5wcMMEzjzLm9cEqWYP6Jz8eXYfP0beQMQ27ANfsc7kIt8izas+GdmUk0BheFNlAgMBAAECggEAcbltHJj8avJ2HLo4BiHxNTKEBqZ66lNkO/Vmj8cAAqmfDWcS5mRPCTSOhzbH2jGnozilbUbKaQu4V+fZgsamUjwqrAVMqGX1E8focxi7SC+7Q98tt/kyPQ7ghlXK2ck7rzeBx7hmT4QRxb6N4bdLWSNAyZt4Irj3OCOl5DRgsg/n9aFXDP3T+NqhbWF7v9FspclXTn470jtaYiTPgtmfGfD2NygiJ3UN3OtwGO+7vanCSCnuI4o+7RCIUpVBKe4OVOn5N1zd0ozfqpsD13WDlo8xBgiNGoqtNSGpjNUC8rQeYSUpCP9dcRFNTLnjt1D9Eaa4j1ko2QsqXkUcKwNc8QKBgQDZCnvrgmK7Bh+m24P2SqPrNvUtBzy82ym9PW132DVF/u+8ZkL69VEdwCN9Rg11W30GafOvpdHjLuwVEX56vjJHYnCit6Buim0KLbitKmKYPHwHfgQ3aqY9fo99zQBv5uj9SaGkPQNM2GRxt07dhmyp76wXONjAKliM1hmdt+3JwwKBgQC3rnjip4m1YqTyZy5KRmaXdv4JhSwWzfs6FAkS9+ce4BzBTR57lo4gb5fhUcI1tRiFs5uHf47+g3ql46nbgHH9CmJXyYF5cJjDkaOqovMJYcoo4BnQB9T7r6VVx9/+GXhgJYFZF98KuwvkyqyoSsVNgdOl4jPHJFYyJDb0B5PztwKBgCuIX8ygDV+H3edg1jobRH+UOV77uaIDr36GiKNmGWFdvgYi2MJvXALEnBmvaFmmrRARRlBvyQZxTeb36E+EQJ9yzjbE8Afb+fz1qLoK61WvpAz4qK3Y1Vk2Pl+0M6c+QHM1RpejqTrLmHH6m3XxVXBMY08RFuCMXdB5zQ+GacpzAoGAPt7ZQbtWx18cVlw62/F87BsumNOcY7Hda+Ovt25jDY5oSUG8TVEbFL8dnWH+t6Nk4V64vYhLyZH3SRDD8v3kBlinkKTITGjd4RLYkm90AKIYMCWEsE/99qgIT3Q6lx7gtQghXf1tup6LU6SLtI7jOcRWTVE/p8ooNsFujdiKK8ECgYEAzY9gCwm5Sfw8D5JZMufpymqkq220/mls+oehPJthgEg2Wb1S6kMR17k684ym4shcXNLf8TyRfy2J9m57sspBqjkyumXZ2j1hTgkkbg/VAiq9zxViGQiH3/jfnvdnpNB0hvy4sbaj9c3sFahPcqkmVRBcHk1YWtO08P1PN6CXVP4=';
    public $publicKey = 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAm7pqMqeplQ7gLiGH+MdcqQvWoHs/cVL8gk8MoTmpDn5fVY0xLNzVQmkCREfieqX/eERXaXB5yJ4qK0Nh/DFCRG/XIpjE6f9uIhazvYIkP9F2GjOSffjoj/TcfVPFSa/3ZrzuAIZwtljigUZY4RxgXmP4n4GwWvsGci7YnBKZA5UZiPj7K+WOCQk0ou2yE/JLAOl2ZHjM5vPH0+Mc8apdfMdMTG/ekfyrSzt+HGZRuUE591OOFbKKe/I86R7FinxCN0A3FTk2ZI+VLKShgJLnU3JecHDDBM48y5vXBKlmD+ic/Hl2Hz9G3kDENuwDX7HO5CLfIs2rPhnZlJNAYXhTZQIDAQAB';
    public function __construct()
    {
        $this->app_id = '2016100100638365';
        $this->gate_way = 'https://openapi.alipaydev.com/gateway.do';
        $this->notify_url = env('APP_URL').'/notify_url';
        $this->return_url = env('APP_URL').'/return_url';
    }
    
    
    /**
     * 订单支付
     * @param $oid
     */
    public function pay(Request $request)
    {
        

    	// file_put_contents(storage_path('logs/alipay.log'),"\nqqqq\n",FILE_APPEND);
    	// die();
        //验证订单状态 是否已支付 是否是有效订单
        //$order_info = OrderModel::where(['oid'=>$oid])->first()->toArray();
        //判断订单是否已被支付
        // if($order_info['is_pay']==1){
        //     die("订单已支付，请勿重复支付");
        // }
        //判断订单是否已被删除
        // if($order_info['is_delete']==1){
        //     die("订单已被删除，无法支付");
        // }
        // $oid = time().mt_rand(1000,1111);  //订单编号
        //业务参数
        $oid=$request->get('id');
        // dd( $oid);
        $pay_money = DB::table('order')->where('oid',$oid)->value('pay_money');
        $bizcont = [
            'subject'           => 'Lening-Order: ' .$oid,
            'out_trade_no'      => $oid,
            'total_amount'      => $pay_money,
            'product_code'      => 'FAST_INSTANT_TRADE_PAY',
        ];
        // dd($bizcont);
        //公共参数
        $data = [
            'app_id'   => $this->app_id,
            'method'   => 'alipay.trade.page.pay',
            'format'   => 'JSON',
            'charset'   => 'utf-8',
            'sign_type'   => 'RSA2',
            'timestamp'   => date('Y-m-d H:i:s'),
            'version'   => '1.0',
            'notify_url'   => $this->notify_url,        //异步通知地址
            'return_url'   => $this->return_url,        // 同步通知地址
            'biz_content'   => json_encode($bizcont),
        ];
        //签名
        $sign = $this->rsaSign($data);
        $data['sign'] = $sign;
        $param_str = '?';
        foreach($data as $k=>$v){
            $param_str .= $k.'='.urlencode($v) . '&';
        }
        $url = rtrim($param_str,'&');
        $url = $this->gate_way . $url;
        
        header("Location:".$url);
    }
    public function rsaSign($params) {
        return $this->sign($this->getSignContent($params));
    }
    protected function sign($data) {
    	if($this->checkEmpty($this->rsaPrivateKeyFilePath)){
    		$priKey=$this->privateKey;
			$res = "-----BEGIN RSA PRIVATE KEY-----\n" .
				wordwrap($priKey, 64, "\n", true) .
				"\n-----END RSA PRIVATE KEY-----";
    	}else{
    		$priKey = file_get_contents($this->rsaPrivateKeyFilePath);
            $res = openssl_get_privatekey($priKey);
    	}
        
        ($res) or die('您使用的私钥格式错误，请检查RSA私钥配置');
        openssl_sign($data, $sign, $res, OPENSSL_ALGO_SHA256);
        if(!$this->checkEmpty($this->rsaPrivateKeyFilePath)){
            openssl_free_key($res);
        }
        $sign = base64_encode($sign);
        return $sign;
    }
    public function getSignContent($params) {
        ksort($params);
        $stringToBeSigned = "";
        $i = 0;
        foreach ($params as $k => $v) {
            if (false === $this->checkEmpty($v) && "@" != substr($v, 0, 1)) {
                // 转换成目标字符集
                $v = $this->characet($v, 'UTF-8');
                if ($i == 0) {
                    $stringToBeSigned .= "$k" . "=" . "$v";
                } else {
                    $stringToBeSigned .= "&" . "$k" . "=" . "$v";
                }
                $i++;
            }
        }
        unset ($k, $v);
        return $stringToBeSigned;
    }
    protected function checkEmpty($value) {
        if (!isset($value))
            return true;
        if ($value === null)
            return true;
        if (trim($value) === "")
            return true;
        return false;
    }
    /**
     * 转换字符集编码
     * @param $data
     * @param $targetCharset
     * @return string
     */
    function characet($data, $targetCharset) {
        if (!empty($data)) {
            $fileType = 'UTF-8';
            if (strcasecmp($fileType, $targetCharset) != 0) {
                $data = mb_convert_encoding($data, $targetCharset, $fileType);
            }
        }
        return $data;
    }
    /**
     * 支付宝同步通知回调
     */
    public function aliReturn()
    {
        header('Refresh:2;url=/order/list');
        echo "订单： ".$_GET['out_trade_no'] . ' 支付成功，正在跳转';
//        echo '<pre>';print_r($_GET);echo '</pre>';die;
//        //验签 支付宝的公钥
//        if(!$this->verify($_GET)){
//            die('簽名失敗');
//        }
//
//        //验证交易状态
////        if($_GET['']){
////
////        }
////
//
//        //处理订单逻辑
//        $this->dealOrder($_GET);
    }
    /**
     * 支付宝异步通知
     */
    public function aliNotify()
    {
        $data = json_encode($_POST);
        $log_str = '>>>> '.date('Y-m-d H:i:s') . $data . "<<<<\n\n";
        //记录日志
        file_put_contents('logs/alipay.log',$log_str,FILE_APPEND);
        //验签
        $res = $this->verify($_POST);
        $log_str = '>>>> ' . date('Y-m-d H:i:s');
        if($res === false){
            //记录日志 验签失败
            $log_str .= " Sign Failed!<<<<< \n\n";
            file_put_contents('logs/alipay.log',$log_str,FILE_APPEND);
        }else{
            $log_str .= " Sign OK!<<<<< \n\n";
            file_put_contents('logs/alipay.log',$log_str,FILE_APPEND);
        }
        //验证订单交易状态
        if($_POST['trade_status']=='TRADE_SUCCESS'){
            //更新订单状态
            $oid = $_POST['out_trade_no'];     //商户订单号
            $info = [
                'is_pay'        => 1,       //支付状态  0未支付 1已支付
                'pay_amount'    => $_POST['total_amount'] * 100,    //支付金额
                'pay_time'      => strtotime($_POST['gmt_payment']), //支付时间
                'plat_oid'      => $_POST['trade_no'],      //支付宝订单号
                'plat'          => 1,      //平台编号 1支付宝 2微信 
            ];
            OrderModel::where(['oid'=>$oid])->update($info);
        }
        //处理订单逻辑
        $this->dealOrder($_POST);
        echo 'success';
    }
    //验签
    function verify($params) {
        $sign = $params['sign'];
        $params['sign_type'] = null;
        $params['sign'] = null;

        if($this->checkEmpty($this->aliPubKey)){
            $pubKey= $this->publicKey;
            $res = "-----BEGIN PUBLIC KEY-----\n" .
                wordwrap($pubKey, 64, "\n", true) .
                "\n-----END PUBLIC KEY-----";
        }else {
            //读取公钥文件
            $pubKey = file_get_contents($this->aliPubKey);
            //转换为openssl格式密钥
            $res = openssl_get_publickey($pubKey);
        }
        
       
        
        //转换为openssl格式密钥
        $res = openssl_get_publickey($pubKey);
        ($res) or die('支付宝RSA公钥错误。请检查公钥文件格式是否正确');
        //调用openssl内置方法验签，返回bool值
        $result = (openssl_verify($this->getSignContent($params), base64_decode($sign), $res, OPENSSL_ALGO_SHA256)===1);
        openssl_free_key($res);
        return $result;
    }
    /**
     * 处理订单逻辑 更新订单 支付状态 更新订单支付金额 支付时间
     * @param $data
     */
    public function dealOrder($data)
    {
        //加积分
        //减库存
    }
}

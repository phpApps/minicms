<?php 


/**
 *
 * 短信验证码 ：使用同一个签名，对同一个手机号码发送短信验证码，支持1条/分钟，累计7条/小时；
 * 短信通知： 使用同一个签名和同一个短信模板ID，对同一个手机号码发送短信通知，支持50条/日（指自然日）；
 * 推广短信：不可向同一手机号连续发送。
 
 * 一条短信是140字节，长短信134字节为一条；
 * 建议400个字以内的短信。
 */
 

include_once 'aliyun-php-sdk-core/Config.php';
use Sms\Request\V20160927 as Sms;


class Aliyunsms 
{

	public function __construct($params=array()){
		$this->params = $params;
	}
	
	public function send($tpl=NULL,$phone=NULL,$param=NULL)
	{    
        $iClientProfile = DefaultProfile::getProfile($this->params['area'], $this->params['accessKey'], $this->params['accessSecret']);        
        $client = new DefaultAcsClient($iClientProfile);    
        $request = new Sms\SingleSendSmsRequest();
        $request->setSignName($this->params['signName']);
        $request->setTemplateCode($tpl);
        $request->setRecNum($phone);
        $request->setParamString($param);
        try {
            $response = $client->getAcsResponse($request);
            return $response;
        }
        catch (ClientException  $e) {
        	return $e->getErrorCode().$e->getErrorMessage();   
        }
        catch (ServerException  $e) {        
            return $e->getErrorCode().$e->getErrorMessage(); 
        }
	}
	
}

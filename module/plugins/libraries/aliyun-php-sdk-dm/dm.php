  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <?php    
        include_once 'aliyun-php-sdk-core/Config.php';
        use Dm\Request\V20151123 as Dm;            
        $iClientProfile = DefaultProfile::getProfile("cn-hangzhou", "LTAIEksSyJFCFGgm", "7JmsGwjNAoZeaAp3KATUJm5LsOOFFE");        
        $client = new DefaultAcsClient($iClientProfile);    
        $request = new Dm\SingleSendMailRequest();     
        $request->setAccountName("cs@email.tenvin.com");
        $request->setFromAlias("天维科技");
        $request->setAddressType(1);
        $request->setTagName("RegCode");
        $request->setReplyToAddress("true");
        $request->setToAddress("303078098@qq.com");        
        $request->setSubject("邮件主题");
        $request->setHtmlBody("邮件正文");        
        try {
            $response = $client->getAcsResponse($request);
            print_r($response);
        }
        catch (ClientException  $e) {
            print_r($e->getErrorCode());   
            print_r($e->getErrorMessage());   
        }
        catch (ServerException  $e) {        
            print_r($e->getErrorCode());   
            print_r($e->getErrorMessage());
        }

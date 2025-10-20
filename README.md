# 聚合短视频解析接口文档

## 聚合短视频解析接口已支持：抖音、快手、小红书、微视、皮皮虾、皮皮搞笑、好看视频、新片场、配音秀、梨视频、今日头条、开眼、陌陌、比心、美拍、b站共十六个平台的短视频去水印解析API接口


### 一. 解析短视频接口
**URL：https://www.52api.cn/api/video_parse**  
**请求方式：GET/POST**  
**请求参数：**  

|字段|类型|必填|备注|赋值|
|---|---|---|---|---|
| key | string | Y | key |开发者后台生成的key|
| url | string | Y | 要解析的短视频地址 |要解析的短视频地址|

**返回结果：**  

**成功：**  

	{"code":200,"msg":"success","data":{"work_title":"#新海诚 \"相比于晴天，我更需要的是你\"","work_cover":"https://p3-sign.douyinpic.com/tos-cn-p-0015/6d835bcba9884f19a4cefd36c477f503_1668247298~tplv-dy-360p.webp?lk3s=138a59ce&x-expires=1762149600&x-signature=fRiDxqZmhMtKa9ZO8MCsOMTHDz8%3D&from=327834062&s=PackSourceEnum_AWEME_DETAIL&se=false&sc=origin_cover&biz_tag=aweme_video&l=20251020144806D85D99C824C8091D2F16","work_type":"video","work_url":"https://v3-reading.douyin.com/72c394affa525594defdb686cde485e8/68f5e948/video/tos/cn/tos-cn-ve-15c001-alinc2/oUsv5CgtNAIXQdliQzexpLBOghADfAEbP7GUEI/?a=1967&ch=0&cr=0&dr=0&cd=0%7C0%7C0%7C0&cv=1&br=2829&bt=2829&cs=0&ds=4&ft=WThMx4EMffPd1B~2Y1jNvAq-antLjrKPLKiCRka4itSoljVhWL6&mime_type=video_mp4&qs=0&rc=OTlmZ2k6NzQ4aTM6NWY0OkBpMzVrdDs6ZnZwZzMzNGkzM0A1Li8tLV82XzMxYmE2Yy1jYSM0amE0cjRncWtgLS1kLTBzcw%3D%3D&btag=80000e00010000&dy_q=1760942887&l=202510201448071FB3AD9541880968ED30"},"exec_time":2.308547,"ip":""}

  






**失败：**	

	{"code":400,"msg":"error","data":null,"exec_time":2.851492,"ip":""}

**返回字段注释** 

|字段名|注释|备注|
|---|---|---|
|code|错误码|错误码:请参考错误码说明|
|msg|错误信息|错误码:请参考错误码说明|
|data|数据内容|解析成功返回的数据内容|
|exec_time|接口执行消耗的时间|接口执行消耗的时间|
|ip|调用接口的客户端ip|调用接口的客户端ip|

PHP EXAMPLE：
	
	<?php
	
	/**
	 * API请求DEMO
	 * 
	 * 本demo支持常见的HTTP请求方法(GET/POST/PUT/DELETE等)
	 */
	
	//基本配置
	$api_key = '';
	$secret_key = '';
	
	// API请求示例：
	try {
	    $client = new ApiClient($api_key, $secret_key);
	    $client->setTimeout(10);
	    $client->setVerifySSL(false); // 关闭SSL验证
	
	    // GET请求示例
	    echo "=== 开始GET请求 ===\n";
	    $response = $client->get('https://www.52api.cn/api/video_parse', [
	        'key' => $api_key,
	        'url' => $_REQUEST["url"] // POST/GET 方法传入的url地址
	    ]);
	    print_r($response);
	    //print_r($client->getLastRequestInfo());
	    /* 
	    // POST表单示例
	    echo "\n=== 开始POST请求 ===\n";
	    $response = $client->post('接口地址', [
	        'key' => $api_key,
	        'key2' => '其他参数'
	    ]);
	    print_r($response);
	    print_r($client->getLastRequestInfo());
	
	    // POST JSON示例
	    echo "\n=== 开始POST JSON请求 ===\n";
	    $response = $client->postJson('接口地址', [
	        'key' => $api_key,
	        'key2' => '其他参数'
	    ]);
	    print_r($response);
	    print_r($client->getLastRequestInfo());
	     */
	} catch (ApiClientException $e) {
	    echo "API请求错误: " . $e->getMessage();
	    if ($e->getCode() > 0) {
	        echo " (HTTP状态码: " . $e->getCode() . ")";
	    }
	    print_r($client->getLastRequestInfo() ?? []);
	}
	
	/**
	 * API客户端类
	 * 
	 * 提供了一个简单的HTTP API客户端实现,支持常见的HTTP请求方法(GET/POST/PUT/DELETE等)
	 * 具有以下主要功能:
	 * - 支持 API 密钥和签名认证
	 * - 可配置请求超时和SSL验证
	 * - 支持自定义请求头
	 * - 支持表单和JSON格式的请求体
	 * - 自动解析响应结果
	 * - 提供详细的请求信息记录
	 * 
	 * 使用示例:
	 * ```
	 * $client = new ApiClient('https://api.example.com', 'api_key', 'secret_key');
	 * $response = $client->get('/users', ['page' => 1]);
	 * ```
	 * 
	 * @throws ApiClientException 当API请求失败时抛出异常
	 */
	class ApiClient
	{
	    private $apiKey;
	    private $secretKey;
	    private $timeout = 30;
	    private $verifySSL = true;
	    private $lastRequestInfo = [];
	    private $defaultHeaders = [];
	
	    /**
	     * 构造函数
	     * 
	     * @param string $apiKey  API密钥（可选）
	     * @param string $secretKey 签名密钥（可选）
	     */
	    public function __construct(string $apiKey = '', string $secretKey = '')
	    {
	        $this->apiKey = $apiKey;
	        $this->secretKey = $secretKey;
	    }
	
	    /**
	     * 设置请求超时时间（秒）
	     */
	    public function setTimeout(int $seconds): self
	    {
	        $this->timeout = $seconds;
	        return $this;
	    }
	
	    /**
	     * 设置是否验证SSL证书
	     */
	    public function setVerifySSL(bool $verify): self
	    {
	        $this->verifySSL = $verify;
	        return $this;
	    }
	
	    /**
	     * 添加默认请求头
	     */
	    public function addDefaultHeader(string $name, string $value): self
	    {
	        $this->defaultHeaders[$name] = $value;
	        return $this;
	    }
	
	    /**
	     * 发送GET请求
	     * 
	     * @param string $endpoint 接口端点
	     * @param array  $query    查询参数
	     * @param array  $headers  额外请求头
	     */
	    public function get(string $endpoint, array $query = [], array $headers = []): array
	    {
	        return $this->request('GET', $endpoint, [
	            'query' => $query,
	            'headers' => $headers
	        ]);
	    }
	
	    /**
	     * 发送POST请求（表单格式）
	     * 
	     * @param string $endpoint 接口端点
	     * @param array  $data     POST数据
	     * @param array  $headers  额外请求头
	     */
	    public function post(string $endpoint, array $data = [], array $headers = []): array
	    {
	        return $this->request('POST', $endpoint, [
	            'form_data' => $data,
	            'headers' => $headers
	        ]);
	    }
	
	    /**
	     * 发送POST请求（JSON格式）
	     * 
	     * @param string $endpoint 接口端点
	     * @param array  $data     POST数据
	     * @param array  $headers  额外请求头
	     */
	    public function postJson(string $endpoint, array $data = [], array $headers = []): array
	    {
	        return $this->request('POST', $endpoint, [
	            'json' => $data,
	            'headers' => array_merge(['Content-Type' => 'application/json'], $headers)
	        ]);
	    }
	
	    /**
	     * 发送PUT请求
	     */
	    public function put(string $endpoint, array $data = [], array $headers = []): array
	    {
	        return $this->request('PUT', $endpoint, [
	            'json' => $data,
	            'headers' => $headers
	        ]);
	    }
	
	    /**
	     * 发送DELETE请求
	     */
	    public function delete(string $endpoint, array $data = [], array $headers = []): array
	    {
	        return $this->request('DELETE', $endpoint, [
	            'json' => $data,
	            'headers' => $headers
	        ]);
	    }
	
	    /**
	     * 获取最后一次请求的详细信息
	     */
	    public function getLastRequestInfo(): array
	    {
	        return $this->lastRequestInfo;
	    }
	
	    /**
	     * 基础请求方法
	     */
	    private function request(string $method, string $endpoint, array $options = []): array
	    {
	        // 初始化cURL
	        $ch = curl_init();
	        $url = ltrim($endpoint, '/');
	
	        // 准备请求头
	        $headers = $this->prepareHeaders($options['headers'] ?? []);
	
	        // 处理查询参数
	        if (!empty($options['query'])) {
	            $url .= '?' . http_build_query($options['query']);
	        }
	
	        // 处理请求体
	        $postData = null;
	        if (isset($options['form_data'])) {
	            $postData = http_build_query($options['form_data']);
	            $headers[] = 'Content-Type: application/x-www-form-urlencoded';
	        } elseif (isset($options['json'])) {
	            $postData = json_encode($options['json']);
	            $headers[] = 'Content-Type: application/json';
	        }
	
	        // 设置cURL选项
	        curl_setopt_array($ch, [
	            CURLOPT_URL => $url,
	            CURLOPT_RETURNTRANSFER => true,
	            CURLOPT_CUSTOMREQUEST => $method,
	            CURLOPT_HTTPHEADER => $headers,
	            CURLOPT_TIMEOUT => $this->timeout,
	            CURLOPT_SSL_VERIFYPEER => $this->verifySSL,
	            CURLOPT_SSL_VERIFYHOST => $this->verifySSL,
	            CURLOPT_HEADER => true,
	        ]);
	
	        if ($method !== 'GET' && $postData !== null) {
	            curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
	        }
	
	        // 执行请求
	        $response = curl_exec($ch);
	        $error = curl_error($ch);
	        $info = $this->lastRequestInfo = curl_getinfo($ch);
	        curl_close($ch);
	
	        // 处理错误
	        if ($error) {
	            throw new ApiClientException("cURL请求失败: " . $error);
	        }
	
	        // 分离响应头和响应体
	        $headerSize = $info['header_size'];
	        $responseHeaders = substr($response, 0, $headerSize);
	        $responseBody = substr($response, $headerSize);
	
	        // 解析响应
	        $result = json_decode($responseBody, true) ?? $responseBody;
	
	        // 检查HTTP状态码
	        if ($info['http_code'] >= 400) {
	            $errorMsg = is_array($result) ? ($result['message'] ?? $responseBody) : $responseBody;
	            throw new ApiClientException("API请求失败: " . $errorMsg, $info['http_code']);
	        }
	
	        return [
	            'status' => $info['http_code'],
	            'headers' => $this->parseHeaders($responseHeaders),
	            'data' => $result
	        ];
	    }
	
	    /**
	     * 准备请求头（自动添加签名）
	     */
	    private function prepareHeaders(array $headers): array
	    {
	        // 合并默认头
	        $headers = array_merge($this->defaultHeaders, $headers);
	
	        // 添加签名头
	        if ($this->apiKey && $this->secretKey) {
	            $timestamp = time();
	            $signString = "key={$this->apiKey}&timestamp={$timestamp}";
	            $signature = hash_hmac('sha256', $signString, $this->secretKey);
	
	            $headers['X-Api-Key'] = $this->apiKey;
	            $headers['X-Api-Timestamp'] = $timestamp;
	            $headers['X-Api-Sign'] = $signature;
	        }
	
	        // 转换为cURL格式
	        $curlHeaders = [];
	        foreach ($headers as $name => $value) {
	            $curlHeaders[] = "$name: $value";
	        }
	
	        return $curlHeaders;
	    }
	
	    /**
	     * 解析响应头
	     */
	    private function parseHeaders(string $headers): array
	    {
	        $parsed = [];
	        foreach (explode("\r\n", $headers) as $i => $line) {
	            if ($i === 0) {
	                $parsed['HTTP_CODE'] = $line;
	            } else {
	                $parts = explode(': ', $line, 2);
	                if (count($parts) === 2) {
	                    $parsed[$parts[0]] = $parts[1];
	                }
	            }
	        }
	        return $parsed;
	    }
	}
	
	class ApiClientException extends \Exception
	{
	    // 自定义异常类
	}


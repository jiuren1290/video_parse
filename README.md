# 我爱API旗下聚合短视频解析接口文档

## 我爱API旗下聚合短视频解析接口已支持：抖音、快手、小红书、微视、皮皮虾、皮皮搞笑、好看视频、新片场、配音秀、梨视频、今日头条、开眼、陌陌、比心、美拍、b站共十六个平台的短视频去水印解析API接口


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


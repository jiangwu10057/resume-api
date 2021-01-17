# resume-api
在线简历预览API

#  接口设计
## 格式
json
## 请求参数
- t时间戳，与r参数一起降低重放攻击的可能性；有效期3分钟
- r随机数，与t参数一起降低重放攻击的可能性来；存储时间3分钟
- d是按字母排序后的json数据的base64值，真正的数据
- s是按字母排序后json数据的md5值，用于校验完整性

# 数据库安全
- 表设计时将加密key单独建表，通过用户ID关联，加密用户敏感信息
- 数据库端口不对外，避免暴力破解和拖库

## 表设计


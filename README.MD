### Dubbo PHP Client

> dubbo-php-client 采用 socket 编程，不改造任何原有 java 接口的情况下，让 php 语言调用 Dubbo 接口。使用 Dubbo 协议中原生支持的 telnet 协议实现。

#### 目标
1. 继续支持 zookeeper，屏蔽服务提供者的可见性。
2. 实现面向对象编程，封装数据接口调用。
2. 实现软负载均衡。
3. 实现多路复用机制。
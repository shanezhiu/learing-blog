## Nginx通过信号进行平滑重启

平滑重启


### 信号机制

Linux 发送信号，　kill -

+ SIGQUIT　quick shutdown
+ SIGUSR1  
+ SIGUSR2
+ SIGHUP
+ SIGWINCH
+ SIGINT

nginx　需要操作 kill -SIG `cat ${PREFIX}/logs/nginx.pid`,pid由主进程持有


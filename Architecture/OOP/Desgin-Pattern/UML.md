## UML


## UML Sequence Diagram

A sequence diagram show object interactions arranged in time sequence.
也被称为event diagrams 或者event scenarios.

其组成元素
1.角色(Actor) 系统角色，可以是人、及其子系统甚至是其他系统
2.对象(Object) 
三种命名方式：1）对象名与类名 2) 只显示类名不显示对象名，即表示他是一个匿名对象
3） 方式只显示对象名不显示类名
3.生命线(Lifeline)
生命线在顺序图中表示为从对象图标向下延伸的一条虚线，表示对象存在的时间。
4.控制焦点(Focus of Control)
控制焦点是顺序图中表示时间段的符号，在这个时间段对象将执行相应的操作。
5.消息(Message)
消息分为同步消息(Synchronous Message)，异步消息(Asynchronous Message) 和返回消息(Return Message)

同步消息=调用纤细(Synchronous Message)
消息的发送者把控制传递给消息的接收者，然后停止活动，等待消息的接收者放弃或者返回控制。用来表示同步的意义。

异步消息(Asynchronous Message)
消息发送者通过消息把信号传递给消息的接收者，然后继续自己的活动，不等待接收者返回消息或者控制。异步消息的接收者和发送者是并发工作的。
返回消息(Return Message) 返回消息表示从过程调用返回
6.自关联消息(Self-Message)
表示方法的自身调用以及一个对象内的一个方法调用另外一个方法。
7.Combined Fragments

时序图是显示对象之间交互的图，这些对象是按时间顺序排列的。

顺序图中显示的是参与交互的对象及其对象之间的消息交互的顺序。
时序图中包括的建模元素主要有上面几个要素



## 参考
1. ["UML建模之时序图"](http://www.cnblogs.com/ywqu/archive/2009/12/22/1629426.html "UML建模之时序图")
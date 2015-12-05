练习笔试题 B2
（考试时间1小时30分钟）
填空题
1. 用二分法查找一个长度为10的排好序的线性表，查找不成功时最多需要比较次数是    4  
2. 从0,1,2,3,4,5,6,7,8,9，这十个数字中任意选出三个不同的数字，“三个数字中不含0和5”的概率是    (8*7*6)/(10*9*8)               
3. 一个三角形三个顶点有3只老鼠，一声枪响，3只老鼠开始沿三角形的边匀速运动，请问他们相遇的概率是       2/3            
4. 写出匹配邮箱地址的正则      /^[\w\-]+@[\w\-]+(\.\w+)+$/                                            
5. 写出如下程序的输出结果
<?php
$str1 = null;
$str2 = false;
echo $str1==$str2 ? '相等' : '不相等';
$str3 = '';
$str4 = 0;
echo $str3==$str4 ? '相等' : '不相等';
$str5 = 0;
$str6 = '0';
echo $str5===$str6 ? '相等' : '不相等';
?>
简答题
1.  写出5个以上你所知道的常用的Linux命令和它的功能
cat，显示文件内容。
cd，改变目录路径。
cp，复制文件。
find，查找文件。
grep，搜索、过滤信息。
ls，列出目录信息。
more，分页显示。
rm，删除文件或目录。
vi，调用vi文本编辑器。
who，显示登录用户信息。

2. HTTP/1.0 中，状态码 200 301 304 403 404 500的含义
200 - 服务器成功返回网页
301(永久移动)请求的网页已永久移动到新位置。
304(未修改)自从上次请求后，请求的网页未修改过
403(禁止)服务器拒绝请求
　　404 - 请求的网页不存在
　　503 - 服务器超时
3. 请写出以下html标签的含义：input form script style table b img
4. 写出PHP(或其他语言)的public、protected、private三种访问控制模式的区别？
属于OOP面向对象语言中的类中访问控制模式
Public可以外部访问
Protected,private只可以内部访问
Public,protected可以被继承
Private不可以被继承
5. 请描述 PHP(或其他语言) Session 的运行机制,大型网站中Session方面应注意什么？
运行机制:客户端将session id传递到服务器，服务器根据session id找到对应的文件，读取的时候对文件内容进行反序列化就得到session的值，保存的时候先序列化再写入
注意:1,session在大访问量网站上确实影响系统性能，影响性能的原因之一由文件系统设计造成，在同一个目录下超过10000个文件时，文件的定位将非常耗时,可以通过修改php.ini中session.save_path设置两级子目录 ,session将存储在两级子目录中，每个目录有16个子目录[0~f]，不过好像PHP session不支持创建目录，你需要事先把那么些目录创建好 。
2,还有一个问题就是小文件的效率问题,可以通过存储方式中的memcache来解决I/O效率低下的问题
3,session同步问题,session同步有很多种，如果你是存储在memcached或者MySQL中，那就很容易了，指定到同样的位置即可,还有一种方法就是在负载均衡那一层保持会话，把访问者绑定在某个服务器上，他的所有访问都在那个服务器上就不需要session同步了
6. 简单描述mysql中，索引，主键，唯一索引，联合索引的区别，对数据库的性能有什么影响(从读写两方面)
索引就相当于对指定的列进行排序,排序有利于对该列的查询，可以大大增加查询效率
建立索引也是要消耗系统资源,所以索引会降低写操作的效率
主键,唯一,联合都属于索引
主键属于唯一索引,且一个表只能有一个主键,主键列不允许空值
唯一索引可以一个表中可以有多个,而且允许为空,列中的值唯一
多个字段的多条件查询多使用联合索引


7. MySQL 数据库中 varchar和char的主要区别是什么，哪种查询效率更高，为什么？
varchar变长字符串,char定长字符串
Char效率更高,由于不需要对储存空间计算后在存储,所以效率更高
8. 解释MySQL外连接、内连接与自连接的区别
Mysql外连接分为左连接(left join....on)和右连接(right join.... on),左连接是以左表作为条件查询关联右表数据,无对应数据则补空,右连接则相反
Mysql内连接(inner join.....on)是做关联查询时,内连接的特性是只显示符合连接条件的记录
Mysql自连接:在FROM clause（子句）中我们可以给这个表取不同的别名， 然后在语句的其它需要使用到该别名的地方用dot（点）来连接该别名和字段名
9.  说说下面这些这些协议的全称和中文解释SMTP、POP3、HTTP、FTP、DNS
Smtp简单邮件协议
Pop3邮局协议
http超文本传输协议
ftp文件传送协议
Dns	域名解析协议
10. javascript 包括那些基本数据类型？
数字,字符串,null,undefined,boolean
11. 用css、html编写一个两列布局的网页，右侧固定宽度200px，左侧自适应
<div style="width:90%;margin:0 auto;background-color:#ccc;overflow:auto;_display:inline-block;">
		<div style="width:200px;float:right;background-color:#f33">右边固定200px宽度</div>
		<div style="margin-right:200px;background-color:#090;border:1px solid blue">左边自适应</div>
	</div>
项目设计
假设有一个包含Tag功能的博客系统，数据库存储采用mysql，用户数量为1000万，预计文章总数为10亿，每天有至少10万的更新量，每天访问量为5000万，对数据库的读写操作的比例超过10：1。
你如何设计该系统，以确保其系统高效，稳定的运行?
提示：可以从数据库设计，系统框架，及网络架构方面进行描述，可以写代码/伪代码辅助说明，可以自由发挥
读写分离,读写服务器比例10:1,使用分页查询减少数据库压力,静态化分页后使用memcache分布式缓存,减少i/o开销和数据压力,增删改时删除对应的静态化数据,通过查询分页,分开静态化对应的分页信息缓存,数据库分库分表分区,使用lvs负载均衡,活跃和不活跃的文章进行分表存储,提高数据库中文章查询
效率,建立联合索引,提高查询效率,使用中文分词技术提高文章内容的查询效率
编写程序（请任选两题）
1. 描述顺序查找和二分查找（也叫做折半查找）算法，顺序查找必须考虑效率，对象可以是一个有序数组
2. 假设有"123<em>abc</em>456<em>def</em>789"这么一个字符串,写一个函数，可以传入一个字符串，和一个要截取的长度。返回截取后的结果。
要求:
1 <em>和</em>标记不得计算在长度之内。
2 截取后的字符串，要保留原有<em>标签，不过如果最后有一个标签没有闭合，则去掉其开始标签。
示例:
题中的字符串，要截取长度5，则返回的字符串应该为:123ab,要截取长度8，应返回123<em>abc</em>45。
function newsubstr($str,$num){
		$strNeed = preg_replace(array('/<\/\w+>/','/<\w+>/'),array('',','),$str);
	
	
	$arr = explode(',',$strNeed);
	$arrCount = array_map('strlen',$arr);
	$newstr = '';
		
		if($num < $arrCount[0]+$arrCount[1] && $num >= 0){
			 $newstr .= ($num<=$arrCount[0]) ? substr($arr[0],0,$num) : substr($arr[0],0,$arrCount[0]).substr($arr[1],0,$num-$arrCount[0]); 
		}else{
			
			foreach($arr as $key=>$val){
			if( $key>1 && $num < array_sum(array_slice($arrCount,0,$key+1)) && $num >= array_sum(array_slice($arrCount,0,$key))){
					//echo $key;
				$newstr .= $arr[0]."<em>{$arr[1]}</em>";
					for($i = 2;$i <= $key; $i++ ){
							$newstr .= $i<$key ? '<em>'.$arr[$i].'</em>' : substr($arr[$key],0,$num-array_sum(array_slice($arrCount,0,$key+1)));
					} 
				}
			
			}
			if($num >= array_sum($arrCount)){
				$newstr = $str;
			}
		}
	echo $newstr;

}
$str = ‘123<em>abc</em>456<em>def</em>789’;
newsubstr($str,8);
3. 一群猴子排成一圈，按1，2，…，n依次编号。然后从第1只开始数，数到第m只,把它踢出圈，从它后面再开始数，再数到第m只，在把它踢出去…，如此不停的进行下去，直到最后只剩下一只猴子为止，那只猴子就叫做大王。要求编程模拟此过程，输入m、n, 输出最后那个大王的编号。用程序模拟该过程。
 function monkeyKing($n, $m) {    //$n为猴子总数,$m为剔除猴子步长
                 $s = 0;    //$s为大王坐标,只有一只猴子时,大王坐标为0
                 for($i = 2; $i <= $n; $i++) {    //依次向后递推,求到共有$n只猴子,剔除步长为$m时的大王坐标
                     $s = ($s + $m) % $i;    //大王坐标递推公式
                 }
                 return $s;
             }
             
             echo monkeyKing(6, 2);
4. 翻转字符串中的单词，字符串仅包含大小写字母和空格，单词间使用空格分隔。
如：输入 “This is PHP”，输出 “PHP is This”
非必要请不要使用PHP自带函数
function myrev($str){
	$arr = explode(' ',$str);
	$num = count($arr);
	for($i = 0; $i < $num/2; $i++){
		$temp = $arr[$i];
		$arr[$i] = $arr[$num-$i-1];
		$arr[$num-$i-1] = $temp;
	}
	return implode(' ',$arr);
}
$str = 'This is PHP';
echo myrev($str);

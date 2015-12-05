选择
01.输出为Mozilla/4.0(compatible;MSIE5.01;WindowNT5.0)时，可能的输出语句是：
	A.$_SERVER['HTTP_USER_AGENT_TYPE'];
	B.$_SERVER['HTTP_USER_AGENT'];
	C.$_SERVER['USER_AGENT'];
	D.$_SERVER['AGENT'];

02.下面功能PHP无法实现的是：
	A.服务器端脚本运行
	B.命令行脚本运行
	C.客户端图形界面（GUI）程序
	D.浏览器端执行DOM操作

03.下面说法不正确的是：
	A.PHP有四种标量类型：布尔型(boolean),整型(integer),浮点型(float),字符串(string)
	B.浮点型(float)与双精度型(double)是同一种类型
	C.符合类型包括:数组(array),对象(object),资源(resource)
	D.伪类型：混合型(mixed),数字型(number),回调(callback)

04.执行下面的代码后，
	<?php
		Echo function_exists('print');
	?>
	得到的输出是：
	A.空
	B.true
	C.false
	D.FALSE

05.下面不是PHP语法的组成部分的函数是：
	A.array
	B.eval
	C.each
	D.list

06.执行下面的代码的结果是什么？
	<?php
		$bool=TRUE;
		Echo gettype($bool);
		Echo is_string($bool);
	?>
	A.boolean
	B.boolean0
	C.booleanFALSE
	D.booleanfalse

07.写出下面代码执行的结果：
	<?php
		$a=12;
		$b=012;
		$c=0x12;
		echo$a,"\n",$b,"\n",$c;
	?>

08.下面代码的执行结果是什么？
	<?php
		Echo 1+2+"3+4+5";
	?>
	A.0
	B.3
	C.6
	D."33+4+5";

09.下面代码加入下面那个函数后返回TRUE:
	return?=='A';
	A.ord(65)
	B.chr(65)
	C.65+''
	D.''+65

10.下面代码的输出正确的是：
	<?php
		$a=array(1=>5,5=>8,22,2=>'8',81);
		echo$a[7];
		echo$a[6];
		echo$a[3];
	?>
	A.空2281B.空8122C.8122空D.空空空

11.下面代码的输出结果：
	<?php
		$a[bar]='hello';
		Echo $a[bar];
		echo $a['bar'];
	?>
	A.hello B.空空 C.报错 D.hellohello

12.写出下面代码的结果：
	<?php
		echo1>>0;
		echo2>>1;
		echo3<<2;
	?>
	A.012 B.106 C.1112 D.123

13.下面对于echo,print的描述正确的是：
	A.echo,print都可以打印多个参数
	B.print可以打印多个参数,echo不可以
	C.echo可以打印多个参数,print不可以
	D.echo,print都不可以打印多个参数

14.对于正面的代码
	<?php
		$fruits=array('strawberry'=>'red','banana'=>'yellow');
	?>
	能够正确得到结果'yellow'的代码是：
	A.echo"Abananais{$fruits['banana']}";
	B.echo"Abananais$fruits['banana']";
	C.echo"Abananais{$fruits[banana]}";
	D.echo"Abananais$fruits[banana]";

15.下面代码执行完成后的结果是什么？
	<?php
		Function change(){
			static$i=0;
			$i++;
			Return $i;
	}
	Print change();
	Print change();
	?>


16.以下代码的执行后是，$result值为：
	<?php
		$srcArray=array(‘a’,’b’,’c’,’d’);
		$randValue=array_rand($srcArray);
		$result=is_string($randValue);
	?>
	A、a
	B、false
	C、trueb
	D、b
	E、c
17.<?php echo count(‘123’)?>输出的是？
	A、3
	B、false
	C、null
	D、1
	E、0
18.以下代码的执行后是，$result值为：
	<?php
		$a=’01’;
		$result=1;
		If(in_array($a,array(‘1’))){
			$result=2;
		}elseif($a==’1’){
			$result=3;
		}elseif($a==’01’){
			$result=4;
		}else{
			$result=5;
		}
	?>
	A、1
	B、2
	C、3
	D、4
	E、5


19.php函数名是否区分大小写?
	A、不区分
	B、区分
20.以下代码的执行后是，$result值为：
	<?php
		$x=””;
		$result=is_null($x);
	?>
	A、null
	B、true
	C、false
	D、1


21.哪种OOP设置模式能让类在整个脚本里只实例化一次？
	A、MVC
	B、代理模式
	C、状态模式
	D、抽象工厂模式
	E、单件模式


22.借助继承，我们可以创建其他类的派生类。那么在PHP中，子类最多可以继承几个父类？
	A、1个
	B、2个
	C、取决于系统资源
	D、3个
	E、想要几个有几个


*23.以下哪种错误类型无法被自定义的错误处理器捕捉到?(双选)
	A、E_WARNING
	B、E_USER_ERROR
	C、E_PARSE
	D、E_NOTICE

答案 B 和 D 正确。出现解析错误往往表示脚本中有语法错误，自定义的错误管理器无
法捕捉到它们的原因很明显：错误管理器在脚本里，而现在无法解析脚本，管理器也
就无法执行。类似的，E_ERROR 表示有致命的运行错误出现，比如内存耗尽。因此脚
本会立刻被中断，因为解释器无法执行后面的代码。



24.执行以下代码，输出结果是
	<?php
	Abstract class a{
		Function __construct(){
			Echo“a”;
		}
	}
	$a=new a();
	?>
	A、a
	B、一个错误警告
	C、一个致命性的报错

25.执行以下代码，输入结果是
	<?php
		Class a{
			Function__construct(){
				Echo“EchoClassaSomething”;
			}
		}
		Class b extends a{
			Function__construct(){
				Echo“EchoClassbSomething”;
			}
		}
		$a=new b();
	?>
	A、echoclassasomethingechoclassbsomething
	B、echoclassbsomethingechoclassasomething
	C、echoclassassomething
	D、echoclassbsomething

26.下面哪个选项没有将john添加到users数组中？ 2分
	(A) $users[] = 'john';
	(B) array_push($users, 'john');
	(C) $users ||= 'john';
	(D) array_unshift($users, 'john');

27.在PHP中，'+'操作符的功能不包括 2分
	A.字符串连接
	B.数组数据合并
	C.变量数据相加

28.下面哪个表达式不能将两个字符串$s1和$s2串联成一个单独的字符串？(  )
	A.$s1+$s2		B.“{$s1}{$s2}”		C.$s1.$s2
	D. implode(‘’,array($s1,$s2))		E.以上所有的方法都能实现

29.下面的脚本运行以后，$array数组所包含的值是什么？(  )
	$array  = array(‘1’,’1’);
	foreach($array as $k=>$v){
		$v  =  2;
	}
A.array(‘2’,’2’)	B.array(‘1’,’1’)	C.array(2,2)		D.array(Null,Null)

30.array_shift()函数的作用是？
	A 在数组中新增一个元素
	B 移除数组中的一个元素
	C 交换一个数组的key和value
	D 清除一个数组
填空
1、执行程序段<?php echo 8%(-2) ?>将输出____。
2、以Apache模块的方式安装PHP，在文件http.conf中首先要用语句____动态装载PHP模块，然后再用语句____使得Apache把所有扩展名为php的文件都作为PHP脚本处理。
3、类的属性可以序列化后保存到session中，从而以后可以恢复整个类，这要用到的函数是____。
4、_____函数能返回脚本里的任意行中调用的函数的名称。该函数同时还经常被用在调试中，用来判断错误是如何发生的。
5、<? $str="cd";
		$$str="abcde";
		$$str.="ok";
		echo $cd;
	?>
	该段代码输出是_______

读程题	


1、(5分)请指出以下代码的错误之处(圈出来并加以改正)
		function baz($y,$a) {
			//$x = new Array();
			$x[‘sales’] = 60;
			$x[‘profit’] = 20;
			foreach($x as $key => $value) {
				echo $key . “ ” . $value . “<BR>”;
			}
		}
	

2、写出以下程序的输出结果 (1分)
　　$b=201;
　　$c=40;
	$a=($b>($c?4:5));
　　echo $a;

3、下面的程序会输出什么 1分)
　　$num = 10;
　　function multiply(){
		$num = $num * 10;
　　}
　　multiply();
　　echo $num;

4、请写出下列PHP代码的执行结果 6分
	$var1 = 5;
	$var2 = 10;
	function foo(&$my_var){
		global $var1;
		$var1 += 2;
		$var2 = 4;
		$my_var += 3; 
		return $var2;
	}
	$my_var = 5;
	echo foo($my_var) ."\n";//4
	echo $my_var ."\n";//8
	echo $var1 ."\n";//7
	echo $var2 ."\n";//10
	$bar = 'foo';
	$my_var = 10;
	echo $bar($my_var) ."\n";//4


5、写出下列代码的输出结果：
	function myfunc($argument){
		echo $argunment + 10;
	}
	$variable = 10;
	echo “myfunc($variable)=”.myfunc($variable);// 20myfunc(10)=

6、写出如下程序的输出结果(5分)
	test='aaaaaa';
	$abc=&$test;
	unset($test);
	echo$abc;

7、写出程序运行的结果
	$a=0;
	$b=0;
	If($a=(3||$b=3)){
		$a++;
		$b++;
	}
	Echo$a.”,”.$b;
	
	$a=0;
	$b=0;
	If($a=(3|$b=3)){
		$a++;
		$b++;
	}
	Echo$a.”,”.$b;
	
结果：1._________________，2.______________________

8、
<?php
	$data = array(‘a’, ‘b’, ‘c’);
	foreach($data as $key=>$val) {
		$val = &$data[$key];
	}
?>

问题1：程序执行时，每一次循环结束后变量$data的值是什么？请解释。
问题2：程序执行完后，变量$data的值是什么？请解释。

问答题
1、实现中文字串截取无乱码的方法。(3分)
Mb_substr();

2、输出用户的IP地址，并且判断用户的IP地址是否在192.168.1.100 --- 192.168.1.150之间(5分)。

Ip2long


3、不断在文件hello.txt头部写入一行“Hello World”字符串，要求代码完整(10分)

$f = fopen("hello.txt","r+");
	$str = fread($f,filesize("hello.txt"));
	rewind($f);
	$str = "bbb\n".$str;
	fwrite($f,$str);

4、请列出3种PHP数组循环操作的语法，并注明每种循环的优缺点 5分

	For
	Foreach()
	While(list($one,$two)= each($array)){
		
}


5、求两个日期的差数,例如2007-2-5~2007-3-6的日期差数(5分)


6、请将2维数组按照name的长度进行重新排序，按照顺序将id赋值(从1开始)。(15分)


7、$array = array(
		array(‘id’ => 0, ‘name’ => ‘123’),
		array(‘id’ => 0, ‘name’ => ‘1234’),
		array(‘id’ => 0, ‘name’ => ‘1235’),
		array(‘id’ => 0, ‘name’ => ‘12356’),
		array(‘id’ => 0, ‘name’ => ‘123abc’));

)


8、在PHP中error_reporting这个函数有什么作用? (1分)


9、简述如何得到当前执行脚本路径，包括所得到参数。(2分)
$_SERVER[‘REQUEST_URI’]


10、mysql_fetch_row() 和mysql_fetch_array之间有什么区别? (1分)


11、GD库是做什么用的? (1分)


12、请说明php中传值与传引用的区别。什么时候传值什么时候传引用?(2分)


13、谈谈asp,php,jsp的优缺点(1分)


14、用PHP写出显示客户端IP与服务器IP的代码1分)


15、CSS里margin和paddin有什么区别?写出padding在3个参数和四个参数情况下,参数所作用的方向

Padding:10px
Padding:10px 20px
Padding:10px 20px 30px;
Padding:10px 20px 30px 40px;


16、在开发项目中，需要上传超过8M的文件，请说明在php.ini需要修改的配置项。(10分)
upload_max_filesize
post_max_size = 80M

17、php是否有安全问题，如果有，请列举说明。


18、从PHP4.2.0开始 PHP默认配置将register_globals配置设定为off,请指出这个设定的作用和对PHP相关程序的影响。(5分)


19.apache默认使用进程管理还是线程管理？如何判断并设置最大连接数？


20、PHP如何执行shell的两种方式
``
Shell_exec()

Shell()


21、写出一个函数，参数为年份和月份，输出结果为指定月的天数

Function getDays($year,$month){
	(Strtotime($year.”-”.$month+1.”-1”)-Strtotime($year.”-”.$month.”-1”))/3600*24
}


22、用PHP写一段代码，实现不使用第3个变量，交换$a,$b的值，$a,$b的初始值自己定。


23、面向对象中接口和抽象类的区别及应用场景



请用PHP设计一个函数，对学生英语考试得分从高到低排序，输入是所有学生的学号和考试得分，返回排好序的考试得分和对应学生的学好。考试满分为100，由于判卷要求，得分不会有小数

Function aaa($array = array(array(‘no’=>1,’score’=>90))){

	

}

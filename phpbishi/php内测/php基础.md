ѡ��
01.���ΪMozilla/4.0(compatible;MSIE5.01;WindowNT5.0)ʱ�����ܵ��������ǣ�
	A.$_SERVER['HTTP_USER_AGENT_TYPE'];
	B.$_SERVER['HTTP_USER_AGENT'];
	C.$_SERVER['USER_AGENT'];
	D.$_SERVER['AGENT'];

02.���湦��PHP�޷�ʵ�ֵ��ǣ�
	A.�������˽ű�����
	B.�����нű�����
	C.�ͻ���ͼ�ν��棨GUI������
	D.�������ִ��DOM����

03.����˵������ȷ���ǣ�
	A.PHP�����ֱ������ͣ�������(boolean),����(integer),������(float),�ַ���(string)
	B.������(float)��˫������(double)��ͬһ������
	C.�������Ͱ���:����(array),����(object),��Դ(resource)
	D.α���ͣ������(mixed),������(number),�ص�(callback)

04.ִ������Ĵ����
	<?php
		Echo function_exists('print');
	?>
	�õ�������ǣ�
	A.��
	B.true
	C.false
	D.FALSE

05.���治��PHP�﷨����ɲ��ֵĺ����ǣ�
	A.array
	B.eval
	C.each
	D.list

06.ִ������Ĵ���Ľ����ʲô��
	<?php
		$bool=TRUE;
		Echo gettype($bool);
		Echo is_string($bool);
	?>
	A.boolean
	B.boolean0
	C.booleanFALSE
	D.booleanfalse

07.д���������ִ�еĽ����
	<?php
		$a=12;
		$b=012;
		$c=0x12;
		echo$a,"\n",$b,"\n",$c;
	?>

08.��������ִ�н����ʲô��
	<?php
		Echo 1+2+"3+4+5";
	?>
	A.0
	B.3
	C.6
	D."33+4+5";

09.���������������Ǹ������󷵻�TRUE:
	return?=='A';
	A.ord(65)
	B.chr(65)
	C.65+''
	D.''+65

10.�������������ȷ���ǣ�
	<?php
		$a=array(1=>5,5=>8,22,2=>'8',81);
		echo$a[7];
		echo$a[6];
		echo$a[3];
	?>
	A.��2281B.��8122C.8122��D.�տտ�

11.����������������
	<?php
		$a[bar]='hello';
		Echo $a[bar];
		echo $a['bar'];
	?>
	A.hello B.�տ� C.���� D.hellohello

12.д���������Ľ����
	<?php
		echo1>>0;
		echo2>>1;
		echo3<<2;
	?>
	A.012 B.106 C.1112 D.123

13.�������echo,print��������ȷ���ǣ�
	A.echo,print�����Դ�ӡ�������
	B.print���Դ�ӡ�������,echo������
	C.echo���Դ�ӡ�������,print������
	D.echo,print�������Դ�ӡ�������

14.��������Ĵ���
	<?php
		$fruits=array('strawberry'=>'red','banana'=>'yellow');
	?>
	�ܹ���ȷ�õ����'yellow'�Ĵ����ǣ�
	A.echo"Abananais{$fruits['banana']}";
	B.echo"Abananais$fruits['banana']";
	C.echo"Abananais{$fruits[banana]}";
	D.echo"Abananais$fruits[banana]";

15.�������ִ����ɺ�Ľ����ʲô��
	<?php
		Function change(){
			static$i=0;
			$i++;
			Return $i;
	}
	Print change();
	Print change();
	?>


16.���´����ִ�к��ǣ�$resultֵΪ��
	<?php
		$srcArray=array(��a��,��b��,��c��,��d��);
		$randValue=array_rand($srcArray);
		$result=is_string($randValue);
	?>
	A��a
	B��false
	C��trueb
	D��b
	E��c
17.<?php echo count(��123��)?>������ǣ�
	A��3
	B��false
	C��null
	D��1
	E��0
18.���´����ִ�к��ǣ�$resultֵΪ��
	<?php
		$a=��01��;
		$result=1;
		If(in_array($a,array(��1��))){
			$result=2;
		}elseif($a==��1��){
			$result=3;
		}elseif($a==��01��){
			$result=4;
		}else{
			$result=5;
		}
	?>
	A��1
	B��2
	C��3
	D��4
	E��5


19.php�������Ƿ����ִ�Сд?
	A��������
	B������
20.���´����ִ�к��ǣ�$resultֵΪ��
	<?php
		$x=����;
		$result=is_null($x);
	?>
	A��null
	B��true
	C��false
	D��1


21.����OOP����ģʽ�������������ű���ֻʵ����һ�Σ�
	A��MVC
	B������ģʽ
	C��״̬ģʽ
	D�����󹤳�ģʽ
	E������ģʽ


22.�����̳У����ǿ��Դ���������������ࡣ��ô��PHP�У����������Լ̳м������ࣿ
	A��1��
	B��2��
	C��ȡ����ϵͳ��Դ
	D��3��
	E����Ҫ�����м���


*23.�������ִ��������޷����Զ���Ĵ���������׽��?(˫ѡ)
	A��E_WARNING
	B��E_USER_ERROR
	C��E_PARSE
	D��E_NOTICE

�� B �� D ��ȷ�����ֽ�������������ʾ�ű������﷨�����Զ���Ĵ����������
����׽�����ǵ�ԭ������ԣ�����������ڽű���������޷������ű���������Ҳ
���޷�ִ�С����Ƶģ�E_ERROR ��ʾ�����������д�����֣������ڴ�ľ�����˽�
�������̱��жϣ���Ϊ�������޷�ִ�к���Ĵ��롣



24.ִ�����´��룬��������
	<?php
	Abstract class a{
		Function __construct(){
			Echo��a��;
		}
	}
	$a=new a();
	?>
	A��a
	B��һ�����󾯸�
	C��һ�������Եı���

25.ִ�����´��룬��������
	<?php
		Class a{
			Function__construct(){
				Echo��EchoClassaSomething��;
			}
		}
		Class b extends a{
			Function__construct(){
				Echo��EchoClassbSomething��;
			}
		}
		$a=new b();
	?>
	A��echoclassasomethingechoclassbsomething
	B��echoclassbsomethingechoclassasomething
	C��echoclassassomething
	D��echoclassbsomething

26.�����ĸ�ѡ��û�н�john��ӵ�users�����У� 2��
	(A) $users[] = 'john';
	(B) array_push($users, 'john');
	(C) $users ||= 'john';
	(D) array_unshift($users, 'john');

27.��PHP�У�'+'�������Ĺ��ܲ����� 2��
	A.�ַ�������
	B.�������ݺϲ�
	C.�����������

28.�����ĸ����ʽ���ܽ������ַ���$s1��$s2������һ���������ַ�����(  )
	A.$s1+$s2		B.��{$s1}{$s2}��		C.$s1.$s2
	D. implode(����,array($s1,$s2))		E.�������еķ�������ʵ��

29.����Ľű������Ժ�$array������������ֵ��ʲô��(  )
	$array  = array(��1��,��1��);
	foreach($array as $k=>$v){
		$v  =  2;
	}
A.array(��2��,��2��)	B.array(��1��,��1��)	C.array(2,2)		D.array(Null,Null)

30.array_shift()�����������ǣ�
	A ������������һ��Ԫ��
	B �Ƴ������е�һ��Ԫ��
	C ����һ�������key��value
	D ���һ������
���
1��ִ�г����<?php echo 8%(-2) ?>�����____��
2����Apacheģ��ķ�ʽ��װPHP�����ļ�http.conf������Ҫ�����____��̬װ��PHPģ�飬Ȼ���������____ʹ��Apache��������չ��Ϊphp���ļ�����ΪPHP�ű�����
3��������Կ������л��󱣴浽session�У��Ӷ��Ժ���Իָ������࣬��Ҫ�õ��ĺ�����____��
4��_____�����ܷ��ؽű�����������е��õĺ��������ơ��ú���ͬʱ�����������ڵ����У������жϴ�������η����ġ�
5��<? $str="cd";
		$$str="abcde";
		$$str.="ok";
		echo $cd;
	?>
	�öδ��������_______

������	


1��(5��)��ָ�����´���Ĵ���֮��(Ȧ���������Ը���)
		function baz($y,$a) {
			//$x = new Array();
			$x[��sales��] = 60;
			$x[��profit��] = 20;
			foreach($x as $key => $value) {
				echo $key . �� �� . $value . ��<BR>��;
			}
		}
	

2��д�����³���������� (1��)
����$b=201;
����$c=40;
	$a=($b>($c?4:5));
����echo $a;

3������ĳ�������ʲô 1��)
����$num = 10;
����function multiply(){
		$num = $num * 10;
����}
����multiply();
����echo $num;

4����д������PHP�����ִ�н�� 6��
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


5��д�����д������������
	function myfunc($argument){
		echo $argunment + 10;
	}
	$variable = 10;
	echo ��myfunc($variable)=��.myfunc($variable);// 20myfunc(10)=

6��д�����³����������(5��)
	test='aaaaaa';
	$abc=&$test;
	unset($test);
	echo$abc;

7��д���������еĽ��
	$a=0;
	$b=0;
	If($a=(3||$b=3)){
		$a++;
		$b++;
	}
	Echo$a.��,��.$b;
	
	$a=0;
	$b=0;
	If($a=(3|$b=3)){
		$a++;
		$b++;
	}
	Echo$a.��,��.$b;
	
�����1._________________��2.______________________

8��
<?php
	$data = array(��a��, ��b��, ��c��);
	foreach($data as $key=>$val) {
		$val = &$data[$key];
	}
?>

����1������ִ��ʱ��ÿһ��ѭ�����������$data��ֵ��ʲô������͡�
����2������ִ����󣬱���$data��ֵ��ʲô������͡�

�ʴ���
1��ʵ�������ִ���ȡ������ķ�����(3��)
Mb_substr();

2������û���IP��ַ�������ж��û���IP��ַ�Ƿ���192.168.1.100 --- 192.168.1.150֮��(5��)��

Ip2long


3���������ļ�hello.txtͷ��д��һ�С�Hello World���ַ�����Ҫ���������(10��)

$f = fopen("hello.txt","r+");
	$str = fread($f,filesize("hello.txt"));
	rewind($f);
	$str = "bbb\n".$str;
	fwrite($f,$str);

4�����г�3��PHP����ѭ���������﷨����ע��ÿ��ѭ������ȱ�� 5��

	For
	Foreach()
	While(list($one,$two)= each($array)){
		
}


5�����������ڵĲ���,����2007-2-5~2007-3-6�����ڲ���(5��)


6���뽫2ά���鰴��name�ĳ��Ƚ����������򣬰���˳��id��ֵ(��1��ʼ)��(15��)


7��$array = array(
		array(��id�� => 0, ��name�� => ��123��),
		array(��id�� => 0, ��name�� => ��1234��),
		array(��id�� => 0, ��name�� => ��1235��),
		array(��id�� => 0, ��name�� => ��12356��),
		array(��id�� => 0, ��name�� => ��123abc��));

)


8����PHP��error_reporting���������ʲô����? (1��)


9��������εõ���ǰִ�нű�·�����������õ�������(2��)
$_SERVER[��REQUEST_URI��]


10��mysql_fetch_row() ��mysql_fetch_array֮����ʲô����? (1��)


11��GD������ʲô�õ�? (1��)


12����˵��php�д�ֵ�봫���õ�����ʲôʱ��ֵʲôʱ������?(2��)


13��̸̸asp,php,jsp����ȱ��(1��)


14����PHPд����ʾ�ͻ���IP�������IP�Ĵ���1��)


15��CSS��margin��paddin��ʲô����?д��padding��3���������ĸ����������,���������õķ���

Padding:10px
Padding:10px 20px
Padding:10px 20px 30px;
Padding:10px 20px 30px 40px;


16���ڿ�����Ŀ�У���Ҫ�ϴ�����8M���ļ�����˵����php.ini��Ҫ�޸ĵ������(10��)
upload_max_filesize
post_max_size = 80M

17��php�Ƿ��а�ȫ���⣬����У����о�˵����


18����PHP4.2.0��ʼ PHPĬ�����ý�register_globals�����趨Ϊoff,��ָ������趨�����úͶ�PHP��س����Ӱ�졣(5��)


19.apacheĬ��ʹ�ý��̹������̹߳�������жϲ����������������


20��PHP���ִ��shell�����ַ�ʽ
``
Shell_exec()

Shell()


21��д��һ������������Ϊ��ݺ��·ݣ�������Ϊָ���µ�����

Function getDays($year,$month){
	(Strtotime($year.��-��.$month+1.��-1��)-Strtotime($year.��-��.$month.��-1��))/3600*24
}


22����PHPдһ�δ��룬ʵ�ֲ�ʹ�õ�3������������$a,$b��ֵ��$a,$b�ĳ�ʼֵ�Լ�����


23����������нӿںͳ����������Ӧ�ó���



����PHP���һ����������ѧ��Ӣ�￼�Ե÷ִӸߵ�����������������ѧ����ѧ�źͿ��Ե÷֣������ź���Ŀ��Ե÷ֺͶ�Ӧѧ����ѧ�á���������Ϊ100�������о�Ҫ�󣬵÷ֲ�����С��

Function aaa($array = array(array(��no��=>1,��score��=>90))){

	

}

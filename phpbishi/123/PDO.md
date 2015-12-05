查询用query  执行增加，删除，修改用exec
$stmt=$pdo->query('select * from user');
$stmt=$pdo->exec(“update user set phone=’’1231231’ where name=’xxxx’”); //修改
$stmt=$pdo->exec(“insert into username(username,password)values(fang,123)”);//添加
$stmt=$pdo->exec(“delete from  dingdan id=3 or id=4”);//删除


PDO获取数据的三种方法
 * 1.fetchALL(); 获取关联数组用PDO::FETCH_ASSOC （NUM，BOTH）
 * 2.fetch();获取单挑数组
 *    遍历使用while
 *    while($arr=$stmt->fetch(PDO::FETCH_ASSOC)){
		
		echo "<pre>";
		print_r($arr);
		echo "</pre>";
		echo "<hr/>";
	}
3.可以通过foreach遍历PDOStatement对象来获取数组
<?php
	$pdo=new PDO('mysql:host=localhost;dbname=db66demo','root','root');				$stmt=$pdo->query('select * from user');
				$arr=$stmt->fetchAll(PDO::FETCH_ASSOC);
				foreach($arr as $v){
					$id=$v['id'];
					$username=$v['username'];
					$password=$v['password'];
					echo "<tr>";
					echo "<td>{$id}</td>";
					echo "<td>{$username}</td>";
					echo "<td>{$password}</td>";
					echo "</tr>";
				}
			?>

我们往往要设置PDO的错误处理方式（建议使用异常的方式）
	 * PDO 对错误的处理
	 * 1.抛出异常 PDO::ERRMODE_EXCEPTION
	 * 2.warning PDO::ERRMODE_WARNING
	 * 3.silent PDO::ERRMODE_SILENT
try{
	$pdo=new PDO('mysql:host=localhost;dbname=db66demo','root','root');
				$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);//设置PDO对于错误的处理方式
				$stmt=$pdo->query('select * from user2');
				
				$arr=$stmt->fetchAll(PDO::FETCH_ASSOC);
				foreach($arr as $v){
					print_r($v);
					echo "<hr/>";
				}
	}catch(PDOException $e){
		echo $e->getMessage();
	}


容错：<?php
try{
$dsn="mysql:host=localhost;dbname=db66";
$pdo=new PDO($dsn,'root','root',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
	//$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$stmt=$pdo->query('select * from user');
	$arr=$stmt->fetchAll(PDO::FETCH_ASSOC);
	echo "<pre>";
	print_r($arr);
	echo "</pre>";
}catch(PDOException $e){
	echo $e->getMessage();
}
?>

绑定
try{
	$dsn="mysql:host=localhost;dbname=db66demo";
	$pdo=new PDO($dsn,'root','root',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
	$sql="select * from user where id=? or username=?";
	$stmt=$pdo->prepare($sql);
	
	//$id=4;
	//$username='ztz';
	$stmt->bindParam(1,$id);       //只能是变量
	$stmt->bindParam(2,$username);
	$stmt->execute();
/*
	$stmt->bindValue(1,4);       //只能是变量
	$stmt->bindValue(2,'ztz');
	$stmt->execute();
*/
	
	$arr=$stmt->fetchAll();
	echo "<pre>";
	print_r($arr);
	echo "</pre>";
}catch(PDOException $e){
	echo $e->getMessage();
}
?>


* 使用预处理的好处：
 * 1.安全性高
 * 2.多次执行方便
预处理绑定的参数只能是可以加单引号的值，不能使反引号的表结构部分

	$sql="insert into user(`username`) values(:username1),(:username2)";
	$stmt=$pdo->prepare($sql);

	$stmt->bindParam(':username1',$username1);
	$stmt->bindParam(':username2',$username2);
	$username1='gege';
	$username2='lady in air';
	$stmt->execute();
	echo $stmt->rowCount();//影响行数
echo $pdo->lastInsertId();//获取插入数据的ID号只有username1时


事务
<?php
	/*
	 * 1.关闭自动提交 set autocommit=0;
	 * 2.开启事务     start transaction;
	 * 3.正常执行sql
	 * 4.根据实际情况决定是否提交或者回滚 commit | rollback
	 *
	 * */

try{
	$money=50;
	$pdo=new PDO('mysql:host=localhost;dbname=db66demo','root','root',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
	 // 1.关闭自动提交
setautocommit=0;
		$pdo->setAttribute(PDO::ATTR_AUTOCOMMIT,false);
	// 2.开启事务
start transaction;
		$pdo->beginTransaction();
	// 3.正常执行sql
		$n1=$pdo->exec("update zt set money=money-{$money} where id=1");
		$n2=$pdo->exec("update ztz2 set money=money+{$money} where id=1");
		if($n1>0 && $n2>0){
			$pdo->commit();
		}else{
			$pdo->rollback();
		}
	 // 4.根据实际情况决定是否提交或者回滚 commit | rollback


}catch(PDOException $e){
	echo $e->getMessage();
	$pdo->rollback();
}
?>

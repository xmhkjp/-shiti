��ѯ��query  ִ�����ӣ�ɾ�����޸���exec
$stmt=$pdo->query('select * from user');
$stmt=$pdo->exec(��update user set phone=����1231231�� where name=��xxxx����); //�޸�
$stmt=$pdo->exec(��insert into username(username,password)values(fang,123)��);//���
$stmt=$pdo->exec(��delete from  dingdan id=3 or id=4��);//ɾ��


PDO��ȡ���ݵ����ַ���
 * 1.fetchALL(); ��ȡ����������PDO::FETCH_ASSOC ��NUM��BOTH��
 * 2.fetch();��ȡ��������
 *    ����ʹ��while
 *    while($arr=$stmt->fetch(PDO::FETCH_ASSOC)){
		
		echo "<pre>";
		print_r($arr);
		echo "</pre>";
		echo "<hr/>";
	}
3.����ͨ��foreach����PDOStatement��������ȡ����
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

��������Ҫ����PDO�Ĵ�����ʽ������ʹ���쳣�ķ�ʽ��
	 * PDO �Դ���Ĵ���
	 * 1.�׳��쳣 PDO::ERRMODE_EXCEPTION
	 * 2.warning PDO::ERRMODE_WARNING
	 * 3.silent PDO::ERRMODE_SILENT
try{
	$pdo=new PDO('mysql:host=localhost;dbname=db66demo','root','root');
				$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);//����PDO���ڴ���Ĵ���ʽ
				$stmt=$pdo->query('select * from user2');
				
				$arr=$stmt->fetchAll(PDO::FETCH_ASSOC);
				foreach($arr as $v){
					print_r($v);
					echo "<hr/>";
				}
	}catch(PDOException $e){
		echo $e->getMessage();
	}


�ݴ�<?php
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

��
try{
	$dsn="mysql:host=localhost;dbname=db66demo";
	$pdo=new PDO($dsn,'root','root',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
	$sql="select * from user where id=? or username=?";
	$stmt=$pdo->prepare($sql);
	
	//$id=4;
	//$username='ztz';
	$stmt->bindParam(1,$id);       //ֻ���Ǳ���
	$stmt->bindParam(2,$username);
	$stmt->execute();
/*
	$stmt->bindValue(1,4);       //ֻ���Ǳ���
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


* ʹ��Ԥ����ĺô���
 * 1.��ȫ�Ը�
 * 2.���ִ�з���
Ԥ����󶨵Ĳ���ֻ���ǿ��Լӵ����ŵ�ֵ������ʹ�����ŵı�ṹ����

	$sql="insert into user(`username`) values(:username1),(:username2)";
	$stmt=$pdo->prepare($sql);

	$stmt->bindParam(':username1',$username1);
	$stmt->bindParam(':username2',$username2);
	$username1='gege';
	$username2='lady in air';
	$stmt->execute();
	echo $stmt->rowCount();//Ӱ������
echo $pdo->lastInsertId();//��ȡ�������ݵ�ID��ֻ��username1ʱ


����
<?php
	/*
	 * 1.�ر��Զ��ύ set autocommit=0;
	 * 2.��������     start transaction;
	 * 3.����ִ��sql
	 * 4.����ʵ����������Ƿ��ύ���߻ع� commit | rollback
	 *
	 * */

try{
	$money=50;
	$pdo=new PDO('mysql:host=localhost;dbname=db66demo','root','root',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
	 // 1.�ر��Զ��ύ
setautocommit=0;
		$pdo->setAttribute(PDO::ATTR_AUTOCOMMIT,false);
	// 2.��������
start transaction;
		$pdo->beginTransaction();
	// 3.����ִ��sql
		$n1=$pdo->exec("update zt set money=money-{$money} where id=1");
		$n2=$pdo->exec("update ztz2 set money=money+{$money} where id=1");
		if($n1>0 && $n2>0){
			$pdo->commit();
		}else{
			$pdo->rollback();
		}
	 // 4.����ʵ����������Ƿ��ύ���߻ع� commit | rollback


}catch(PDOException $e){
	echo $e->getMessage();
	$pdo->rollback();
}
?>

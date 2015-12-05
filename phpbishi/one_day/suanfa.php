<?php
	###########################
	##ð�������㷨             ##  
	##                         ##
	############################
	$array = array(a,f,c,b,e,h,j,i,g);
	
	function maopao_fun($array){
		
		if($len <=1){
			
			return $arr;
		
		}
		
		$count =count($array);
		
		for($i=0;$i<$count;$i++){
			for($j=$count-1;$j>$i;$j--){
				if($array[$j]>$array[$j-1]){
					$tmp = $array[$j];
					$array[$j]=$array[$j-1];
					$array[$j-1]=$tmp;
				}
			
			}
		
		}
		return $array;
	
	}
	
	################################
	## ���������㷨                ## 
	##                             ## 
	##                             ## 
	#################################
	
	function quickSort($arr){
		
		$len=count($arr);
		
		if($len<=1){
			return $arr;
		}
		$key = $arr[0];
		$left_arr =array();
		$right_arr =array();
		
		for($i=1;$i<$len;$i++){
			if($arr[$i]<=$key){
				$left_arr[]=$arr[$i];
			}else{
				$right_arr[]= $arr[$i];
			}
		}
		
		$left_arr =quickSort($left_arr);
		$right_arr =quickSort($right_arr);
		
		return array_merge($left_arr,array($key),$right_arr);
	}
	
	################################
	## ���������㷨                ## 
	##                             ## 
	##                             ## 
	#################################
		
		function insert_sort($arr){
			
			$count =count($arr);
			
			for($i=1;$i<$count;$i++){
				$tmp=$arr[$i];
				$j =$i-1;
				
				while($arr[$j]>$tmp){
					$arr[$j+1]=$arr[$j];
					$arr[$j]=$tmp;
					$j--;
				}
			}
			
			return $arr;
		}
	
		$arr =array(49,38,65,97,76,13,27);
		print_r(insert_sort($arr));
		
		##########################
		##���ֲ����㷨(���ֲ����㷨)
		##
		##
		############################
		
		function find($array,$low,$high,$k){
			
			if($low <=$high){
				$mid=intval(($low+$high)/2);
				
				if($array[$mid]==$k){
					return $mid;
				}elseif($array,$low,$mid-1,$k){
					return find($array,$low,$mid-1,$k);
				}else{
					return find($array,$mid+1,$high,$k);
				}
			
			}
		
			die('Not have...');
		
		}
		
		$array = array(2,3,4,5);
		$n = count($array);
		$r = find($array,9,$n);
		
		**************************************************************
		///php��ȡ�����ַ���(����Դ������)���ַ����ķ�ת��ֻ������utf8����
		**************************************************************
		

		//��ȡutf-8�ַ�������
		//
		//Ϊ��֧�ֶ����ԣ����ݿ�����ַ������ܱ���ΪUTF-8���룬����վ�����п�����Ҫ��php��ȡ�ַ�����һ���֡�Ϊ�˱�������������󣬱�д���µ�UTF-8�ַ�����ȡ����
		//
		//����utf-8��ԭ���뿴 UTF-8 FAQ
		//
		//UTF-8������ַ�������1~3���ֽ���ɣ�������Ŀ�����ɵ�һ���ֽ��жϳ�����(�����Ͽ��ܸ�������������費����3���ֽ�)
		//��һ���ֽڴ���224�ģ�������֮���2���ֽ�һ�����һ��UTF-8�ַ�
		//��һ���ֽڴ���192С��224�ģ�������֮���1���ֽ����һ��UTF-8�ַ�
		//�����һ���ֽڱ������һ��Ӣ���ַ����������ֺ�һС���ֱ����ţ���
		//
		//��ǰΪĳ��վ��ƵĴ���(Ҳ������������ҳ�ĳ��Ƚ�ȡ�ĺ���)
		//
		//$sourcestr ��Ҫ������ַ���
		//$cutlength Ϊ��ȡ�ĳ���(������)
		function cut_str($sourcestr,$cutlength)
		{
			$returnstr='';
			$i=0;
			$n=0;
			$str_length=strlen($sourcestr);//�ַ������ֽ���
			while (($n<$cutlength) and ($i<=$str_length))
			{
				$temp_str=substr($sourcestr,$i,1);
				$ascnum=Ord($temp_str);//�õ��ַ����е�$iλ�ַ���ascii��
				if ($ascnum>=224) //���ASCIIλ����224��
				{
					$returnstr=$returnstr.substr($sourcestr,$i,3); //����UTF-8����淶����3���������ַ���Ϊ�����ַ�
					$i=$i+3; //ʵ��Byte��Ϊ3
					$n++; //�ִ����ȼ�1
				}
				elseif ($ascnum>=192) //���ASCIIλ����192��
				{
					$returnstr=$returnstr.substr($sourcestr,$i,2); //����UTF-8����淶����2���������ַ���Ϊ�����ַ�
					$i=$i+2; //ʵ��Byte��Ϊ2
					$n++; //�ִ����ȼ�1
				}
				elseif ($ascnum>=65 && $ascnum<=90) //����Ǵ�д��ĸ��
				{
					$returnstr=$returnstr.substr($sourcestr,$i,1);
					$i=$i+1; //ʵ�ʵ�Byte���Լ�1��
					$n++; //�������������ۣ���д��ĸ�Ƴ�һ����λ�ַ�
				}
				else //��������£�����Сд��ĸ�Ͱ�Ǳ����ţ�
				{
					$returnstr=$returnstr.substr($sourcestr,$i,1);
					$i=$i+1; //ʵ�ʵ�Byte����1��
					$n=$n+0.5; //Сд��ĸ�Ͱ�Ǳ���������λ�ַ���...
				}
			}

			if ($str_length>$cutlength){
				$returnstr = $returnstr . "...";//��������ʱ��β������ʡ�Ժ�
			}
			return $returnstr;
		}

		//$str = "�л����񹲺͹�AAAAAaaaa";
		//$rstr = cut_str($str, 30);
		//echo $rstr;

		//**
		// *�ַ����ķ�ת
		// *ģ��strrev����
		// *$str string Ҫ������ַ���
		// ***

		function str_rev($str){
			$len = strlen($str);
		   
			$arr = $arr_tmp = array();

			//�Ƚ��ַ���ת���������ʽ
			for($i = 0; $i<$len; $i++){
				//�����ж��Ƿ�Ϊ���� �ǵĻ��������ֽڷ���һ������Ԫ����
				if(ord($str[$i]) >= 224){
					$arr[] = $str[$i].$str[$i+1].$str[$i+2];
					$i = $i+2;
				}elseif(ord($str[$i]) >= 192 && ord($str[$i]) < 224){
					$arr[] = $str[$i].$str[$i+1];
					$i = $i+1;
				}else{
					$arr[] = $str[$i];
				}
			}

			return implode('',array_reverse($arr));
		}

		$estr = "�л����񹲺͹�abcdefg";
		echo $estr."<br>";
		$a = str_rev($estr);
		echo $a;
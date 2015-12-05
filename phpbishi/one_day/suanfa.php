<?php
	###########################
	##冒泡排序算法             ##  
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
	## 快速排序算法                ## 
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
	## 插入排序算法                ## 
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
		##二分查找算法(二分查找算法)
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
		///php截取中文字符串(代码源自网络)，字符串的反转。只适用于utf8编码
		**************************************************************
		

		//截取utf-8字符串函数
		//
		//为了支持多语言，数据库里的字符串可能保存为UTF-8编码，在网站开发中可能需要用php截取字符串的一部分。为了避免出现乱码现象，编写如下的UTF-8字符串截取函数
		//
		//关于utf-8的原理请看 UTF-8 FAQ
		//
		//UTF-8编码的字符可能由1~3个字节组成，具体数目可以由第一个字节判断出来。(理论上可能更长，但这里假设不超过3个字节)
		//第一个字节大于224的，它与它之后的2个字节一起组成一个UTF-8字符
		//第一个字节大于192小于224的，它与它之后的1个字节组成一个UTF-8字符
		//否则第一个字节本身就是一个英文字符（包括数字和一小部分标点符号）。
		//
		//以前为某网站设计的代码(也是现在用在首页的长度截取的函数)
		//
		//$sourcestr 是要处理的字符串
		//$cutlength 为截取的长度(即字数)
		function cut_str($sourcestr,$cutlength)
		{
			$returnstr='';
			$i=0;
			$n=0;
			$str_length=strlen($sourcestr);//字符串的字节数
			while (($n<$cutlength) and ($i<=$str_length))
			{
				$temp_str=substr($sourcestr,$i,1);
				$ascnum=Ord($temp_str);//得到字符串中第$i位字符的ascii码
				if ($ascnum>=224) //如果ASCII位高与224，
				{
					$returnstr=$returnstr.substr($sourcestr,$i,3); //根据UTF-8编码规范，将3个连续的字符计为单个字符
					$i=$i+3; //实际Byte计为3
					$n++; //字串长度计1
				}
				elseif ($ascnum>=192) //如果ASCII位高与192，
				{
					$returnstr=$returnstr.substr($sourcestr,$i,2); //根据UTF-8编码规范，将2个连续的字符计为单个字符
					$i=$i+2; //实际Byte计为2
					$n++; //字串长度计1
				}
				elseif ($ascnum>=65 && $ascnum<=90) //如果是大写字母，
				{
					$returnstr=$returnstr.substr($sourcestr,$i,1);
					$i=$i+1; //实际的Byte数仍计1个
					$n++; //但考虑整体美观，大写字母计成一个高位字符
				}
				else //其他情况下，包括小写字母和半角标点符号，
				{
					$returnstr=$returnstr.substr($sourcestr,$i,1);
					$i=$i+1; //实际的Byte数计1个
					$n=$n+0.5; //小写字母和半角标点等与半个高位字符宽...
				}
			}

			if ($str_length>$cutlength){
				$returnstr = $returnstr . "...";//超过长度时在尾处加上省略号
			}
			return $returnstr;
		}

		//$str = "中华人民共和国AAAAAaaaa";
		//$rstr = cut_str($str, 30);
		//echo $rstr;

		//**
		// *字符串的反转
		// *模拟strrev函数
		// *$str string 要处理的字符串
		// ***

		function str_rev($str){
			$len = strlen($str);
		   
			$arr = $arr_tmp = array();

			//先将字符串转化成数组格式
			for($i = 0; $i<$len; $i++){
				//首先判断是否为中文 是的话把中文字节放在一个数组元素里
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

		$estr = "中华人民共和国abcdefg";
		echo $estr."<br>";
		$a = str_rev($estr);
		echo $a;
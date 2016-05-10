<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ngoại Tệ</title>
</head>

<body>
<?php
    function ngoaite(){
		$vals = array();
		$index = array();
		$data = array();
		$num = 20;
		$arr = array('EUR','USD','GBP','CAD','JPY','CHF','THB');
		
		//
		$content = @file_get_contents("http://www.vietcombank.com.vn/ExchangeRates/ExrateXML.aspx");	
		$xml_parser = xml_parser_create();
		
		xml_parse_into_struct($xml_parser, $content, $vals, $index);
		xml_parser_free($xml_parser);
		//
		$count = 0;
		foreach( $vals as $el){
			if($el['level']==2 && isset($el['attributes'])){
				$at = $el['attributes'];
				if(!in_array($at['CURRENCYCODE'], $arr)) continue;
				$data[$count]['code'] = $at['CURRENCYCODE'];
				$data[$count]['buy'] = $at['BUY'];
				$data[$count]['sell'] = $at['SELL'];
				$count++;
			}
			if($count >= $num) break;
		}
		return $data;
	}?>
	
   <table width="100%" border="0" cellpadding="0" cellspacing="0"  class="giavang" bgcolor="#F5F5F5">
                      <!--DWLayoutTable-->
                      <tr>
                        <td width="64" height="30" align="center" valign="middle" bgcolor="yellow"style=" font-weight:bold;">Loại</td>
                        <td width="61" align="center" valign="middle" bgcolor="yellow"style=" font-weight:bold;">Mua vào </td>
                        <td width="62" align="center" valign="middle" bgcolor="yellow"style=" font-weight:bold;">Bán ra </td>
     </tr>
                       <?php
					               //$mang[]=$ngoaite();
								   $ngoai_te=ngoaite();
					               $count=count($ngoai_te);
												for($i=0;$i<$count;$i++){
											?>
                      <tr>
                        <td height="20" align="center" valign="middle"  style="color:#333333;"><?php echo $ngoai_te[$i]['code']?> </td>
                        <td align="center" valign="middle"  style="color:#333333;"><?php echo $ngoai_te[$i]['buy']?></td>
                        <td align="center" valign="middle"  style="color:#333333;"><?php echo $ngoai_te[$i]['sell']?></td>
                      </tr>
                      
                      
                      
                      
                      
                      <?php }?>
                    </table>
</td>
                  
                  </tr>
                </table>
   
</body>
</html>

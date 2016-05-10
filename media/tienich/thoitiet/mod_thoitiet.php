<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>

<script language="javascript" src="js/ajax.js"></script>
<div style="height:120px; width:140px; margin:auto;">
    <table width="120px" border="0" cellspacing="0" cellpadding="5">         
     <form name="form1" method="post">
        <tr height="20px">
            <td>
                <select name="select" onChange="Weather(this.value);">
                 <option value="0">TP.HCM</option>
                <option value="1">Sơn la</option>
                <option value="2">Hải Phòng</option>
                <option value="3">Hà Nội</option>
                <option value="4">Vinh</option>
                <option value="5">Đà Nẵng</option>
                <option value="6">Nha Trang</option>
                <option value="7">Pleiku</option>
                </select>
        </td>
        </tr>
           </form>
        <tr>
             <td id="content_Weather"><script>Weather(0)</script></td>
        </tr>
     </table>
</div>
 
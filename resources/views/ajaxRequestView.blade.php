<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>CH11 AJAX</title>
</head>
<body>
      <h1>CH11 AJAX</h1>
      <form onsubmit="return false">
            <label>姓名:</label>
            <input type="text" name="name" id="name" placeholder="請輸入姓名"><br>
            <label>年齡:</label>
            <input type="text" name="age" id="age" placeholder="請輸入年齡">
            <input type="submit" value="送出資料" onclick="submit_onclick()">
      </form><br>
      <label>回傳的結果:</label>
      <textarea id="showAjaxResponse" readonly></textarea>
</body>
<script type="text/javascript">
function submit_onclick(){
      var name = document.getElementById("name").value;
      var age = document.getElementById("age").value;
      document.getElementById("name").value = "";
      document.getElementById("age").value = "";
      ajaxRequestPost(name,age);
}

function ajaxRequestPost(name,age){
      xhr = new XMLHttpRequest();
      xhr.open("POST","{{url('/api/ajaxRequest')}}");
      xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
      
      xhr.onload = function(){
            
            if(xhr.status === 200){
                  document.getElementById("showAjaxResponse").value = xhr.responseText;
            }
            else if (xhr.status !== 200){
                  alert("請求發生錯誤，錯誤代碼:HTTP" + xhr.status);
            }
      };
            var sendData = "name="+name+"&age="+age;
            xhr.send(sendData);
}
</script>
</html>


<html>
<head>
     <title>心理テスト（仮）</title>
</head>
<body>
  <h1>ホームページ</h1>
  <p>うひょーーーーーーーー<p/>
     <form action="cgi-bin/formmail.cgi" method="post">
<P>
学籍番号: <input type="text" name="number" size="20">
<p>
名前：<input type="text" name="name" size="20">
</p>
<p>
性別：<input type="radio" name="sex" value="male">男
<input type="radio" name="sex" value="female">女
</p>
<p>
     学年：<select name="grade">
<option value="1">1回生</option>
<option value="2">2回生</option>
<option value="3">3回生</option>
<option value="4">4回生</option>
</select>
</p>
 <p>
<input type="checkbox" name="riyu" value="1" checked="checked">面白い
<input type="checkbox" name="riyu" value="2">役に立つ
<input type="checkbox" name="riyu" value="3">いまいち
</p>
<p>
     <input type="submit" value="送信"><input type="reset" value="リセット">
</p>
</form>
</body>
</html>
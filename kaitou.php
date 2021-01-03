<!-- ボタン -->
<p><input value="解答を表示する" id="btn-20170519-1" type="button" style="margin-bottom:0;"></input></p>
<!-- 解答 -->
<p style="display:none;font-size:1.3em;color:red;" id="ans-20170519-1">247</p>

<!-- JavaScriptのコード -->
<script>
// 画面が読み込まれた後で処理を開始するために、windowオブジェクトの loadイベントに関数を登録します
window.addEventListener( 'load', ()=>{
  let button = document.querySelector("#btn-20170519-1");
  // ボタンの click イベントに関数を登録します
  // flagという変数を関数に閉じ込めたいので、その場で関数を生成して登録します
  button.addEventListener('click', (()=>{
    let flag = true; // 解答を表示している時と非表示の時とを区別するためのフラグ
    // ボタンの clickイベントに登録する関数を返します
    return ()=>{
      // 解答の部分を表示（または非表示）にします
      document.querySelector("#ans-20170519-1").style.display = flag ? "block" : "none";
      // ボタンのラベル文字列をセットします
      button.value = flag ? "解答を隠す" : "解答を表示する";
      // flag を反転させます
      flag = !flag;
    };
  })());
});
</script>
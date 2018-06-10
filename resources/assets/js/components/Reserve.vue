<!--resources/assets/js/components/Articles/Create.vue-->
<template>
  <div class="modal-body">
    <div class="form-group">
      <label for="number" class="col-form-label">ゲストの人数</label>
      <input type="number" name="number" value="1" class="form-control" min="1">
    </div>
    <div class="form-group" id="menu">
      <p>予約したいメニューを選択して下さい。</p>
      <?php 
      foreach($menus as $menu){
        echo '<div class="form-check">'.$menu->title.'（'.$menu->price.'円）</div>'
      }
      
      ?>
    </div>
    
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
      <button type="submit" class="btn btn-primary">確認する</button>

    </div>
  </div>
    
</template>


<script>
    export default {
        // メソッドの実行
        // created() {
        // },
        // メソッドで使う&テンプレート内で使う変数を定義
        data() {
            return {
                title:'',
                content:''
            }
        },
        // (読み込み時に)実行するメソッド
        methods: {
            postArticle(){
                var article = {
                    'title': this.title,
                    'content': this.content
                };
                var id = 1;
                axios.post('/api/article/' + id,article).then(res => {
                    console.log(res.data.title);
                    console.log(res.data.content);
                });
            }

        }
    }
</script>
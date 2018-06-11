<!--templateの中身は一つのdivでくくらないとまずい-->
<template>
  <div class="card-body">
    <div class="card-body" style="border-bottom:1px solid black;" v-for="profile in profile">
      <p>ホスト名：{{ profile.user_name }}</p>
      <p><img :src="profile.header_image" style="width:100px;"></p>
      <p><img :src="profile.profile_image" style="width:100px;"></p>
      <p>{{ profile.text }}</p>
      <p>レビュー評価</p>
      <p>いいね</p>
      <p>{{faved.length}}</p>
      <p></p>
      <p><a :href="'https://'+profile.facebook">Facebook</a></p>
      <p><a :href="'https://'+profile.instagram">Instagram</a></p>
      <p><a :href="'https://'+profile.twitter">Twitter</a></p>
      <p><a href="">メッセージを送る</a></p>
      
              
      <form action="/favorite/register" method="post">
        <input type="hidden" name="fav" value="{{}}">
        {{user}}
        <input type="hidden" name="faved" :value="profile.id">
        <input type="submit" value="お気に入り">
      </form>
      
      
      <div class="card-body" style="border-bottom:1px solid black;" v-for="menu in profile.menus">
        <div class="panel panel-default">
          <img :src="menu.image" style="width:100px;">
          <p>タイトル：{{ menu.title }}</p>
          <p>説明：{{ menu.body }}</p>
          <p>価格：{{ menu.price }}円</p>
        </div>
      </div>
      
      <div class="card-body">
        <p>{{profile.user_name}}さんは大体平日・休日の19:00以降にホストすることができます。</p>
      </div>
      
      <div>
      </div>
      
    </div>
  </div>
</template>
<script>
  export default {
    created() {
      this.getTable();
      
//      let data={
//        grant_type: 'password',
//        client_id: '2',
//        client_secret: '544CJ9ivWCR7PxDa3I4cDbbueSQDQrvNkELTFyFF',
//        username: 'b@gmail.com',
//        password: 'bbbbbb',
//        scope:'',
//      };
//      axios.post('/oauth/token', data)
//      .then(res=>{
//        console.log('got response');
//        console.log(res.data);
//        console.log(res.data.access_token);
//        let header={
//          'Accept': 'application/json',
//          'Authorization': 'Bearer '+res.data.access_token,
//        };
//        axios.get('/api/user', {headers: header})
//        .then(res=>{
//          console.log(res);
//          console.log('got user');
//        });
//      }).catch(res=>{
//        console.log('got a error');
//        console.error(res);
//      });
//      this.getUser();
    },
    data() {
      return {
        profile: [],
        faved: [],
      }
    },
    props: {
      user:{
        type: Object,
      }
    },
    methods: {
      getTable() {
        axios.get('/api/table/'+this.$route.params.profile)
        .then(res =>  {
          this.profile = res.data['profile'];
          this.user = res.data['user'];
          this.faved = res.data['faved'];
          console.log(this.profile);
          console.log(this.faved);
        })
      },
//      getUser(){
//        axios.get("/api/user")
//        .then(res => {
//          console.log(res.data);
//          this.user = res.data;
//        });
//      },
    },
  };
</script>
//jsファイルは分けない方が効率的な感じ。とりあえず分けないでいく。
import Vue from 'vue';
import VueRouter from 'vue-router';
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

Vue.use(VueRouter);

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


Vue.component('profile-edit', require('./components/ProfileEdit.vue'));

Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue')
);
 
Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue')
);
 
Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue')
);


const app = new Vue({
    el: '#app'
});

const imageUpload=new Vue({
  el: '#imageUpload',
  data: {
    uploadedHeaderImage: '',
    uploadedProfileImage: '',
		header_old_show: true,
    header_new_show: false, 
    profile_old_show: true,
    profile_new_show: false, 
  },
  methods: {
    //ヘッダー画像のプレビュー
    onFileHeaderChange(e) {
      // インプットタグのfileの情報を受け取る、targetは普通に選択されたもの、dataTransferはドロップされたもの
      const files = e.target.files || e.dataTransfer.files;
      this.createHeaderImage(files[0]);
    },
    // アップロードした画像を表示
    createHeaderImage(file) {
      const reader = new FileReader();
      reader.onload = (e) => {
        this.uploadedHeaderImage = e.target.result;
        this.header_old_show=false;
        this.header_new_show=true;
      };
      reader.readAsDataURL(file);
    },
		
		
    
    //プロフィール画像のプレビュー
    onFileProfileChange(e) {
      // インプットタグのfileの情報を受け取る、targetは普通に選択されたもの、dataTransferはドロップされたもの
      const files = e.target.files || e.dataTransfer.files;
      this.createProfileImage(files[0]);
    },
    // アップロードした画像を表示
    createProfileImage(file) {
      const reader = new FileReader();
      reader.onload = (e) => {
        this.uploadedProfileImage = e.target.result;
				this.profile_old_show=false;
        this.profile_new_show=true;
      };
      reader.readAsDataURL(file);
    },
  },  
});


const router=new VueRouter({
//  mode: 'history',
//  history ハッシュを消せる。リロード時の挙動が面倒
  routes: [
//    { path: '/article', component: require('./components/Article.vue') },
//    { path: '/article/create', component: require('./components/Create.vue') },
//    { path: '/table/*', component: require('./components/Reserve.vue') },
    { 
      path: '/', 
      component: require('./components/Index.vue'),
    },
    { 
      path: '/table/:profile', 
      name: 'table',
      component: require('./components/Table.vue'),
    },
    
  ]
});

const vueRouter=new Vue({
  router,
  el: '#router'
});


$(function () {
  
  $('[data-toggle="tooltip"]').tooltip();
  
  $('[data-toggle="popover"]').popover();
  
  
//  なぜか時間が選択したら消えてしまう。とりあえず放置。
  flatpickr('#calendar', {
    minDate: "today",
    enableTime: true,
    dateFormat: "Y年m月d日 H時i分",
    locale: 'ja',
    inline: true,
    altInput: true,
    altFormat: "Y年m月d日 H時i分",
  });
  
});

 

 
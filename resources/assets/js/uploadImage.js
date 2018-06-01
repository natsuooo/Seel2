const app=new Vue({
  el: '#app',
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
const app = Vue.createApp({
    data() {
      return {
        selectedImage: '',
      };
    },
    methods: {
      onFileChange(event) {
        const file = event.target.files[0];
        const reader = new FileReader();

        reader.onload = (event) =>{
            this.selectedImage = event.target.result;
        }
        reader.readAsDataURL(file);
      }
    },
  });
  
app.mount('#app');
  
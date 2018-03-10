
<script>
export default {
    data(){
        return {
            name: '',
            email: '',
            bio: '',
            uid: '',
            password: '',
            confirm_password: '',
        }
    },
    methods: {
        register(){
            axios.post('/register', {
                name: this.name,
                email: this.email,
                bio: this.bio,
                password: this.password,
                password_confirmation: this.confirm_password,
                uid: this.uid,
            }).then(response => {
                window.location = '/'
            }).catch(error => {
                this.$toast.open({
                    message: error.response.data.errors[Object.keys(error.response.data.errors)[0]][0],
                    type: 'is-danger'
                });
            });
        }
    }, mounted(){
        console.log(this.token);
    }


}
</script>

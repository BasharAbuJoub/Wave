
<script>
export default {
    data(){
        return {
            data: {
                name: '',
                email: '',
                bio: '', 
                password: '',
                confirm_password: '',
            }
        }
    },
    methods: {
        register(){
            axios.post('/register', {
                name: this.data.name,
                email: this.data.email,
                bio: this.data.bio,
                password: this.data.password,
                password_confirmation: this.data.confirm_password
            }).then(response => {
                window.location = response.data
            }).catch(error => {
                this.$toast.open({
                    message: error.response.data.errors[Object.keys(error.response.data.errors)[0]][0],
                    type: 'is-danger'
                });
            });
        }
    }


}
</script>

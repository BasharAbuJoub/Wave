<script>
export default {
    props: ['originaluser'],
    data(){
        return {
            user: {
                name: '',
                bio: '',
            }
        }
    },
    mounted(){
        this.user.name = this.originaluser.name;
        this.user.bio = this.originaluser.bio;
    },
    methods:{
        save(){
            axios.put('/profile',{
                name: this.user.name,
                bio: this.user.bio,
            }).then(response=> {
                this.$toast.open({
                    message: 'Profile updated.',
                    type: 'is-success'
                });
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

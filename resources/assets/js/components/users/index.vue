<script>
export default {
    data(){
        return{
            users: [],
            filtered: [],
        }
    },
    mounted(){
        axios.get('/api/users').then(reponse => {
            this.users = response.data.data;
            this.filtered = this.users;
        }).catch(error => {
            this.$toast.open({
                message: 'Something worng happened while loading users.',
                type: 'is-danger',
            });
        });
    },
    methods: {
        search(){
            this.filtered = this.users.filter(user => {
                return user.id.toLo
            });
        }
    }


}
</script>

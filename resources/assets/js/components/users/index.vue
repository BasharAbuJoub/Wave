<script>
export default {
    data(){
        return{
            users: [],
            filtered: [],
            search: ''
        }
    },
    mounted(){
        axios.get('/api/users').then(response => {
            this.users = response.data.data;
            this.filtered = response.data.data;
        }).catch(error => {
            this.$toast.open({
                message: 'Something worng happened while loading users.',
                type: 'is-danger',
            });
        });
    },
    methods: {
        filter(){
            this.filtered = this.users.filter(user => {
                return user.name.toLowerCase().includes(this.search.toLowerCase());
            });
        }
    }


}
</script>

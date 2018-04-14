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
        },
        getRole($role){
            switch (parseInt($role)) {
                case 0: 
                    return 'Guest';
                case 2:
                    return 'Instructor';
                case 3:
                    return 'Admin';
                default:
                    return 'N/a';
            }
        }
    }


}
</script>

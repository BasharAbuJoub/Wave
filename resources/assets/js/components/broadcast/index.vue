<script>
export default {
    props: ['create', 'api'],
    data(){
        return{
            broadcasts: {}
        }
    },
    mounted(){
        axios.get(this.api).then(response => {
            this.broadcasts = response.data.data;
        }).catch(error => {
            this.$toast.open({
                message: 'An error occurred while loading the broadcasts.',
                type: 'is-danger'
            });
        });
    }
}
</script>

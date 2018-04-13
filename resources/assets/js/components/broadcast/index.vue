<script>
export default {
    data(){
        return{
            moment: moment,
            broadcasts: {}
        }
    },
    mounted(){
        axios.get('/api/broadcasts').then(response => {
            this.broadcasts = response.data.data;
        }).catch(error => {
            this.$toast.open({
                message: 'An error occurred while loading the broadcasts.',
                type: 'is-danger'
            });
        });


    },
    methods:{
        remove(id){
            axios.delete('/broadcasts/' + id).then(response => {
                this.$toast.open({
                    message: 'Broadcast has been removed.',
                    type: 'is-success'
                });
                this.broadcasts = this.broadcasts.filter(function(device){
                    return device.id != id;
                });


            }).catch(error => {
                this.$toast.open({
                    message: 'Something went wrong !',
                    type: 'is-danger'
                });
            });
        }
    }
}
</script>

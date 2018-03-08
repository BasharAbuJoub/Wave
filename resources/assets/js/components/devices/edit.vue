<script>
export default {
    props: ['device'],
    data(){
        return {
            room: '',
            ip: '',
            type: '0',
            user_id: '',
            users: []    
        }
    },
    mounted(){
        this.room = this.device.room;
        this.ip = this.device.ip;
        this.type = this.device.deviceable_type == 'App\\Hall' ? '0' : '1';
        this.user_id = this.device.deviceable.user_id;

        axios.get('/api/users').then((response=> {
            this.users = response.data.data;
        })).catch(error => {
            this.$toast.open({
                message: 'Error loading users.',
                type: 'is-danger'
            });
        });

    },
    methods: {
        update(){

            axios.put('/devices/' + this.device.id, {
                room: this.room,
                ip: this.ip, 
                user_id: this.user_id,
            }).then(response => {
                this.$toast.open({
                    message: 'Device updated.',
                    type: 'is-success'
                });
            }).catch(error => {
                this.$toast.open({
                    message: 'Oops, Something went wrong !',
                    type: 'is-danger'
                });
            });
        } 
    }
}
</script>

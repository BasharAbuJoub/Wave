<script>
export default {
    props: ['device'],
    data(){
        return {
            room: '',
            ip: '',
            type: '0',
            instructor: '',
            bio: '',
    
        }
    },
    mounted(){
        this.room = this.device.room;
        this.ip = this.device.ip;
        this.type = this.device.deviceable_type == 'App\\Hall' ? '0' : '1';
        this.instructor = this.device.deviceable.instructor;
        this.bio = this.device.deviceable.bio;

    },
    methods: {
        update(){
            console.log(this.device.id);
            axios.patch('/devices/' + this.device.id, {
                room: this.room,
                ip: this.ip, 
                instructor: this.instructor,
                bio: this.bio,
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

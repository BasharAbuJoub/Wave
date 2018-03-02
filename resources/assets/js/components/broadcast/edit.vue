<script>
export default {
    props: ['broadcast'],
    data(){
        return {
            line1: '',
            line2: '',
            start: moment().toDate(),
            end: moment().toDate(),
            devices: [],
            halls: [],
            all: false,
        }
    },
    mounted(){

        this.line1 = this.broadcast.line1;
        this.line2 = this.broadcast.line2;
        this.start = moment(this.broadcast.start, 'HH:mm:sss').toDate();
        this.end = moment(this.broadcast.end, 'HH:mm:sss').toDate();
        this.devices = this.broadcast.devices;

        axios.get('/api/halls').then(response => {
            this.halls = response.data.data;
        }).catch(error => {
            this.$toast.open({
                message: 'Something wrong happened while trying to load devices.',
                type: 'is-danger'
            });
        });
    },
    methods: {
        update(){
            axios.put('/broadcasts/' + this.broadcast.id, {
                line1: this.line1,
                line2: this.line2,
                start: moment(this.start).format('HH:mm:ss'),
                end: moment(this.end).format('HH:mm:ss'),
                devices: this.devices,
            }).then(response => {
                this.$toast.open({
                    message: 'Broadcast Updated',
                    type: 'is-success'
                });
            }).catch(error => {
                this.$toast.open({
                    message: 'Something went wrong !',
                    type: 'is-danger'
                });
            });
        },
        selectAll(){
            if(this.all == true){
                this.halls.forEach(hall => {
                    this.devices.push(hall.id);
                });
            }else{
                this.devices = [];
            }
        }
    }
}
</script>

<script>
export default {
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
        create(){
            axios.post('/broadcasts', {
                line1: this.line1,
                line2: this.line2,
                start: moment(this.start).format('HH:mm:ss'),
                end: moment(this.end).format('HH:mm:ss'),
                devices: this.devices,
            }).then(response => {
                window.location = response.data;
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

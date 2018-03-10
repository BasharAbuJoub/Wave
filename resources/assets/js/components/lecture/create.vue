<script>
export default {
    data(){
        return {
            hall: '',
            user_id: '',
            course: '',
            start: moment().toDate(),
            end: moment().toDate(),
            days: [],
            halls: {},
            users: {}
        }
    },
    mounted(){
        axios.get('/api/users').then(response => this.users = response.data.data);
        axios.get('/api/halls').then(response => this.halls = response.data.data);
    },
    methods: {
        create(){
            axios.post('/lectures', {
                hall_id: this.hall,
                user_id: this.user_id, 
                course: this.course,
                start: moment(this.start).format('HH:mm:ss'),
                end: moment(this.end).format('HH:mm:ss'),
                days: this.days
            }).then(response => {
                window.location = response.data;
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

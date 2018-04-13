<script>
export default {
    props: ['lecture'],
    data(){
        return {
            hall: '',
            user_id: '',
            course: '',
            start: null,
            end: null,
            days: [],
            halls: {},
            users: {}
        }
    },
    mounted(){
        axios.get('/api/users').then(response => this.users = response.data.data);
        axios.get('/api/halls').then(response => this.halls = response.data.data);
        this.hall = this.lecture.hall_id;
        this.user_id = this.lecture.user_id;
        this.course = this.lecture.course;
        this.start = moment(this.lecture.start.date).toDate();
        this.end = moment(this.lecture.end.date).toDate();
        this.days = this.lecture.days;
    },
    methods: {
        update(){
            axios.patch('/lectures/' + this.lecture.id, {
                hall_id: this.hall,
                user_id: this.user_id, 
                course: this.course,
                start: moment(this.start).format('HH:mm:ss'),
                end: moment(this.end).format('HH:mm:ss'),
                days: this.days
            }).then(response => {
                this.$toast.open({
                    message: 'Lecture updated.',
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

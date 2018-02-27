<script>
export default {
    props: ['lecture'],
    data(){
        return {
            hall: '',
            office: '',
            course: '',
            start: moment().toDate(),
            end: moment().toDate(),
            days: [],
            instructor: '',
            halls: {},
            offices: {}
        }
    },
    mounted(){
        axios.get('/api/offices').then(response => this.offices = response.data.data);
        axios.get('/api/halls').then(response => this.halls = response.data.data);
        this.hall = this.lecture.hall_id;
        this.office = this.lecture.office_id;
        this.course = this.lecture.course;
        this.start = moment(this.lecture.start, 'HH:mm:ss').toDate();
        this.end = moment(this.lecture.end, 'HH:mm:ss').toDate();
        this.instructor = this.lecture.instructor;
        this.days = this.lecture.days;
    },
    methods: {
        update(){
            axios.patch('/lectures/' + this.lecture.id, {
                hall_id: this.hall,
                office_id: this.office, 
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

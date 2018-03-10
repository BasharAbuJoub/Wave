<script>
export default {
    data(){
        return {
            lectures: [],
            moment: moment,
            filtered: [],
            search: '',
        }
    },
    mounted(){
        axios.get('/api/mylectures').then(response => {
            this.lectures = response.data.data;
            this.filtered = this.lectures;
        }).catch(error => {
            console.log(error);
        });
    },
    methods:{
        filter(){
            this.filtered = this.lectures.filter(lecture => {
                return lecture.course.toLowerCase().includes(this.search.toLowerCase()) ||
                    lecture.hall.toLowerCase().includes(this.search.toLowerCase()) ||
                    lecture.instructor.toLowerCase().includes(this.search.toLowerCase());
            });
        },
        remove(id){
            axios.delete('/lectures/' + id).then(response => {
                this.$toast.open({
                    message: 'Lecture has been removed.',
                    type: 'is-success'
                });
                this.lectures = this.lectures.filter(function(device){
                    return device.id != id;
                });

                this.filtered = this.lectures;

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

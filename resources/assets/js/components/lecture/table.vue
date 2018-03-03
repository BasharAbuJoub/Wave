<template>
    <div class="box">
        <div class="columns">
            <div class="field column is-6">
                <input type="text" class="input" placeholder="Search course/instructor/hall" v-model="search" @keyup="filter">
            </div>
            <div class="column is-6 ">
                <a href="lectures/create" class="button is-info is-pulled-right"> <icon name="ion-plus-round" size="18" style="margin-right: 4px;"></icon> Create Lecture</a>
            </div>
        </div>
  <table class="table is-fullwidth">
        <tr>
            <th>Course</th>
            <th>Hall</th>
            <th>Instructor</th>
            <th>Start</th>
            <th>End</th>
            <th>Days</th>
            <th>Action</th>
        </tr>
        <tr v-for="lecture in filtered">
            <td>{{lecture.course}}</td>
            <td>{{lecture.hall}}</td>
            <td>{{lecture.instructor}}</td>
            <td>{{moment(lecture.start, 'HH:mm:ss').format('HH:mm')}}</td>
            <td>{{moment(lecture.end, 'HH:mm:ss').format('HH:mm')}}</td>
            <td><span v-for="day in lecture.days">{{moment().day(day).format('dd')}}. </span></td>
            <td>

                <b-tooltip v-if="lecture.announcement" :label="lecture.announcement"
                    position="is-top">
                    <a  :href="lecture.anc_link_edit" class="button is-danger is-small" >Anc</a>
                </b-tooltip>
                
                <a v-else :href="lecture.anc_link" class="button is-small">Anc</a>
                <a title="Edit" :href="lecture.edit" class="button is-info is-small">
                    <icon name="ion-ios-gear" size="18" large></icon>
                </a>
                <a title="Delete" @click.prevent="remove(lecture.id)" class="button is-danger is-small">
                    <icon name="ion-close" size="18" large></icon>
                </a>
            </td>
        </tr>
  </table>
    </div>
</template>



<script>
export default {
    data(){
        return {
            moment: moment,
            lectures: [],
            filtered: [],
            search: '',
        }
    },
    mounted(){
        axios.get('/api/lectures').then(response => {
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

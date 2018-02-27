<template>
    <div class="box">
        <div class="columns">
            <div class="field column is-6">
                <input type="text" class="input" placeholder="Search course/instructor/hall" v-model="search" @keyup="filter">
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
                    <a  :href="lecture.anc_link_edit" class="button is-warning is-small">Anc</a>
                </b-tooltip>
                
                <a v-else :href="lecture.anc_link" class="button is-info is-small">Anc</a>
                <a :href="lecture.edit" class="button is-info is-small">Edit</a>
            </td>
        </tr>
  </table>
    </div>
</template>



<script>
export default {
    props: ['api'],
    data(){
        return {
            moment: moment,
            lectures: [],
            filtered: [],
            search: '',
        }
    },
    mounted(){
        axios.get(this.api).then(response => {
            this.lectures = response.data.data;
            this.filtered = this.lectures;
        }).catch(error => {
            console.log(error);
        });
    },
    methods:{
        filter(){
            this.filtered = this.lectures.filter(lecture => {
                return lecture.contains
            });
        }
    }

}
</script>

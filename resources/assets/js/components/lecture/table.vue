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
            <th>Action</th>
        </tr>
        <tr v-for="lecture in filtered">
            <td>{{lecture.course}}</td>
            <td>{{lecture.hall}}</td>
            <td>{{lecture.instructor}}</td>
            <td>{{lecture.start}}</td>
            <td>{{lecture.end}}</td>
            <td>
                <a href="#" class="button is-info">Anc</a>
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

<template>

    <div>
        <table class="table is-fullwidth ">
            <tr>
                <th>Hall</th>
                <th>Status</th>
                <th>Info</th>
                <th>Start</th>
                <th>End</th>
            </tr>


            <tr v-for="item in data">
                <td><icon name="ion-ios-arrow-right" size="18"></icon> {{item.hall}}</td>
                <td>{{item.status}}</td>
                <td>{{item.info}}</td>
                <td>{{item.start}}</td>
                <td>{{item.end}}</td>
            </tr>


        </table>
    </div>

</template>

<script>
export default {
    data(){
        return {
            data: {},
        }
    },

    mounted(){
        axios.get('/api/overview').then(response => {
            this.data = response.data.data;
        })
        .catch(error => console.log(error));
    }

}
</script>


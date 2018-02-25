<template>


    <div class="column is-6">
        <div class="box">
            <h1 class="title is-4" style="
            color: #047bde;
            display: inline-block;
            margin-bottom: 0px;
            font-weight: 400;">{{device.id}}</h1>
            <span v-if="!done" class="tag is-warning is-pulled-right">Loading</span>
            <span v-else-if="online" class="tag is-success is-pulled-right">Online</span>
            <span v-else class="tag is-danger is-pulled-right">Offline</span>
            <hr style="margin: 10px 0;">
            <table class="table is-fullwidth">
                <tr>
                    <td>IP</td>
                    <td>{{device.ip}}</td>
                </tr>
                <tr>
                    <td>Type</td>
                    <td>{{device.type}}</td>
                </tr>
                <tr v-if="device.instructor != null">
                    <td>Instructor</td>
                    <td>{{device.instructor}}</td>
                </tr>
                <tr v-if="device.bio != null">
                    <td>Bio</td>
                    <td>{{device.bio}}</td>
                </tr>
            </table>
            <div class="has-text-right">
                <a class="button is-danger"><icon name="ion-ios-close-outline" size="24" style="margin-right: 4px;"></icon>Delete</a>
                <a class="button is-info"><icon name="ion-ios-gear-outline" size="24" style="margin-right: 4px;"></icon>Edit</a>
         
            </div>

        </div>
    </div>


</template>



<script>
export default {
    props: ['device'],
    computed: {
        online(){
            return this.$parent.online.includes(this.device.id);
        },
        done(){
            return this.$parent.done;
        }
    }

};
</script>

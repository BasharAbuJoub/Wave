<template>
    <!-- <div class="columns is-multiline">
        <device v-for="device in devices" :device="device"></device>
    </div> -->
    <div>
        <div class="box" style="overflow-x: auto;">
            <div class="columns">
                <div class="column is-6">
                    <div class="field">
                        <input type="text" class="input" v-model="search" @keyup="filter" placeholder="Search Room, IP">
                    </div>
                </div>
                <div class="column is-6 ">
                    <a href="devices/create" class="button is-info is-pulled-right"> <icon name="ion-plus-round" size="18" style="margin-right: 4px;"></icon> Create Device</a>
                </div>
            </div>
            <table class="table is-fullwidth">
                <tr>
                    <th>Room</th>
                    <th>IP</th>
                    <th>Status</th>
                    <th>Type</th>
                    <th>Instructor</th>
                    <th>Action</th>
                </tr>
                <tr v-for="device in filtered">
                    <td>{{device.room}}</td>
                    <td>{{device.ip}}</td>
                    <td>
                        <span v-if="!done" class="tag is-warning">Loading</span>
                        <span v-else-if="online.includes(device.id)" class="tag is-success">Online</span>
                        <span v-else class="tag is-danger">Offline</span>
                    </td>
                    <td><span class="tag ">{{device.type}}</span></td>
                    <td :title="device.bio">
                        <b-tooltip v-if="device.instructor" :label="device.bio"
                            position="is-top">
                            {{device.instructor}}
                        </b-tooltip>
                        <span v-else>
                            -
                        </span>
                        
                    
                    </td>
                    <td>
                        <a title="Edit" class="button is-info is-small" :href="'devices/' + device.id + '/edit'">
                          <icon name="ion-ios-gear" size="18" large></icon>
                        </a>
                        <a title="Delete" class="button is-danger is-small" @click.prevent="destroy(device.id)">
                          <icon name="ion-close-round" size="18"></icon>
                        </a>
                    </td>
                </tr>
            </table>
        </div>
    </div>

</template>


<script>
export default {
  data() {
    return {
      online: [],
      done: false,
      devices: [],
      filtered: [],
      search: ""
    };
  },
  mounted() {
    axios.get("api/devices").then(response => {
      this.devices = response.data.data;
      this.filtered = response.data.data;
    });
    axios
      .get("api/devices/status")
      .then(response => {
        this.online = response.data.online;
        this.done = true;
      })
      .catch(error => (this.status = error));
  },
  methods: {
    filter: function() {
      this.filtered = this.devices.filter(device => {
        return (
          device.room.toLowerCase().includes(this.search.toLowerCase()) ||
          device.ip.toLowerCase().includes(this.search.toLowerCase())
        );
      });
    },
    destroy: function(id) {
      axios
        .delete("devices/" + id)
        .then(response => {
          this.$toast.open({
            message: "Device deleted.",
            type: "is-success"
          });
        })
        .catch(error => {
          this.$toast.open({
            message: "Oops, Something went wrong !",
            type: "is-danger"
          });
        });

      this.devices = this.devices.filter(function(device) {
        return device.id != id;
      });
      this.filtered = this.devices;
    }
  }
};
</script>

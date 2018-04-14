<template>
  <div class="columns">
      <div class="column is-8 is-offset-2">
          <div class="box">
              
              <table class="table is-fullwidth">
                  <tr>
                      <td>Name</td>
                      <td>{{this.user.name}}</td>
                  </tr>
                  <tr>
                      <td>Bio</td>
                      <td>{{this.user.bio}}</td>
                  </tr>
                  <tr>
                      <td>Employee ID</td>
                      <td>{{this.user.uid}}</td>
                  </tr>
                  <tr>
                      <td>Email</td>
                      <td>{{this.user.email}}</td>
                  </tr>
                  <tr>
                      <td>Registration Date</td>
                      <td>{{moment(this.user.registered_at.date).format('YYYY-MM-DD hh:mm')}}</td>
                  </tr>
                  <tr>
                      <td>Role</td>
                      <td>
                          <div class="select">
                              
                            <select v-model="role">
                                <option value="0">Guest</option>
                                <option value="2">Instructor</option>
                                <option value="3">Admin</option>
                            </select>
                          </div>
                          <button @click.prevent="setRole" class="button is-success">Save</button>
                      </td>
                  </tr>
              </table>
          </div>
      </div>
  </div>
</template>


<script>
export default {
  props: ["userid"],
  data() {
    return {
        moment: moment,
        user: {},
        role: 0
    };
  },
  mounted() {
    console.log("User ID: " + this.userid);
    axios
      .get("/api/user/" + this.userid)
      .then(response => {
        this.user = response.data.data;
        this.role = response.data.data.role;
      })
      .catch(error => {
        this.$toast.open({
          message: "Error loading user information !",
          type: "is-danger"
        });
      });
  },
  methods: {
    getRole($role) {
      switch (parseInt($role)) {
        case 0:
          return "Guest";
          break;
        case 1:
          return "N/a";
          break;
        case 2:
          return "Instructor";
          break;
        case 3:
          return "Admin";
          break;
        default:
          return "N/a";
      }
    },
    setRole(){
        axios.put('/api/user/' + this.userid, {
            role: this.role
        }).then(response=>{
            this.$toast.open({
                message: 'Updated user role to ' + this.getRole(this.role),
                type: 'is-success' 
            });
        }).catch(error => {
            this.$toast.open({
                message: 'Error updating user role',
                type: 'is-danger'
            });
        });
    }
  }
};
</script>

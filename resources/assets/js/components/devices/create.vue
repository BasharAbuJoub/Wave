<script>
export default {
  data(){
      return {
          users: [],
          room: '',
          ip: '',
          type: '0',
          user_id: '',
      }
  },
  mounted(){
      axios.get('/api/users').then(reponse => {
            this.users = reponse.data.data;
      }).catch(error => {
            this.$toast.open({
                message: 'Could not load users',
                type: 'is-danger'
            });
      });
  },
  methods: {
      create(){
          axios.post('/devices', 
            {
                room: this.room, 
                ip: this.ip,
                type: this.type,
                user_id: this.user_id
            }
          )
            .then(response => {
                this.$toast.open({
                    message: 'Device successfully added',
                    type: 'is-success'
                });
                this.room = '';
                this.ip = '';
                this.type = '0';
                this.user_id = '';
            })
            .catch(error => {
                this.$toast.open({
                    message: 'Please fill all required fields',
                    type: 'is-danger'
                })
            });
      } 
  }
}
</script>

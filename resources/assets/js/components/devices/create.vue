<script>
export default {
  data(){
      return {
          room: '',
          ip: '',
          type: '0',
          instructor: '',
          bio: '',
      }
  },
  methods: {
      create(){
          axios.post('/devices', 
            {
                room: this.room, 
                ip: this.ip,
                type: this.type,
                instructor: this.instructor,
                bio: this.bio
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
                this.instructor = '';
                this.bio = '';
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

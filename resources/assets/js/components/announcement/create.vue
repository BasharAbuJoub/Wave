<script>
export default {
  props: ['lecture'],
  data(){
      return {
          note: '',
          type: '0',
          count: 1,
      }
  },
  methods: {
      create(){
          axios.post('/announcements', 
            {
                note: this.note, 
                id: this.lecture.id,
                type: this.type,
                count: this.count,
            }
          )
            .then(response => {
                this.$toast.open({
                    message: 'Announcement successfully added',
                    type: 'is-success'
                });
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

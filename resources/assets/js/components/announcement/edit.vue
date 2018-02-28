<script>
export default {
    props: ['lecture', 'anc'],
    data(){
        return {
            note: '',
            type: 0,
        }
    },
    mounted(){
        this.note = this.anc.note;
        this.type = this.anc.type;
    },
    methods: {

        update(){
            axios.put('/announcements/' + this.anc.id, 
            {
                note: this.note,
                type: this.type,
            }).then(response => {
                this.$toast.open({
                    message: 'Updated',
                    type: 'is-success'
                });
            }).catch(error => {
               this.$toast.open({
                   message: 'Ops! Something went worng.',
                   type:    'is-danger'
               }); 
            });
        },
        remove(){
            axios.delete('/announcements/' + this.anc.id).then(response => {
                window.location = response.data;
            }).catch(error => {
                this.$toast.open({
                    message: 'Ops! Something went wrong.',
                    type:   'is-danger'
                });
            });
        }
    }

}
</script>

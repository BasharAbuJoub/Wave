<script>
export default {
    props: ['settings'],
    data(){
        return {
            settingsList: []
        }
    },
    mounted(){
        this.settingsList = this.settings;
    },
    methods: {
        save(){
            axios.post('/settings/save', {
                settings: this.settingsList
            }).then(response => {
                this.$toast.open({
                    message: 'Successfully saved.',
                    type: 'is-success'
                });
            }).catch(error => {
                this.$toast.open({
                    message: 'Something went wrong !',
                    type: 'is-danger'
                });
            });
        }
    }
}
</script>

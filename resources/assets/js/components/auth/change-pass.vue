<script>
export default {
  
    data(){
        return {
            oldPass: '',
            newPass: '',
            newPassConfirmation: '',
        }
    }, 
    methods: {
        change(){
            axios.put('/changepassword', {
                old: this.oldPass,
                new: this.newPass,
                new_confirmation: this.newPassConfirmation,
            }).then(reponse => {
                this.$toast.open({
                    message: 'Password Changed :)',
                    type: 'is-success',
                });
            }).catch(error => {
                this.$toast.open({
                    message: 'Something went worng !', 
                    type: 'is-danger',
                });
            });
        }
    }


}
</script>

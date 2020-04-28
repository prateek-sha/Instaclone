<template>
<div>
    <button class="btn btn-primary ml-2" @click="followuser"  v-text="buttontext"></button>

</div>
</template>

<script>
    export default {

        props: ['userId' , 'follows'],
        mounted() {
            console.log('Component mounted.')
        },
        data : function(){
            return {
                status: this.follows,
            }
        },
        methods: {
            followuser(){

                axios.post('/follow/'+ this.userId)
                    .then(response =>
                    {
                        this.status = ! this.status ;
                        console.log(response);
                    })
                    .catch(errors =>{
                        if (errors.response.status == 401){
                            window.location = '/login';
                        }
                    });
            }
        },
        computed: {
            buttontext(){
                return (this.status) ? 'Unfollow' : 'follow';
            }
        }
    }
</script>

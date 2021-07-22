<template>
    <div>
        <v-overlay :value="show" z-index="10000">
            <v-img :src="src" style="max-height: 100vh; max-width: 100%" @click="show =! show"/>
        </v-overlay>
    </div>
</template>
<script>
export default {
    data(){
        return {
            show: false,
            src: null,
        }
    },
    watch: {
        show(val, old){
            if(val)
                setTimeout(()=>{
                    this.show = false
                }, 1000 * 60)
        }
    },
    created(){
        this.$store.subscribe((mutation, state)=>{
            if(mutation.type === "image/SHOW_IMAGE"){
                this.src = state.image.src
                this.show = true
            }
        })
    }
}
</script>
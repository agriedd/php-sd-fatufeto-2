<template>
    <v-select
        :items="items"
        label="Agama"
        v-model="agama"
        item-text="text"
        item-value="value"
        clearable
        dense
        outlined
        :error-messages="errors.agama"
        name="agama"/>
</template>
<script>
import { mapState } from 'vuex'
export default {
    props: {
        value: { required: true },
        errors: Object,
    },
    computed: {
        ...mapState({
            items: state => state.agama.items
        }),
        agama: {
            get(){
                return this.value
            },
            set(val){
                this.$emit('input', val)
            }
        },
    },
}
</script>
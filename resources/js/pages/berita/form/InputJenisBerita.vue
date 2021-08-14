<template>
    <v-select
        :items="items"
        label="Jenis Berita"
        v-model="jenis"
        item-text="text"
        item-value="value"
        clearable
        dense
        outlined
        :error-messages="errors.jenis"
        name="jenis"/>
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
            items: state => state.jenis_berita.items
        }),
        jenis: {
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
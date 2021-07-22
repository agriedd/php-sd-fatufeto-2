<template>
    <div class="rowspan-2">
        <v-list>
            <v-subheader>
                Visi
            </v-subheader>
            <v-list-item v-for="(visi, i) in visis" :key="i">
                <v-text-field
                    dense
                    outlined
                    v-model="visis[i]"
                    label="Visi"
                    hide-details/>
            </v-list-item>
            <v-subheader>
                Misi
            </v-subheader>
            <v-list-item v-for="(visi, i) in visis" :key="i">
                <v-text-field
                    dense
                    outlined
                    v-model="visis[i]"
                    label="Visi"
                    hide-details/>
            </v-list-item>
        </v-list>
    </div>
</template>
<script>
import { mapActions } from 'vuex'
export default {
    props: {
        errors: { required: true },
        value: { required: true },
    },
    data(){
        return {
            visis: ['']
        }
    },
    computed: {
        item: {
            get(){
                return this.value
            },
            set(val){ this.$emit('input', val) }
        },
    },
    methods: {
    },
    watch: {
    }
}
</script>
<style lang="scss" scoped>

</style>
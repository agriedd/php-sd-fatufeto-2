<template>
    <v-autocomplete
        v-model="guru"
        :name="name"
        :items="items"
        :loading="loading"
        :search-input.sync="search"
        :item-text="itemText"
        item-value="id_guru"
        :label="label"
        required
		dense
        outlined
        v-bind="$attrs"
        persistent-hint
        :error-messages="errors[name]"
        @change="errors[name] = []"/>
    
</template>
<script>
import { mapState, mapGetters, mapActions, mapMutations } from 'vuex'
export default {
    props: {
        value: String|Number,
        errors: { required: true },
        label: { default: "Pilih Wali Kelas" },
        itemText: { default: 'nama' },
        name: { default: 'id_guru' },
    },
    computed: {
        guru: {
            get(){ return this.value },
            set(val){ 
                this.$emit('input', val)
            },
        },
        data_guru(){
            const r = RegExp(this.search)
            return this.items.filter(it => r.test(it.nama) )
        },
        search: {
            get(){ return this.query },
            set(value, old){
                this.query = value
                if(!value) return
                if(this.data_guru.length > 0) return
                if(this.loading) return
                this.loadItems()
            }
        },
    },
    data(){
        return {
            items: [],
            query: '',
            loading: false,
            total: 0,
        }
    },
    methods: {
        ...mapActions({
            getItem: 'guru/get',
        }),
        async loadItems(){
            this.loading = true
            let res = await this.getItem({
                search: this.query,
            }).catch(e => {
                this.loading = false
            })
            this.loading = false
            if(res?.data?.data){
                this.items = res.data.data
            }
        }
    },
    watch: {},
    created(){
        this.loadItems()
    }
}
</script>
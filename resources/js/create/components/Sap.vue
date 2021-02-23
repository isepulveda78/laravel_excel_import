<template>
    <div>
        <div v-if="created">
            <div class="alert alert-success" role="alert">
            PDF Created
            </div>
        </div>
        <div v-if="empty">
            <div class="alert alert-danger" role="alert">
                Must select SAP data to build PDF.
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                Create PDF from SAP
            </div>
            <div class="card-body p-2">
                <form @submit.prevent="post">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" aria-describedby="name" v-model="form.name" ref="name" required>
                    </div>
                    <div>
                        <label for="sap" class="form-label">SAP Data</label>
                        <multiselect 
                        v-model="form.sapfiles" 
                        :multiple="true" 
                        track-by="upc" 
                        label="upc" 
                        :options="sapfiles" 
                        :clear-on-select="false"
                        :allow-empty="false"
                        ></multiselect>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Submit</button>
                </form>
            </div>

            <div>
                
            </div>
        </div>
    </div>
</template>

<script>
import Multiselect from 'vue-multiselect'
export default {
    name: 'create',
    components: { Multiselect },
    props: ['status'],
    data(){
        return {
            form: {
                name: '',
                sapfiles: []
            },
            sapfiles: [],
            created: false,
            empty: false
        }
    },
    methods: {
        post(){
        if(this.form.sapfiles.length > 0){
            axios.post('/api/sapfile', this.form)
            .then(res => {
                   if(res){
                       this.form.name = ''
                       this.form.sapfiles = []
                       this.created = true  
                       this.empty = false

                }
            })
            .then(err => {
                console.log(err)
            })
        }else{
            this.empty = true
        }
      }
    },
    mounted(){
        axios.get("/data/files.json")
        .then(response => (
            this.sapfiles = response.data))
        .then(error => (console.log(error))
        )}
}
</script>
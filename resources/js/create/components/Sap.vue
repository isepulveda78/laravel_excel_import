<template>
    <div>
        <div class="card">
            <div class="card-header">
                Create PDF from SAP
            </div>
            <div class="card-body p-2">
                <form @submit.prevent="post">
                    <!-- <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" aria-describedby="name" v-model="form.name">
                    </div> -->
                    <div>
                        <multiselect v-model="form.sapfiles" :multiple="true" track-by="upc" label="upc" :options="sapfiles"></multiselect>
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
    data(){
        return {
            form: {
                sapfiles: []
            },
            sapfiles: []
        }
    },
    methods: {
        post(){
            axios.post('/api/sapfile', this.form)
            .then(res => {
                console.log(res)
            })
            .then(err => {
                console.log(err)
            })
        }
    },
    mounted(){
        axios.get("/data/files.json")
        .then(response => (this.sapfiles = response.data))
        .then(error => (console.log(error))
        )}
}
</script>
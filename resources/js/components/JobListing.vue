<template>
    <div>
        <form
            @submit="onSubmit"
            @reset="onReset"
            v-if="show"
            method="post"
        >
            <label>
                <span>Search for:</span>
                <input type="text" v-model="form.search" required>
            </label>
            <label>
                <span>Search field:</span>
                <select v-model="form.searchField" required>
                    <option value="title">Title</option>
                    <option value="field">Field</option>
                    <option value="location">Location</option>
                </select>
            </label>
            <button type="submit">Search</button>
            <button type="reset">Reset</button>
        </form>
        <div class="row">
            <div class="col-md-4" v-for="job in output" :key="output.id">
                <a :href="'/jobs/'+job.id">
                    <div>
                        <img :src="job.img">
                    </div>
                    <div>
                        <h3>{{ job.title }}</h3>
                        <h4>{{ job.field }}</h4>
                        <h4>{{ job.location }}</h4>
                    </div>
                </a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                form: {
                    search: '',
                    searchField: null,
                },
                output: this.getAll(),
                show: true
            }
        },
        methods: {
            onSubmit(evt) {
                evt.preventDefault();
                let currentObj = this;
                return axios.post('jobs/search', this.form)
                    .then(function (response) {
                        currentObj.output = response.data
                    })
                    .catch(error => {
                        let er = error.response.data.errors;
                        let ov = Object.values(er);
                        alert(ov);
                    })
            },
            onReset(evt) {
                evt.preventDefault();
                this.getAll();
                this.form.search = ''
                this.form.searchField = null
                this.show = false
                this.$nextTick(() => {
                    this.show = true
                })
            },
            getAll() {
                let currentObj = this;
                return axios.post('jobs/search', this.form)
                    .then(function (response) {
                        currentObj.output = response.data
                    })
                    .catch(error =>{
                        let er = error.response.data.errors;
                        let ov = Object.values(er);
                        alert(ov);
                    })
            }
        }
    }

</script>

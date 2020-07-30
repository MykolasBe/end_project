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
        <div class="job-card-wrap">
            <div class="job-card" v-for="job in output" :key="output.id">
                <a :href="'/jobs/'+job.id "  >
                    <div class="job-card-inner">
                        <div class="job-card-img" :style="{ backgroundImage: `url(${job.img})` }"></div>
                        <div class="job-card-text">
                            <h3>{{ job.title }}</h3>
                            <h4>{{ job.field }}</h4>
                            <h4>{{ job.location }}</h4>
                        </div>
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
                return axios.post('jobs/searchJob', this.form)
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
                this.form.search = ''
                this.form.searchField = null
                this.show = false
                this.getAll();
                this.$nextTick(() => {
                    this.show = true
                })
            },
            getAll() {
                let currentObj = this;
                return axios.post('jobs/searchJob', this.form)
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

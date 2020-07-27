<template>
    <div>
        <form
            @submit="onSubmit"
            @reset="onReset"
            v-if="show"
            method="POST"
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
            <div v-for="job in output" :key="output.id">
                    <div>
                        <h3>{{ job.title }}</h3>
                        <h5>{{ job.field }}</h5>
                        <h5>{{ job.location }}</h5>
                    </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th v-for="header in headers">{{ header }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="application in job.applications" :key="output.id">
                            <td>{{application.first_name + ' ' + application.last_name}}</td>
                            <td>{{application.birth_date}}</td>
                            <td>{{application.location}}</td>
                            <td>{{application.education}}</td>
                            <td>{{application.languages}}</td>
                            <td>{{application.work_experience === 0 ? 'no experience' : 'has experience'}}</td>
                            <td>{{application.work_type}}</td>
                            <td><a :href="'/application/'+application.id">View Applications</a></td>
                        </tr>
                    </tbody>
                </table>
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
                show: true,
                headers: [
                    'Name',
                   'Birth Date',
                   'Location',
                   'Education',
                   'Languages',
                   'Work Experience',
                   'Work Type',
                   'Actions'
                ],
            }
        },
        methods: {
            onSubmit(evt) {
                evt.preventDefault();
                let currentObj = this;
                return axios.post('/jobs/searchApplied', this.form)
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
                this.getAll();
                this.show = false
                this.$nextTick(() => {
                    this.show = true
                })
            },
            getAll() {
                let currentObj = this;
                return axios.post('/jobs/searchApplied', this.form)
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

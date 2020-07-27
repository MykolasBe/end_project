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
                    <option value="first_name"> First name</option>
                    <option value="last_name"> Last name</option>
                    <option value="email"> Email</option>
                    <option value="location"> Location</option>
                    <option value="education"> Education</option>
                    <option value="languages"> Languages</option>
                    <option value="work_experience"> Experience</option>
                    <option value="work_type"> Work type</option>
                </select>
            </label>
            <button type="submit">Search</button>
            <button type="reset">Reset</button>
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th v-for="header in headers">{{ header }}</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="tableRow in output" :key="output.id">
                    <td>{{tableRow.first_name}}</td>
                    <td>{{tableRow.last_name}}</td>
                    <td>{{tableRow.birth_date}}</td>
                    <td>{{tableRow.location}}</td>
                    <td>{{tableRow.education}}</td>
                    <td>{{tableRow.languages}}</td>
                    <td>{{tableRow.work_experience === 0 ? 'no experience' : 'has experience'}}</td>
                    <td>{{tableRow.work_type}}</td>
                    <td><a :href="'/application/'+tableRow.id">View Applications</a></td>
                </tr>
            </tbody>
        </table>
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
                headers:[
                    'First Name',
                    'Last Name',
                    'Birth Date',
                    'Location',
                    'Education',
                    'Languages',
                    'Work Experience',
                    'Work Type',
                    'Actions'
                ],
                show: true
            }
        },
        methods: {
            onSubmit(evt) {
                evt.preventDefault();
                let currentObj = this;
                return axios.post('application/search', this.form)
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
                return axios.post('application/search', this.form)
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

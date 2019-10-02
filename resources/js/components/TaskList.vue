<template>
	<div>		
		<form @submit.prevent="addTask()">
			<div class="form-group">
				<input class="form-control" v-model="task.name" type="text" name="name">
			</div>

			<div class="form-group">
				<button class="btn btn-primary form-control">Add</button>
			</div>
		</form>

		<h1>Things to do:</h1>

		<ul class="list-group">
			<li class="list-group-item" v-if="tasks.length === 0">There are no tasks yet.</li>
			<li class="list-group-item" v-for="(task, index) in tasks">{{ task.name }}
				<button class="btn btn-danger" @click="deleteTask(task.id)">Delete</button>
			</li>
		</ul>
	</div>
</template>

<script>
	export default {
		created() {
			this.fetchTasks();
		},

		data() {
			return {
				tasks: [],
				task: {
					name: '',
				}
			}
		},

		methods: {
			addTask() {
				axios.post('/add_task', this.task)
				.then((response) => {
					this.task.name = '';
					this.fetchTasks();
				})
				.catch((error) => {
					console.log(error);
				});
			},

			deleteTask(id) {
				if (confirm('Are you sure you want to delete this task?')) {
					axios.delete('/tasks/' + id)
					.then((response) => {
						this.fetchTasks();
					})
					.catch((error) => {
						console.log(error);
					});	
				};
			},

			fetchTasks() {
				axios.get('/tasks')
				.then((response) => {
					this.tasks = response.data.tasks;
				})
				.catch((error) => {
					console.log(error);
				});
			}
		},
	};
</script>
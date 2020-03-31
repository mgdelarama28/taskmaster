<template>
	<div>		
		<form @submit.prevent="addTask()">

			<div class="row my-5">
				<div class="form-group col-md-10">
					<input class="form-control" v-model="task.name" type="text" name="name" autocomplete="off">
				</div>

				<div class="form-group col-md-2">
					<button class="btn btn-primary form-control">Add</button>
				</div>
			</div>
		</form>

		<h3 class="text-center mb-3">Things to do:</h3>

		<ul class="list-group">
			<li class="list-group-item text-center font-weight-bold" v-if="tasks.length === 0">There are no tasks yet!</li>
			
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
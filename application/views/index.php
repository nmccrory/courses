<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="assets/css/materialize.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> 
		<script src="assets/js/materialize.js"></script>
	</head>
	<body>
		<div class='row'>
			<div class="col s12">
				<h5>Add a new course</h5>
				<?php  if($this->session->flashdata('errors')):
					foreach($this->session->flashdata('errors') as $error): ?>
						<p><?=$error?></p>
					<?php endforeach; 
					endif;?>
				<form action="process" method="post">
					<input type="hidden" name="action" value="addcourse">
					<div class="input-field col s6">
						<input type="text" class="validate"name="name">
						<label for="name">Name</label>
					</div>
					<div class="col s7">
						<label>Course Description</label>
				        <textarea id="icon_prefix2" class="materialize-textarea" name='description'></textarea>
				    </div>
				    <div class='col s8'>
						<button class='btn waves-effect waves-red' type="submit">Add</button>
					</div>
				</form>
			</div>
		</div>
		<div class="row">
			<div class="col s10">
				<h5>Courses</h5>
				<table>
					<thead>
						<th>Course Name</th>
						<th>Description</th>
						<th>Date Added</th>
						<th>Actions</th>
					</thead>
					<tbody>
						<?php foreach($courses as $course):?>
							<tr>
								<td><?=$course['name']?></td>
								<td><?=$course['description']?></td>
								<td><?=$course['updated_at']?></td>
								<td><a href=<?php echo "'courses/destroy/{$course['id']}'";?>>remove</a></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</body>
</html>
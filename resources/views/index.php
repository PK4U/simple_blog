<!DOCTYPE html>
<html lang="en-US" ng-app="postRecords">
	<head>
		<title>Simple Blog</title>

		<!-- Load Bootstrap CSS -->
		<link href="<?= asset('css/bootstrap.min.css') ?>" rel="stylesheet">
	</head>
	<body ng-controller="postsController">
		<div class="jumbotron">
			<h1>Simple Blog!</h1>
			<p>Bacon ipsum dolor amet prosciutto t-bone shoulder frankfurter, pls help us! strip steak spare ribs chuck.</p>
			<p><button id="btn-add" class="btn btn-primary btn-xs" ng-click="toggle('add', 0)">New Post</button></p>
		</div>
		
		<div>

			<!-- Table-to-load-the-data Part -->
			<table class="table">
				<tbody>
					<tr ng-repeat="post in posts">
						<td>
							<div class='container'>
								<div class="panel panel-default">
									<div class="panel-heading">
										<h3 class="panel-title">{{ post.title }}</h3>
									</div>
									<div class="panel-body">
										{{ post.body }}
									</div>
									<div class="panel-footer"><small>Posted on {{ post.updated_at }} by {{ post.author }}</small></div>
									</div>
								</div>
							</td>
							<td>
								<button class="btn btn-default btn-xs btn-detail" ng-click="toggle('edit', post.id)">Edit</button>
								<button class="btn btn-danger btn-xs btn-delete" ng-click="confirmDelete(post.id)">Delete</button>
							</td>
						</tr>
					</tbody>
			</table>
			
				
			<!-- End of Table-to-load-the-data Part -->
			<!-- Modal (Pop up when detail button clicked) -->
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
							<h4 class="modal-title" id="myModalLabel">{{form_title}}</h4>
						</div>
						<div class="modal-body">
							<form name="frmPosts" class="form-horizontal" novalidate="">

								<div class="form-group error">
									<label for="inputEmail3" class="col-sm-3 control-label">Title</label>
									<div class="col-sm-9">
										<input type="text" class="form-control has-error" id="title" name="title" placeholder="Day 16: halp." value="{{title}}" 
										ng-model="post.title" ng-required="true">
										<span class="help-inline" 
										ng-show="frmPosts.title.$invalid && frmPosts.title.$touched">A title is required</span>
									</div>
								</div>

								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Body</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" id="body" name="body" placeholder="The rescue team is trapped here with us. Who will rescue the rescue team?" value="{{body}}" 
										ng-model="post.body" ng-required="true">
										<span class="help-inline" 
										ng-show="frmPosts.body.$invalid && frmPosts.body.$touched">Body field is required</span>
									</div>
								</div>

								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Author</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" id="author" name="author" placeholder="Nameless Survivo" value="{{author}}" 
										ng-model="post.author" ng-required="true">
									<span class="help-inline" 
										ng-show="frmPosts.author.$invalid && frmPosts.author.$touched">Author field is required</span>
									</div>
								</div>

							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-primary" id="btn-save" ng-click="save(modalstate, id)" ng-disabled="frmPosts.$invalid">Save changes</button>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Load Javascript Libraries (AngularJS, JQuery, Bootstrap) -->
		<script src="<?= asset('app/lib/angular/angular.min.js') ?>"></script>
		<script src="<?= asset('js/jquery.min.js') ?>"></script>
		<script src="<?= asset('js/bootstrap.min.js') ?>"></script>
		
		<!-- AngularJS Application Scripts -->
		<script src="<?= asset('app/app.js') ?>"></script>
		<script src="<?= asset('app/controllers/posts.js') ?>"></script>
	</body>
</html>
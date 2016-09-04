
<html ng-app="myapp" lang="en">
<head>
    <meta charset="utf-8">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular.min.js"></script> 
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular-route.min.js"></script>
    <title>Keywords</title>
    <script>
	
	var app = angular.module('myapp',[]);
	
    app.controller('KeywordsController',function($scope,$http){
	 	$http.get('/keywords/view').success(function(data){
	 		console.log("success");
	 		console.log(data);
			$scope.keywords = data;
		});
	 })
	 
		
</script>
</head>
<body>
<div class="navbar navbar-default" id="navbar">
    <div class="container" id="navbar-container">
    	<div class="navbar-header">
        	<h3>Keywords</h3>
        </div>
    </div>
</div>
<div ng-controller="KeywordsController">
	<div class="container">
		<table class="table table-striped table-bordered">
    		<tbody>
           		<tr ng-repeat = "key in keywords track by $index">
            		<td>{{ key.Keyword }}</td> 
            	</tr>
        	</tbody>                            
   		</table>
 	</div>
 </div>


	
 
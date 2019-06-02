<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Manager Area | Requests</title>
  <link href="../Public/css/bootstrap.min.css" rel="stylesheet">
  <link href="../Public/css/style.css" rel="stylesheet">
  <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
</head>

<body>

  <nav class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
          aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">HRMS</a>
      </div>
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li><a href="Overview">Dashboard</a></li>
          <li class="active"><a href="#">Requests</a></li>
          <li><a href="Tasks">Tasks</a></li>
          <li><a href="Employees">Employees</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#">Welcome, <?php echo $args['user']; ?></a></li>
          <li><a href="Default">Logout</a></li>
        </ul>

      </div>
    </div>
  </nav>

  <header id="header">
    <div class="container">
      <div class="row">
        <div class="col-md-10">
          <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Requests</h1>
        </div>
        <div class="col-md-2">
          <div class="dropdown create">
            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="true">
              Manage
              <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
              <li><a type="button" data-toggle="modal" data-target="#addTask">Add Task</a></li>
              <li><a href="#">See Requests</a></li>
              <li><a href="Employees">Employee</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </header>

  <section id="breadcrumb">
    <div class="container">
      <ol class="breadcrumb">
        <li><a href="Overview">Dashboard</a></li>
        <li class="active">Requests</li>
      </ol>
    </div>
  </section>

  <section id="main">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="list-group">
            <a href="Overview" class="list-group-item active main-color-bg">
              <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard
            </a>
            <a href="#" class="list-group-item"><span class="glyphicon glyphicon-list-alt"
                                                                 aria-hidden="true"></span> Requests <span class="badge"><?php echo $args['numberOfRequests']; ?></span></a>
            <a href="Tasks" class="list-group-item"><span class="glyphicon glyphicon-pencil"
                                                              aria-hidden="true"></span> Tasks <span class="badge"><?php echo $args['numberOfCompletedTasks']; ?></span></a>
            <a href="Employees" class="list-group-item"><span class="glyphicon glyphicon-user"
                                                                  aria-hidden="true"></span> Employees <span class="badge"><?php echo $args['numberOfEmployees']; ?></span></a>
          </div>

          <div class="well">
            <h4>Hours Worked</h4>
            <div class="progress">
              <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                style="width: 60%;">
                60%
              </div>
            </div>
            <h4>Resources Used </h4>
            <div class="progress">
              <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                style="width: 40%;">
                40%
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-9">
          <!-- Pending Requests -->
          <div class="panel panel-default">
            <div class="panel-heading main-color-bg">
              <h3 class="panel-title">Pendding Requests</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-12">
                  <input class="form-control" type="text" placeholder="Filter Requests...">
                </div>
              </div>
              <br>
              <table class="table table-striped table-hover">
                <tr>
                  <th>Title</th>
                  <th>Employee</th>
                  <th>Requested On</th>
                  <th>Leave Form</th>
                  <th></th>
                </tr>
                  <?php

                  foreach($args['pendingRequests'] as  $row) {
                      echo "<tr>";
                      echo "<td>". $row['name'] ."</td>";
                      echo "<td>". $row['request_title'] ."</td>";
                      echo "<td>". $row['request_date'] ."</td>";

                      echo "<td><a class=\"btn btn-default\" href=\"#\">View</a></td>";
                      echo "<td><a class=\"btn btn-success\" href=\"#\">Approve</a> <a class=\"btn btn-danger\" href=\"#\">Decline</a></td>";
                      echo "</tr>";
                  }
                  ?>

              </table>
            </div>
          </div>
          <div>
            <!-- Approved Requests -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Approved Requests</h3>
              </div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-12">
                    <input class="form-control" type="text" placeholder="Filter Requests...">
                  </div>
                </div>
                <br>
                <table class="table table-striped table-hover">
                  <tr>
                    <th>Title</th>
                    <th>Employee</th>
                    <th>Requested On</th>
                    <th>Approved On</th>
                    <th>Leave Form</th>
                    <th></th>
                  </tr>
                  <tr>
                    <td>Vacation</td>
                    <td>Blet Beqa</td>
                    <td>Dec 12, 2016</td>
                    <td>Dec 12, 2016</td>
                    <td><a class="btn btn-default" href="#">View</a></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Pregnancy Leave</td>
                    <td>Fjolla Hajdarhoxha</td>
                    <td>Dec 13, 2016</td>
                    <td>Dec 12, 2016</td>
                    <td><a class="btn btn-default" href="#">View</a></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Medicdal Leave</td>
                    <td>Shpend Jahiri</td>
                    <td>Dec 13, 2016</td>
                    <td>Dec 12, 2016</td>
                    <td><a class="btn btn-default" href="#">View</a></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Medical Leave</td>
                    <td>Mali Retkoceri</td>
                    <td>Dec 14, 2016</td>
                    <td>Dec 12, 2016</td>
                    <td><a class="btn btn-default" href="#">View</a></td>
                    <td></td>
                  </tr>
                </table>
              </div>
            </div>

          </div>
        </div>
      </div>
  </section>

  <footer id="footer">
    <p>Copyright HRMS, &copy; 2019</p>
  </footer>

  <!-- Modals -->

  <!-- Add Task -->
  <div class="modal fade" id="addTask" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form>
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Add Task</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label>Task Title</label>
              <input type="text" class="form-control" placeholder="Task Title">
            </div>
            <div class="form-group">
              <label>Task Body</label>
              <textarea name="editor1" class="form-control" placeholder="Task Body"></textarea>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox"> Published
              </label>
            </div>
            <div class="form-group">
              <label>Due Date</label>
              <input type="text" class="form-control" placeholder="Add a time penalty...">
            </div>
            <div class="form-group">
              <label>Task Budget</label>
              <input type="text" class="form-control" placeholder="Add task budget...">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    CKEDITOR.replace('editor1');
  </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="../Public/js/bootstrap.min.js"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Page</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('admin/css/logo-nav.css') }}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <a class="btn" data-toggle="modal" data-target="#createUser"><i class="fa fa-user-plus fa-2x" aria-hidden="true"></i></a>
                User CRUD
            </div>

            <div class="panel-body">
                <table id="all-users" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Admin</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $key => $user)
                        <tr>
                            <td>{{ $user->firstname }} {{ $user->lastname }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a class="btn" data-toggle="modal" data-target="#viewUser-<?= $user->id?>"><i class="fa fa-eye fa-2x" aria-hidden="true"></i></a>
                                <a class="btn" data-toggle="modal" data-target="#editUser-<?= $user->id?>"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>
                                {!! Form::open(['method' => 'DELETE','route' => ['userCRUD.destroy', $user->id],'style'=>'display:inline']) !!}
                                    <button class="btn" type="submit">
                                        <i class="fa fa-trash fa-2x" aria-hidden="true"></i>
                                    </button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        
                        <!-- View User Modal -->
                        <div id="viewUser-<?= $user->id?>" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">{{ $user->firstname }} {{ $user->lastname }}</h4>
                                </div>
                                <div class="modal-body">
                                    @include('Admin.UserCRUD.show')
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                                </div>

                            </div>
                        </div>

                        <!-- Edit User Modal -->
                        <div id="editUser-<?= $user->id?>" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Edit User {{ $user->firstname }} {{ $user->lastname }}</h4>
                                </div>
                                <div class="modal-body">
                                    {!! Form::model($user, ['method' => 'POST','route' => ['userCRUD.update', $user->id]]) !!}
                                    @include('Admin.UserCRUD.edit')
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-success" type="submit" name="action">Save Changes</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="cancel-button">Cancel</button>
                                    {{ Form::close() }}
                                </div>
                                </div>

                            </div>
                        </div>

                        
                    @endforeach
                    </tbody>
                </table>
                
                <!-- Create User Modal -->
                        <div id="createUser" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">New User</h4>
                                </div>
                                <div class="modal-body">
                                    {!! Form::open(array('route' => 'userCRUD.store','method'=>'POST', 'class' => 'form-horizontal')) !!}
                                    @include('Admin.UserCRUD.create')
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-success" type="submit" name="action">Create User</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="cancel-button">Cancel</button>
                                    {{ Form::close() }}
                                </div>
                                </div>

                            </div>
                        </div>
            </div>
        </div>
    </div>
</div>

    <!-- jQuery -->
    <script src="{{ asset('admin/js/jquery.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>

</body>

</html>

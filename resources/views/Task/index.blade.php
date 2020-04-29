@extends('layouts.app')

@section('content')
 <div class="container">
     <div class="row justify-content-center">
         <div class="col-md-8">
             <div class="card">
                 <div class="card-header">Task</div>
 
                 <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger" >
                       <ul>
                           @foreach ($errors->all() as $error)
                           <li>{{$error}}</li>
                           @endforeach
                       </ul>
                   </div>
                   @endif
                     @if (isset($tt))
                     <form action="{{url('update/'.$tt->id)}}" method="POST" class="form-horizontal" >
                         @csrf 
                         @method('PATCH')
                         <div class="card-body">
                         <!-- Task Name -->
                         <div class="form-group pl-5" >
                             <label for="task-name" class="col-sm-3 control-label">Task</label>
 
                                 <input type="text" name="name" id="task-name" class="form-control" value="{{$tt->name}}  ">
                             </div>
                         </div>
 
                         <!-- Add Task Button -->
                         <div class="form-group ml-6" style="">
                         
                        
                             <div class="col-sm-offset-3 col-sm-6">
                                 <button type="submit" class="btn btn-primary">
                                     <i class="fa fa-btn fa-plus"></i>UPDATE Task
                                 </button>
                             </div>
                         </div>
                     </form> 
 
            @else
                
            
                     <form action="{{url('store')}}" method="POST" class="form-horizontal" style="    margin: 0 auto;
                     width:80% /* value of your choice which suits your alignment */
">
                         @csrf 
                         <!-- Task Name -->
                         <div class="form-group">
                             <label for="task-name" class="col-sm-3 control-label">Task</label>
 
                             <div class="col-sm-12">
                                 <input type="text" name="name" id="task-name" class="form-control" value="" >
                             </div>
                         </div>
 
                         <!-- Add Task Button -->
                         <div class="form-group">
                             <div class="col-sm-offset-3 col-sm-6">
                                 <button type="submit" class="btn btn-dark">
                                     <i class="fa fa-btn fa-plus"></i>Add Task
                                 </button>
                             </div>
                         </div>
                     </form>
             @endif
         </div>
     </div>
 
     <!-- Current Tasks -->
         <div class="panel panel-default">
             <div class="panel-heading">
                 Current Tasks
             </div>
 
             <div class="panel-body">
                 <table class="table table-striped task-table">
                     <thead>
                         <th>Task</th>
                         <th>&nbsp;</th>
                     </thead>
                     <tbody> @foreach ($tasks as $task)
                         <tr>
                             <td class="table-text"><div>{{$task->name}}</div></td>
 
                             <!-- Task Delete Button -->
                             <td>
                                <form action="edit/{{$task->id}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-trash"></i>edit
                                    </button>
                                </form>

                            </td>
                             <td>
                             <form action="delete/{{$task->id}}" method="POST">
                                 @csrf
                                 @method('DELETE')
                                     <button type="submit" class="btn btn-danger">
                                         <i class="fa fa-btn fa-trash"></i>Delete
                                     </button>
                                 </form>
                             </td>
                             
                         </tr>
                     @endforeach
                     
                 </div>
             </div>
         </div>
     </div>
 </div>
 @endsection
 
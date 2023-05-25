@extends('layout.layout')
@section('content')
        <!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">{{ $title}}</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ $title}}</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">  
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                  <h4 class="card-title">{{ $title }}</h4>
                                  
                                 </div>
                            <div class="table-responsive">
                            </div>
                            <div class="card-body">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Action</th>
                                              
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $no = 1;
                                            @endphp
                                            @foreach ($data_edit as $row)
                                    
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $row->name }}</td>
                                                <td>{{ $row->email }}</td>
                                                <td>{{ $row->role }}</td>
                                               <td>
                                                <a href="#modalEdit"  data-toggle="modal" class="btn btn-xs btn-primary" > <i class="fa fa-edit">Edit</i></a> 
                                            </td>
                                         </tr>   
                                            </td>
                                            </tr>
                                            @endforeach 
                                        </body>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
       @foreach ($data_edit as $d)
         <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="documen">
                 <div class="modal-content">
                  <div class="modal-header">
                   <h5 class="modal-title">Edit Data User</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                    </div>
                    
                    <form method="POST" action="/user/edit/update/{{$d->id}}">
                        @csrf
                      <div class="modal-body">
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" value="{{ $d->name }}" class="form-control" name="name" placeholder="Nama Lengkap ..." required> 
                      </div>
                      <div class="form-group">
                            <label>Email</label>
                            <input type="email" value="{{ $d->email}}" class="form-control" name="email" placeholder="Email ..." required> 
                      </div>
                      <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password ..." required> 
                      </div>
                      <div class="form-group">
                            <label>Role</label>
                            <select class="form-control" name="role" required> 
                            <option <?php if($d['role']=="admin") echo "selected" ;?> value="admin">Admin</option> 
                            <option <?php if($d['role']=="kasir") echo "selected" ;?> value="kasir">Kasir</option> 
                            </select>
                      </div>
                     <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal" ><i class="fa fa-undo"></i>Close</button>
                     <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>Save changes</button>
                     </div>
                  </form>
                 </div>
              </div>
        </div>

 @endforeach
    @endsection
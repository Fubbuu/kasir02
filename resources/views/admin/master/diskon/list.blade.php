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
                            @foreach ($data_diskon as $d)
                      <form  method="POST"action="setdiskon/update/{{ $d->id }}">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                  <h4 class="card-title">{{ $title }}</h4>          
                                 </div>
                                 <div class="input-group mb-3">
                                    <input type="number" class="form-control" name="total_belanja" value="{{ $d->total_belanja }}" placeholder="total belanja..." class="form-control" required>
                                    <div class="input-group-append"><span class="input-group-text">Pcs</span>
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="number" name="diskon" value="{{ $d->diskon }}" class="form-control" placeholder="diskon">
                                        <div class="input-group-append"><span class="input-group-text">RP</span>
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" > <i class="fa fa-save"> save changes </i></button>
                            </div>
                        </form>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
           
        @endsection
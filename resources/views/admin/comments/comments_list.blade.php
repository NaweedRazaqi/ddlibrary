@extends('admin.layout')
@section('admin.content')
<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Comments</li>
    </ol>
    <!-- Example DataTables Card-->
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-table"></i> All Comments</div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>NO</th>
                <th>Title</th>
                <th>User</th>
                <th>Comment</th>
                <th>Status</th>
                <th>Created</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>NO</th>
                <th>Title</th>
                <th>User</th>
                <th>Comment</th>
                <th>Status</th>
                <th>Created</th>
              </tr>
            </tfoot>
            <tbody>
            @foreach ($comments as $indexkey => $comment)
              <tr>
                <td>{{ (($comments->currentPage() - 1) * 20)+$indexkey + 1 }}</td>
                <td><a href="{{ URL::to('resources/view/'.$comment->resourceid) }}">{{ $comment->title }}</a></td>
                <td><a href="{{ URL::to('users/view/'.$comment->userid) }}">{{ $comment->username }}</a></td>
                <td>{{ $comment->comment }}</td>
                <td>{{ ($comment->status==0?"Not Published":"Published") }}</td>
                <td>{{ Carbon\Carbon::createFromTimestamp($comment->created)->diffForHumans() }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        {{ $comments->links() }}
      </div>
    </div>
  </div>
  <!-- /.container-fluid-->
  <!-- /.content-wrapper-->
  @endsection
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('To Do List') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                       <table class="table table-striped table-hover">
                           <thead>
                           <tr>
                               <th>Title</th>
                               <th>Description</th>
                               <th>Assign</th>
                           </tr>
                           </thead>
                           <tbody>
                           @foreach($tasks as $task)
                               <tr>
                                   <td>
                                       {{ $task -> title }}
                                   </td>
                                   <td>
                                       {{ $task -> description }}
                                   </td>
                                   <td>
                                       <input type="text" placeholder="User's name">
                                       <button type="submit">Submit</button>
                                   </td>
                                   @endforeach
                               </tr>
                           </tbody>
                       </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


<script src="{{ mix('js/app.js') }}"></script>

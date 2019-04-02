@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <div class="d-flex align-item-center">
                    <h1>{{$question->title}}</h1>
                  <div class="ml-auto">
                    <a href="{{route('questions.index')}}" class="btn btn-outline-secondary">Back To All Questions</a>
                  </div>
                </div>
              </div>

                <div class="card-body">
                  <!--Body_html is a new accessor that encapsulates the markdown into a new conversion-->
                 {!! $question->body_html !!}
               </div>
        </div>
    </div>
</div>
@endsection

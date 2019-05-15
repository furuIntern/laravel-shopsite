@extends('layouts.user')



@section('article')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div id="content" class="table-responsive">
                        @include('user\element\table')
                    </div>
                       
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {

            $(document).on('click','a[name="detail"]',function(e) {
                
                e.preventDefault();
                axios.post('{{route("detail")}}', {

                    id: $(this).data('id')
                })
                 .then(function(data) {

                    $('#content').html(data.data);
                 })
            })
            
            $(document).on('click','a[name="back"]',function(e) {
                
                e.preventDefault();
                axios.post('{{route("home")}}')
                 .then(function(data) {

                    $('#content').html(data.data);
                 })    
            })

            $('a[name="delete"]').click(function(e) {

                e.preventDefault();
                axios.post('{{route("deleteOrder")}}', {

                    id: $(this).data('id')
                }).then(function(data) {

                    $('#content').html(data.data);
                })
            })
        })
    </script>
@endsection



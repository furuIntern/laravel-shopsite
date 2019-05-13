@extends('layouts\shop')

@section('main')
    <div class=row>
        <div class="col-sm-5">
            <img src="{{$product->img}}" alt="">
        </div>
        <div class="col-sm-7">
            <div class="card">
                <p>{{$product->description}}</p>
            </div>
            <div>
                <form class="d-flex justify-content-between">
                    <div class="form-group">
                        <label class="form-label" for="amount">Amount</label>
                        <input class="form-control" type="number" min="1" value="1" name="amount" id="amount"/>
                        @csrf
                    </div>
                    <div>
                        <input class="btn btn-success" style="margin: 2rem 0 auto 0" type="submit" value="Add-To-Cart" name="addCart" data-id="{{$product->id}}" />
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    @if (Auth::check())
    <div class="mt-5">
        <form>
            @csrf
            <label for="comment">Comment</label>
            <textarea class="form-control" name="comment" id="comment" cols="5" rows="5"></textarea>
            <input type="submit" class="mt-2 btn btn-success" data-id="{{$product->id}}" name="upComment" value="Update"/>
        </form>
    </div>
    <div class="mt-4" id="showComment">
        <h4>All Comment</h4>
        <br/>
        @foreach ($comments as $comment)
            <div>
                <h4>{{$comment->user->name}}</h4>
                <div class="card p-3">
                    {{$comment->content}}
                </div>
            </div>
            <br/>
        @endforeach
        <div>
            {{$comments->links()}}
        </div>
    </div>
    @else
        <div class="card text-center mt-5">
            You Need Login To See Comment
        </div>
    @endif
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            
            $('input[name="addCart"]').click(function(e) {
                
                e.preventDefault();
                axios.post('{{route("addCart")}}', {
                    id: $(this).data('id'),
                    qty : $('#amount').val()
                })
                 .then(function(data) {
                    $('#shoppingCart').html(data.data);
                 })
                 .catch(function(error) {

                 })
            });
            
            $('input[name="upComment"]').click(function(e) {
              
                e.preventDefault();
                axios.post('{{route("addComment")}}', {

                    pro_id: $(this).data('id'),
                    content: $('#comment').val()

                }).then(function(data) {
                    
                })
            })
        })
    </script>
@endsection
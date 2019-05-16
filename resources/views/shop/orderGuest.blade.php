@extends('layouts\shop')

@section('main')
    <div class="w-50 m-auto" id="inputOrder">
        <form class="form-group" action="">
            <label class="" for="IdOrder">Your Id Order</label>
            <input class="form-control" type="text" name="order" id="IdOrder"/>
            <input class="btn btn-success btn-block mt-3" type="submit" id="submitId" value="submit"/>
        </form>
    </div>

    <div id="showOrder">
        <div class="w-50 m-auto" id="order"></div>    
        <div class="w-50 m-auto" id="detailOrder"></div>
    </div>

@endsection

@section('script')
    <script>
        $(document).ready(function() {

            var id;

            $("#submitId").click(function(e) {
                
                e.preventDefault();

                id = $('#IdOrder').val();

                axios.post('{{route("getOrderGuest")}}', {
                    id: $('#IdOrder').val() 
                })
                .then(function(data) {
                
                    $('#order').html(data.data)
                })
            })

            $(document).on('click', '#detailOG', function(e) {

                e.preventDefault();

                axios.post('{{route("detailOrderGuest")}}', {
                    id: id
                })
                    .then(function(data) {

                        $('#detailOrder').html(data.data);
                    })
            })

            $(document).on('click','#deleteOG',function(e) {

                e.preventDefault();

                axios.post('{{route("deleteOrderGuest")}}', {
                    id:  id 
                })
                    .then(function(data) {
                        
                        if(data) {
                            $('#showOrder').html('');
                        }
                    })
            })
        })
    </script>
@endsection
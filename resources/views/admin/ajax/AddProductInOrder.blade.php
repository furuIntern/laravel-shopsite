<div class="row mb-3">
    <div class="col-9">
        <input list='products' class="form-control" name='product[]' placeholder='Product...'/>
    </div>
    <div class="col-2">
        <input type="number" min='1' class="form-control" name='amount[]' placeholder='Amonut...'/>
    </div>
    <div class="col-1">
        <button class="btn btn-danger" type='button' onclick='delRow(this)'>
         &times;
        </button>
    </div>
</div>
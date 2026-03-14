@extends('layouts.admin')

@section('content')

    <h2 class="mb-3">Ürün Listesi</h2>

    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#productModal">
        Yeni Ürün Ekle
    </button>

    <table id="productsTable" class="table table-bordered table-striped">

        <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Ürün</th>
            <th>Stok</th>
            <th>Fiyat</th>
            <th width="200">İşlemler</th>
        </tr>
        </thead>

        <tbody>

        @foreach($products as $product)

            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>
                    @if($product->stock < 10)
                        <span class="badge bg-danger">{{ $product->stock }}</span>
                    @else
                        <span class="badge bg-success">{{ $product->stock }}</span>
                    @endif
                </td>
                <td>{{ number_format($product->price,2) }} ₺</td>

                <td>

                    <button class="btn btn-warning btn-sm editProduct"
                            data-id="{{ $product->id }}">
                        Düzenle
                    </button>

                    <form action="{{ route('products.destroy',$product->id) }}"
                          method="POST"
                          class="deleteForm"
                          style="display:inline;">

                        @csrf
                        @method('DELETE')

                        <button type="button" class="btn btn-danger btn-sm deleteProduct">
                            Sil
                        </button>

                    </form>

                </td>

            </tr>

        @endforeach

        </tbody>

    </table>
@endsection

<!--ekleme modalı-->
<div class="modal fade" id="productModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Ürün Ekle</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">

                <form id="productForm">

                    @csrf

                    <div class="mb-3">
                        <label>Ürün Adı</label>
                        <input type="text" name="name" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Fiyat</label>
                        <input type="number" name="price" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Stok</label>
                        <input type="number" name="stock" class="form-control">
                    </div>

                    <button class="btn btn-success">Kaydet</button>

                </form>

            </div>

        </div>
    </div>
</div>

<!--güncelle modalı-->
<div class="modal fade" id="editModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Ürün Düzenle</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">

                <form id="editForm">

                    @csrf
                    @method('PUT')

                    <input type="hidden" id="product_id">

                    <div class="mb-3">
                        <label>Ürün Adı</label>
                        <input type="text" id="edit_name" name="name" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Fiyat</label>
                        <input type="number" id="edit_price" name="price" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Stok</label>
                        <input type="number" id="edit_stock" name="stock" class="form-control">
                    </div>

                    <button class="btn btn-success">Güncelle</button>

                </form>

            </div>

        </div>
    </div>
</div>
    @push('scripts')

        <script>

            //datatable yükleme
            $(document).ready(function () {
                $('#productsTable').DataTable({
                    pageLength: 5
                });
            });

            //ekleme
            $('#productForm').submit(function(e){
                e.preventDefault();

                $.ajax({
                    url:"{{route('products.store')}}",
                    type:"POST",
                    data: $(this).serialize(),

                    success:function(){
                        //sayfayı tamamen yeniden yüklüyor
                        location.reload();
                    }
                });
            });

            //silme
            $(document).on('click','.deleteProduct',function(){

                let form = $(this).closest('form');

                Swal.fire({

                    title: 'Emin misiniz?',
                    text: "Bu ürün silinecek!",
                    icon: 'warning',

                    showCancelButton: true,

                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',

                    confirmButtonText: 'Evet sil',
                    cancelButtonText: 'İptal'

                }).then((result) => {

                    if (result.isConfirmed) {

                        form.submit();

                    }

                });
            });

            //güncelleme modalı
            $(document).on('click','.editProduct',function(){
                let id = $(this).data('id');

                $.get("/products/"+id+"/edit",function(product){
                    $('#product_id').val(product.id);
                    $('#edit_name').val(product.name);
                    $('#edit_price').val(product.price);
                    $('#edit_stock').val(product.stock);

                    $('#editModal').modal('show');

                });

            });

            //güncelle
            $('#editForm').submit(function(e){
                e.preventDefault();
                let id= $('#product_id').val();

                $.ajax({
                    url:"/products/"+id,
                    type:"POST",

                    data:$(this).serialize(),

                    success:function(){
                        location.reload();
                    }
                });

            });
        </script>

    @endpush



<h1>Ürün Listesi</h1>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Ürün</th>
        <th>Stok</th>
        <th>Fiyat</th>
        <th>İşlemler</th>
    </tr>

    @foreach($products as $product)
        <tr>
        <th>{{$product->id}}</th>
        <th>{{$product->name}}</th>
        <th>{{$product->stock}}</th>
        <th>{{$product->price}}</th>
            <td>

                <a href="{{ route('products.edit', $product->id) }}">Düzenle</a>

                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')

                    <button type="submit" onclick="return confirm('Silmek istediğine emin misin?')">
                        Sil
                    </button>

                </form>

            </td>
    </tr>
    @endforeach
</table>

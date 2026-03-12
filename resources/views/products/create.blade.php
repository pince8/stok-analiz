<h1>Ürün Ekle</h1>

<form action="{{ route('products.store') }}" method="POST">
    @csrf

    <div>
        <label>Ürün Adı</label>
        <input type="text" name="name">
    </div>

    <div>
        <label>Fiyat</label>
        <input type="number" name="price">
    </div>

    <div>
        <label>Stok</label>
        <input type="number" name="stock">
    </div>

    <button type="submit">Kaydet</button>

</form>

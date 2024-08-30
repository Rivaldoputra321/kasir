<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Starbhak Mart</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: #007bff;
            color: #fff;
        }
        .navbar-brand {
            color: #fff;
        }
        .product-list {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }
        .product-item {
            width: 150px;
            border: 1px solid #ccc;
            border-radius: 8px;
            text-align: center;
            padding: 10px;
            background-color: #fff;
        }
        .product-item img {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
        }
        .sidebar {
            background-color: #f8f9fa;
            padding: 20px;
            height: 100vh;
        }
        .sidebar .form-control, .sidebar .btn {
            margin-bottom: 10px;
        }
        .summary {
            border-top: 1px solid #ddd;
            padding-top: 10px;
            margin-top: 10px;
        }
        .total-amount {
            font-size: 1.5rem;
            font-weight: bold;
        }
        .btn-payment {
            background-color: #007bff;
            color: #fff;
            position: fixed;
            bottom: 10px;
            right: 10px;
            border-radius: 50px;
            padding: 15px 30px;
            font-size: 1rem;
        }
    </style>
</head>
<body>

<nav class="navbar">
    <a class="navbar-brand" href="#">Starbhak Mart</a>
</nav>

<div class="container-fluid mt-4">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3 sidebar">

            <div class="form-group">
                <label for="customer-name">Nama Pelanggan</label>
                <input type="text" class="form-control" id="customer-name" placeholder="Nama Pelanggan">
            </div>

            <div class="summary">
                <p>Discount: Rp. <span id="discount">0</span></p>
                <p>Tax: Rp. <span id="tax">0</span></p>
                <p class="total-amount">Total Amount: Rp. <span id="total-amount">0</span></p>
            </div>
        </div>

        <!-- Product List -->
        <div class="col-md-9">
            <h4>Item List</h4>
            <div class="product-list" id="product-list">
                @foreach($products as $product)
                    <div class="product-item" data-id="${product.id}" data-price="${product.harga}">
                        <img src="${product.image_url || 'https://via.placeholder.com/100'}" alt="">
                        <p>{{$product->name}}</p>
                        <p class="price">@currency($product->harga)</p>
                        <button class="btn btn-primary add-to-cart">Add to Cart</button>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<!-- Payment Button -->
<button class="btn btn-payment" id="payment-button">Payment (CTRL + P)</button>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    
</script>

</body>
</html>

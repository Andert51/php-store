const apiUrl = 'http://localhost/PHP-Better/src/routes/routes.php';
const productForm = document.getElementById('productForm');
const alertContainer = document.getElementById('alertContainer');
const productTableBody = document.getElementById('productTableBody');
const submitBtn = document.getElementById('submitBtn');

document.addEventListener('DOMContentLoaded', () => {
    loadProducts();
});

productForm.addEventListener('submit', async (event) => {
    event.preventDefault(); // Evita el comportamiento por defecto del formulario

    const newProduct = {
        name: document.getElementById('name').value,
        description: document.getElementById('description').value,
        type: document.getElementById('type').value,
        price: document.getElementById('price').value,
        image: document.getElementById('image').value
    };

    try {
        const res = await fetch(apiUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(newProduct)
        });

        const result = await res.json();
        showAlert(result.msg, res.ok ? 'success' : 'danger');
        loadProducts(); // Recargar los productos después de crear uno nuevo
        productForm.reset(); // Limpiar el formulario
    } catch (error) {
        console.log('@Error => ', error);
        showAlert('Error creating product', 'danger');
    }
});

const loadProducts = async () => {
    try {
        const res = await fetch(apiUrl, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json'
            }
        });
        const products = await res.json();
        renderProducts(products);
    } catch (error) {
        console.log('@Error => ', error);
    }
};

const renderProducts = (products) => {
    productTableBody.innerHTML = ''; // Clear existing rows
    products.forEach(product => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${product.idproduct}</td>
            <td>${product.name}</td>
            <td>${product.description}</td>
            <td>${product.type}</td>
            <td>${product.price}</td>
            <td>
                <button class="btn btn-warning btn-sm" onclick="editProduct(${product.idproduct})">Edit</button>
                <button class="btn btn-danger btn-sm" onclick="deleteProduct(${product.idproduct})">Delete</button>
            </td>
        `;
        productTableBody.appendChild(row);
    });
};

const showAlert = (message, type) => {
    alertContainer.innerHTML = `
        <div class="alert alert-${type} alert-dismissible fade show" role="alert">
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    `;
};

const editProduct = (id) => {
    // Implement edit functionality
};

const deleteProduct = (id) => {
    // Implement delete functionality
};
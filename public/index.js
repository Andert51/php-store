const apiUrl = 'http://localhost/PHP-Better/src/routes/routes.php'
const productForm = document.getElementById('productForm')
const alertContainer = document.getElementById('alertContainer')
const productTableBody = document.getElementById('productTableBody')

document.addEventListener('DOMContentLoaded', () => {
    loadProducts()
})

const loadProducts = async () => {
 try {
    const res = await fetch(apiUrl + '/products', {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        }
    })
    const products = await res.json()
    console.log('@Products => ', products)
 } catch (error) {
    console.log('@Error => ', error)
 }
}